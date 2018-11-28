<?php

namespace App\Admin\Controllers;

use App\Dispute;
use App\Http\Controllers\Controller;
use App\Services\Events\EventService;
use App\Services\Events\TicketDisputeService;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DisputeController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */

    protected $eventService;
    protected $ticketDisputeService;

    public function __construct()
    {
        $this->eventService = new EventService;
        $this->ticketDisputeService = new TicketDisputeService();
    }
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
    public function show(Content $content, $id)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->show_detail($id));
    }

    public function show_detail($id){
        $dispute_details = $this->ticketDisputeService->getById($id);
        $event_details = $this->eventService->getByID($dispute_details->event_id);
        return view('admin..dashboard.disputeDetail')->with(['event_details' => $event_details, 'dispute_details' => $dispute_details]);

    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Dispute);

        $grid->id('Id');
        $grid->user()->first_name('User');
        $grid->event()->title('Event Title');
        $grid->subject('Subject');
        $grid->is_closed('Status')->display(function ($is_closed) {
            if($is_closed == 1)
            {
                return "<span>Closed</span>";
            }else{
                return "<span>Open</span>";
            }

        });
        $grid->closed_at('Closed at');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        $grid->disableCreateButton();
        $grid->disableRowSelector();
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
        });

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('event.title', 'Event');
            $filter->like('subject', 'Subject');

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
            $show = new Show(Dispute::findOrFail($id));
            $show->user()->first_name('User First Name');
            $show->user()->last_name('User Last Name');
            $show->event()->title('Event Title');
            $show->subject('Subject');
            $show->message('Message');
            $show->is_closed('Is closed');
            $show->closed_at('Closed at');
            $show->created_at('Created at');
            $show->updated_at('Updated at');
            $show->dispute_replies('Replies', function ($replies) {
                $replies->disableCreateButton();
                $replies->actions(function ($actions) {
                    $actions->disableDelete();
                    $actions->disableEdit();
                    $actions->disableView();
                });
                $replies->disableFilter();
                $replies->disableRowSelector();
                $replies->disableActions();
                $replies->disableExport();
                $replies->disablePagination();
                $replies->message()->display(function ($message){
                    return '<div class="row"><div class="col-md-12">'.$message .'</div></div>';
                });
            });
        return $show;
    }

}
