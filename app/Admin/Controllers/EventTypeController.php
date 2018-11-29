<?php

namespace App\Admin\Controllers;

use App\EventType;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EventTypeController extends Controller
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
            ->header('Event Types')
            ->description('All Event Types')
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
            ->header('Event Type')
            ->description('Details')
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
            ->header('Event Type')
            ->description('Edit Form')
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
            ->header('Event Type')
            ->description('Create Form')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new EventType);

        $grid->id('Id');
        $grid->name('Name');
        $grid->slug('Slug');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        $grid->disableRowSelector();
        $grid->disableExport();

        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();

            // Sets the Name Filter
            $filter->like('name', 'User Name');

            // Sets the Slug Filter
            $filter->like('slug', 'Slug');
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
        $show = new Show(EventType::findOrFail($id));

        $show->name('Name');
        $show->slug('Slug');
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
        $form = new Form(new EventType);

        $form->text('name', 'Name')->rules('required');

        $form->footer(function ($footer){
            // disable `View` checkbox
            $footer->disableViewCheck();

            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();

            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();
        });

        $form->saved(function (Form $form){
            $eventType = EventType::find($form->model()->id);
            $eventType->slug = str_slug($eventType->name , '-');
            $eventType->update();
            return redirect(admin_base_path('auth/event-types'));
        });


        return $form;
    }
}
