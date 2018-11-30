<?php

namespace App\Admin\Controllers;

use App\EventTimeLocation;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\Events\EventTimeLocationService;
class EventLocationController extends Controller
{
    use HasResourceActions;

    protected $eventLocationService;

    public function __construct()
    {

    }

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new EventTimeLocation);

        $grid->model()->with(['event', 'event.vendor']);

        $grid->event('Event')->title();
        $grid->event()->vendor()->display(function($vendor){
            return '<a href="vendors/'.$vendor["id"].'">'.$vendor["first_name"]." ".$vendor["last_name"].'</a>';
        });
        $grid->location('Location');
        $grid->starting('Starting');
        $grid->ending('Ending');
        $grid->created_at('Created at');
        $grid->event()->column('Status')->display(function(){
            if($this->event->is_draft == 1){
                return '<span class="label label-warning">Draft</span>';
            }else if($this->event->is_published == 1){
                return '<span class="label label-primary">Published</span>';
            }
        });

        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            $actions->disableView();

            $approval = '';
            if($actions->row->event->is_approved == 1){
                $approval = '<a class="btn btn-danger" href="events/block/'.$actions->row->event->id.'" >Block</a>';
            }else{
                $approval = '<a class="btn btn-success" href="events/approve/'.$actions->row->event->id.'" >Approve</a>';
            }

            $previewUrl = route('showById', ['id' => $actions->row->event->encrypted_id, 'locationId' => $actions->row->encrypted_id ]);
            $previewBtn = '<a href="'.$previewUrl.'" class="btn btn-success" target="_blank" style="margin-right: 3px">Preview</a>';
            $ordersUrl =  'event/location/'.$actions->getkey().'/orders';
            $orderBtn = '<a href="'.$ordersUrl.'" class="btn btn-primary" target="_blank" style="margin-right: 3px">View Report</a>';
            // prepend an action.
            $actions->prepend($previewBtn.$approval.$orderBtn);
        });

        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->disableCreation();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(EventTimeLocation::findOrFail($id));

        $show->id('Id');
        $show->event_id('Event id');
        $show->location('Location');
        $show->address('Address');
        $show->display_currency_id('Display currency id');
        $show->transacted_currency_id('Transacted currency id');
        $show->longitude('Longitude');
        $show->latitude('Latitude');
        $show->starting('Starting');
        $show->ending('Ending');
        $show->timezone_id('Timezone id');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new EventTimeLocation);

        $form->number('event_id', 'Event id');
        $form->text('location', 'Location');
        $form->text('address', 'Address');
        $form->number('display_currency_id', 'Display currency id');
        $form->number('transacted_currency_id', 'Transacted currency id');
        $form->text('longitude', 'Longitude');
        $form->text('latitude', 'Latitude');
        $form->datetime('starting', 'Starting')->default(date('Y-m-d H:i:s'));
        $form->datetime('ending', 'Ending')->default(date('Y-m-d H:i:s'));
        $form->number('timezone_id', 'Timezone id');

        return $form;
    }

    protected function getLocationOrders($id){

    }
}
