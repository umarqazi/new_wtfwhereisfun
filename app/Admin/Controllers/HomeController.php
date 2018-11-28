<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Facades\Admin;

class HomeController extends Controller
{
    protected $customerController;

    protected $vendorController;

    protected $eventController;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $customerController                  = new CustomerController();
        $this->customerController            = $customerController;
        $this->vendorController              = new VendorController();
        $this->eventController               = new EventController();
    }

    public function index(Content $content)
    {
        return $content
            ->header('Dashboard')
            ->row(function (Row $row) {
                $row->column(4, $this->vendorController->dashboardBlock());
                $row->column(4, $this->customerController->dashboardBlock());
                $row->column(4, $this->eventController->dashboardBlock());
            });
    }


}
