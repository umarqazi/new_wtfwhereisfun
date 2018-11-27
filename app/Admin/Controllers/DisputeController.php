<?php

namespace App\Admin\Controllers;

use App\Dispute;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
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

//        return Admin::grid(Dispute_replies::class, function (Grid $grid) {
//            dd($show);
            $show->user()->first_name('User First Name');
            $show->user()->last_name('User Last Name');

            $show->event()->title('Event Title');
            $show->subject('Subject');
            $show->message('Message');
            $show->is_closed('Is closed');
            $show->closed_at('Closed at');
            $show->created_at('Created at');
            $show->updated_at('Updated at');
//            $show->dispute_replies()->display(function ($replies) {
//                $count = count($replies);
//                return "<span class='label label-warning'>{$count}</span>";
//            });
//        });



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Dispute);

        $form->number('user_id', 'User id');
        $form->number('event_id', 'Event id');
        $form->number('event_order_id', 'Event order id');
        $form->text('subject', 'Subject');
        $form->textarea('message', 'Message');
        $form->switch('is_closed', 'Is closed');
        $form->switch('seen_by_vendor', 'Seen by vendor');
        $form->switch('seen_by_user', 'Seen by user');
        $form->datetime('closed_at', 'Closed at')->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
