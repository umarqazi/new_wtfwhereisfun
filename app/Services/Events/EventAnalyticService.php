<?php

namespace App\Services\Events;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
class EventAnalyticService
{
    protected $analytic;
    protected $eventLocationService;

    public function __construct()
    {
        $this->eventLocationService     =       new EventTimeLocationService();
    }

    public function getEventAnalytics($locationId){
        $location           = $this->eventLocationService->getTimeLocation($locationId);
        $eventUrl           = 'events/'.$location->event->encrypted_id.'/'.$location->encrypted_id;
        $totalPeriod        = Period::create($location->created_at, Carbon::now());
        $totalViews         = $this->getUrlViews($totalPeriod, $eventUrl);
        $weekViews          = $this->getUrlViews(Period::days(7), $eventUrl);
        $monthViews         = $this->getUrlViews(Period::days(30), $eventUrl);
        $locationAnalytics  = $this->getAnalyticsByCountry($totalPeriod, $eventUrl);
        $browserAnalytics   = $this->getAnalyticsByBrowsers($totalPeriod, $eventUrl);

        return ['totalViews' => $totalViews, 'weekViews' => $weekViews, 'monthViews' => $monthViews,
            'locationAnalytics' => $locationAnalytics, 'browserAnalytics' => $browserAnalytics];
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
            'ga:sessions',
            [
                'dimensions' => 'ga:country,ga:latitude,ga:longitude',
                'filters' => 'ga:pagePath==/'.$url,
                'sort'  =>  '-ga:sessions'
            ]
        );
        return collect($response['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'country'   => $dateRow[0],
                'latitude'   => $dateRow[1],
                'longitude' =>  $dateRow[2],
                'sessions'  => (int) $dateRow[3]
            ];
        });
    }

    /**
     * @param $period
     * @param $url
     * @param int $maxResults
     * @return Collection|static
     */
    public function getAnalyticsByBrowsers($period, $url, $maxResults = 10){
        $response = Analytics::performQuery(
            $period,
            'ga:sessions',
            [
                'dimensions' => 'ga:browser',
                'filters'    => 'ga:pagePath==/'.$url,
                'sort'       => '-ga:sessions',
            ]
        );

        $topBrowsers = collect($response['rows'] ?? [])->map(function (array $browserRow) {
            return [
                'browser' => $browserRow[0],
                'sessions' => (int) $browserRow[1],
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
                'browser' => 'Others',
                'sessions' => $topBrowsers->splice($maxResults - 1)->sum('sessions'),
            ]);
    }


    public function getCountryAnalyticMarkers($locationAnalytics){
        $countryInfo = [];
        if($locationAnalytics->count() > 0){
            foreach($locationAnalytics as $location){
                array_push($countryInfo, $location);
            }
        }
        return $countryInfo;
    }


}
