<?php

use Carbon\Carbon;

if (! function_exists('get_month')) {
    function get_month($date)
    {
        return \Carbon\Carbon::parse($date)->format('M');
    }
}

if (! function_exists('getMonths')) {
    function getMonths(){
        return array('January','February','March','April','May','June','July','August','September','October',
            'November','December');
    }
}

if (! function_exists('monthDateYearFromat')) {
    function monthDateYearFromat($date){
        return \Carbon\Carbon::parse($date)->format('M d, Y');
    }
}