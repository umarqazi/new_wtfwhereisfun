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
        $location   = $this->eventLocationService->getTimeLocation($locationId);
        $eventUrl   = route('showById', ['id' => $location->event->encrypted_id, 'locationId' => $location->encrypted_id ]);
        $totalPeriod= Period::create($location->created_at, Carbon::now());
        $totalViews = $this->getUrlViews($totalPeriod, $eventUrl);
        $weekViews  = $this->getUrlViews(Period::days(7), $eventUrl);
        $monthViews = $this->getUrlViews(Period::days(30), $eventUrl);
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
            ["filters" => "ga:pagePath=@/".$url,]
        );

        return collect($response['rows'] ?? [])
            ->map(function (array $pageRow) {
                return [
                    'pageViews' => $pageRow[0],
                ];
            });
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
                'dimensions' => 'ga:country',
                'filters' => 'ga:pagePath=@/'.$url,
                'sort'  =>  '-ga:sessions'
            ]
        );
        return collect($response['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'country'   => $dateRow[0],
                'sessions'  => (int) $dateRow[1]
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
                'filters'    => 'ga:pagePath=@/'.$url,
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


}


//        $analytics = Analytics::performQuery(Period::days(60), 'ga:pageviews', ['dimensions' => 'ga:browser, ga:countryIsoCode, ga:browser']);
//        dd($analytics);
//        $response = (Analytics::performQuery(Period::days(7), "ga:pageviews", ["filters" => "ga:pagePath=@/https://stubguys.com/events/Opnel5aKBz/Opnel5aKBz", 'prettyPrint' => true]));
//        return collect($response['rows'] ?? [])->map(function (array $dateRow) {
//            return [
//                'date' => Carbon::createFromFormat('Ymd', $dateRow[0]),
//                'visitors' => (int) $dateRow[1],
//            ];
//        });
//        /events/Opnel5aKBz/Opnel5aKBz
//        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(60));
//        dd($analyticsData);
//        $analyticsData = Analytics::fetchMostVisitedPages(Period::years(1), 20);
//        $analyticsData = Analytics::performQuery(
//            Period::years(1),
//            'ga:sessions',
//            [
//                'metrics' => 'ga:sessions, ga:pageviews',
//                'dimensions' => 'ga:yearMonth'
//            ]
//        );
//        dd($analyticsData);