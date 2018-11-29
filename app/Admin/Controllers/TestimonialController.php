<?php

namespace App\Admin\Controllers;

use App\Testimonial;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TestimonialController extends Controller
{
    use HasResourceActions;

    public function __construct()
    {
        $this->testimonialsDirectory = getDirectory('testimonials');
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
            ->header('Testimonials')
            ->description('All Testimonials')
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
            ->header('Testimonial')
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
            ->header('Testimonial')
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
            ->header('Testimonial')
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
        $grid = new Grid(new Testimonial);

        $grid->id('Id');
        $grid->name('Name');
        $grid->description()->display(function($text) {
            return str_limit($text, 50, '...');
        });
        $grid->image()->image($this->testimonialsDirectory['web_path'], 100,100);
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        $grid->disableRowSelector();
        $grid->disableExport();

        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();

            // Sets the User Name Filter
            $filter->like('name', 'User Name');

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
        $show = new Show(Testimonial::findOrFail($id));

        $show->name('Name');
        $show->description('Description');
        $show->image()->image($this->testimonialsDirectory['web_path']);
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
        $form = new Form(new Testimonial);

        $form->text('name', 'User Name')->placeholder('User Name')->rules('required|max:30');
        $form->textarea('description', 'Description')->placeholder('Description')->rules('required');
        $form->image('image', 'Image')->placeholder('Upload Testimonial Image')->move('uploads/testimonials')->uniqueName()->rules('required|dimensions:min_width=200,min_height=200');
        $form->footer(function ($footer){
            // disable `View` checkbox
            $footer->disableViewCheck();

            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();

            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();
        });

        $form->saved(function (Form $form){
            $fileName = basename($form->model()->image);
            $testimonial = Testimonial::find($form->model()->id);
            $testimonial->image = $fileName;
            $testimonial->thumbnail = $fileName;
            $testimonial->update();
            return redirect(admin_base_path('auth/testimonials'));
        });

        return $form;


    }
}
