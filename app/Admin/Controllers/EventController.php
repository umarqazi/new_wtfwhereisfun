<?php

namespace App\Admin\Controllers;

use App\Event;
use App\Http\Controllers\Controller;
use App\Services\Events\EventListingService;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EventController extends Controller
{
    use HasResourceActions;

    protected $eventListing;

    public function __construct()
    {
        $this->eventListing   = new EventListingService();

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
        $grid = new Grid(new Event);
        $grid->id('Id');
        $grid->title('Title');
        $grid->description('Description');
        $grid->contact('Contact');

        $grid->vendor()->display(function($vendor){
            return '<a href="vendors/'.$vendor["id"].'">'.$vendor["first_name"]." ".$vendor["last_name"].'</a>';
        });

        $grid->category()->name('Category');
        $grid->type()->name('Event Type');
        $grid->refund_policy()->display(function ($refundPolicy){
            return str_limit($refundPolicy['text'], 30, '...');
        });

        $grid->status('Status')->display(function(){
            if($this->is_draft == 1){
                return '<span class="label label-warning">Draft</span>';
            }else if($this->is_published == 1){
                return '<span class="label label-primary">Published</span>';
            }
        });

        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            $actions->disableView();

            $approval = '';
            if($actions->row->is_approved == 1){
                $approval = '<a class="btn btn-danger" href="events/block/'.$actions->getKey().'" >Block</a>';
            }else{
                $approval = '<a class="btn btn-success" href="events/approve/'.$actions->getKey().'" >Approve</a>';
            }

            $previewUrl = url('events/'.encrypt_id($actions->getKey()));
            // prepend an action.
            $actions->prepend('<a href="'.$previewUrl.'" class="btn btn-primary" target="_blank" style="margin-right: 3px">Preview</a>'. $approval);
        });

        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->disableCreation();

        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();

            // Sets the User Name Filter
            $filter->like('title', 'Event Title');

            // Sets the Description Filter
            $filter->like('description', 'Description');
        });

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
        $show = new Show(Event::findOrFail($id));
        
        $show->title('Title');
        $show->description('Description');
        $show->contact('Contact');
        $show->referral_code('Referral code');
        $show->discount('Discount');
        $show->header_image('Header image');
        $show->is_published('Is published');
        $show->is_approved('Is approved');
        $show->user_id('User id');
        $show->event_type_id('Event type');
        $show->event_topic_id('Event topic');
        $show->category_id('Category');
        $show->refund_policy_id('Refund policy');
        $show->organizer_id('Organizer id');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Event);

        $form->text('title', 'Title');
        $form->textarea('description', 'Description');
        $form->text('contact', 'Contact');
        $form->text('referral_code', 'Referral code');
        $form->number('discount', 'Discount');
        $form->text('access', 'Access');
        $form->text('header_image', 'Header image');
        $form->text('slug', 'Slug');
        $form->textarea('additional_message', 'Additional message');
        $form->switch('total_capacity', 'Total capacity');
        $form->switch('is_draft', 'Is draft');
        $form->switch('is_online', 'Is online');
        $form->switch('ticket_flag', 'Ticket flag');
        $form->switch('is_sold_out', 'Is sold out');
        $form->switch('is_shareable', 'Is shareable');
        $form->switch('is_published', 'Is published');
        $form->switch('is_cancelled', 'Is cancelled');
        $form->switch('is_approved', 'Is approved');
        $form->switch('status', 'Status');
        $form->number('user_id', 'User id');
        $form->number('event_type_id', 'Event type id');
        $form->number('event_topic_id', 'Event topic id');
        $form->number('event_sub_topic_id', 'Event sub topic id');
        $form->number('category_id', 'Category id');
        $form->number('refund_policy_id', 'Refund policy id');
        $form->number('event_layout_id', 'Event layout id');
        $form->number('organizer_id', 'Organizer id');

        return $form;
    }

    public function approveEvent($id){
        $event = Event::findOrFail($id);
        $event->is_approved = 1;
        $event->save();

        admin_toastr('Event Approved', 'success');
        return redirect('admin/auth/events');
    }

    public function blockEvent($id){
        $event = Event::findOrFail($id);
        $event->is_approved = 0;
        $event->save();

        admin_toastr('Event Blocked', 'error');
        return redirect('admin/auth/events');
    }

    public function dashboardBlock(){
        $countEvents = $this->eventListing->getAllEvents()->count();
        return view('admin::dashboard.block',
            [
                'text'      => 'Events',
                'count'     =>  $countEvents,
                'url'       => '/admin/auth/events',
                'urlLabel'  => 'All Events',
                'class'     => '',
                'color'     => ''
            ]
        );
    }
}
