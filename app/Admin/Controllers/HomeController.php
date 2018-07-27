<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UsersController;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Grid;
use App\User;
use App\Http\Services\UserServices;

class HomeController extends Controller
{
    public function index()
    {

        $userServices = new UserServices();
        $usersController = new UsersController($userServices);
        return Admin::content(function (Content $content) use ($usersController) {
            $content->header('Dashboard');
            $content->description('Admin Dashboard');
            $content->row($usersController->userCount().$usersController->userCount().$usersController->userCount().$usersController->userCount());
            $content->row(Dashboard::title());
            $content->body($this->grid());

//            $content->row(function (Row $row) {
//
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::environment());
//                });
//
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::extensions());
//                });
//
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::dependencies());
//                });
//            });

        });
    }

    protected function grid()
    {
        return Admin::grid(User::class, function (Grid $grid) {
            $grid->id('ID')->sortable();

            $grid->name();
            $grid->email();
//            $grid->getRoleNames()[0];
//            $grid->full_name();
//            $grid->avatar()->display(function ($avatar) {
//                return "<img src='{$avatar}' />";
//            });
//            $grid->profile()->postcode('Post code');
//            $grid->profile()->address();
//            $grid->position('Position');
//            $grid->profile()->color();
//            $grid->profile()->start_at('开始时间');
//            $grid->profile()->end_at('结束时间');

            $grid->column('Roles')->display(function () {
                return ucfirst($this->getRoleNames()[0]);
            });
//
//            $grid->column('column2_not_in_table')->display(function () {
//                return $this->email.'#'.$this->profile['color'];
//            });

//            $grid->tags()->display(function ($tags) {
//                $tags = collect($tags)->map(function ($tag) {
//                    return "<code>{$tag['name']}</code>";
//                })->toArray();
//
//                return implode('', $tags);
//            });

            $grid->created_at();
            $grid->updated_at();

            $grid->filter(function ($filter) {
                $filter->like('name');
                $filter->like('email');
                $filter->like('profile.postcode');
//                $filter->between('profile.start_at')->datetime();
//                $filter->between('profile.end_at')->datetime();
            });

            $grid->actions(function ($actions) {
                if ($actions->getKey() % 2 == 0) {
                    $actions->append('<a href="/" class="btn btn-xs btn-danger">detail</a>');
                }
            });
        });
    }
}
