<?php

namespace App\Services\Events;
use Analytics;
use App\Services\Organizers\OrganizerService;
use Spatie\Analytics\Period;
use Carbon\Carbon;
class EventAnalyticService
{
    protected $analytic;
    protected $eventLocationService;
    protected $organizerService;

    public function __construct()
    {
        $this->eventLocationService     =       new EventTimeLocationService();
        $this->organizerService         =       new OrganizerService();
    }

    public function getEventAnalytics($locationId){
        $location           = $this->eventLocationService->getTimeLocation($locationId);
        $eventUrl           = 'events/'.$location->event->encrypted_id.'/'.$location->encrypted_id;
        $totalPeriod        = Period::create($location->created_at, Carbon::now());
        $totalViews         = $this->getUrlViews($totalPeriod, $eventUrl);
        $weekViews          = $this->getUrlViews(Period::days(7), $eventUrl);
        $monthViews         = $this->getUrlViews(Period::days(30), $eventUrl);
        $organizerViews     = $this->getOrganizerAnalytics($location->event->organizer->id);
        $locationAnalytics  = $this->getAnalyticsByCountry($totalPeriod, $eventUrl);
        $browserAnalytics   = $this->getAnalyticsByBrowsers($totalPeriod, $eventUrl);
        return ['totalViews' => $totalViews, 'weekViews' => $weekViews, 'monthViews' => $monthViews,
            'locationAnalytics' => $locationAnalytics, 'browserAnalytics' => $browserAnalytics, 'organizerViews' => $organizerViews];
    }

    /**
     * @param $period
     * @param $url
     * @return static
     */
    public function getUrlViews($period, $url){
        $response = Analytics::performQuery(
            $period,
            'ga:pageviews',
            ['filters' => 'ga:pagePath==/'.$url,]
        );

        $finalResponse = collect($response['rows'] ?? [])
            ->map(function (array $pageRow) {
                return [
                    'pageViews' => $pageRow[0],
                ];
            });
        if($finalResponse->count() > 0){
            return $finalResponse[0]['pageViews'];
        }else{
            return 0;
        }
    }

    /**
     * @param $period
     * @param $url
     * @return static
     */
    public function getAnalyticsByCountry($period, $url){
        $response = Analytics::performQuery(
            $period,
            'ga:pageviews',
            [
                'dimensions' => 'ga:country,ga:latitude,ga:longitude',
                'filters'    => 'ga:pagePath==/'.$url,
                'sort'       =>  '-ga:pageviews'
            ]
        );
        return collect($response['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'country'    => $dateRow[0],
                'latitude'   => $dateRow[1],
                'longitude'  =>  $dateRow[2],
                'pageViews'  => (int) $dateRow[3]
            ];
        });
    }

    /**
     * @param $period
     * @param $url
     * @param int $maxResults
     * @return Collection|static
     */
    public function getAnalyticsByBrowsers($period, $url, $maxResults = 4){
        $response = Analytics::performQuery(
            $period,
            'ga:pageviews',
            [
                'dimensions' => 'ga:browser',
                'filters'    => 'ga:pagePath==/'.$url,
                'sort'       => '-ga:pageviews',
            ]
        );

        $topBrowsers = collect($response['rows'] ?? [])->map(function (array $browserRow) {
            return [
                'browser'   => $browserRow[0],
                'pageViews' => (int) $browserRow[1],
            ];
        });

        if ($topBrowsers->count() <= $maxResults) {
            return $topBrowsers;
        }

        return $this->summarizeTopBrowsers($topBrowsers, $maxResults);
    }

    /**
     * @param Collection $topBrowsers
     * @param int $maxResults
     * @return Collection
     */
    protected function summarizeTopBrowsers(Collection $topBrowsers, int $maxResults): Collection
    {
        return $topBrowsers
            ->take($maxResults - 1)
            ->push([
                'browser'   => 'Others',
                'pageViews' => $topBrowsers->splice($maxResults - 1)->sum('sessions'),
            ]);
    }

    public function getOrganizerAnalytics($organizerId){
        $organizer          = $this->organizerService->getOrganizer($organizerId);
        $period             = Period::create($organizer->created_at, Carbon::now());
        $slug               = 'organizer/'.$organizer->slug;
        $organizerSlugViews = $this->getUrlViews($period, $slug);
        $organizerTotalViews= $organizerSlugViews;
        if(!empty($organizer->organizer_url)){
            $slug               = 'organizer/'.$organizer->organizer_url;
            $organizerUrlViews  = $this->getUrlViews($period, $slug);
            $organizerTotalViews= $organizerTotalViews + $organizerUrlViews;
        }
        return $organizerTotalViews;
    }

}
