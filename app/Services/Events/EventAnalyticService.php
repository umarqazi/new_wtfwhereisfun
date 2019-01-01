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
        $locationAnalytics  = $this->getAnalyticsByCountry($totalPeriod, $eventUrl);
        dd($totalViews);
    }

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

    public function getAnalyticsByCountry($period, $url){
        $response = Analytics::performQuery(
            $period,
            'ga:sessions',
            [
                'dimensions' => 'ga:country',
                'filters' => "ga:pagePath=@/".$url,
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