<?php

namespace App\Admin\Controllers;

use App\Blog;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BlogController extends Controller
{
    use HasResourceActions;

    public function __construct()
    {
        $this->blogsDirectory = getDirectory('blogs');
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
            ->header('Blogs')
            ->description('All Blogs')
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
            ->header('Blog')
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
            ->header('Blog')
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
            ->header('Blog')
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
        $grid = new Grid(new Blog);

        $grid->id('Id');
        $grid->title('Title');
        $grid->description()->display(function($text) {
            return str_limit($text, 80, '...');
        });
        $grid->image('Image')->image($this->blogsDirectory['web_path'] , 100, 100);
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        $grid->disableRowSelector();
        $grid->disableExport();

        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();

            // Sets the Name Filter
            $filter->like('title', 'Title');

            // Sets the Slug Filter
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
        $show = new Show(Blog::findOrFail($id));

        $show->title('Title');
        $show->description('Description');
        $show->image('Image')->image($this->blogsDirectory['web_path']);
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
        $form = new Form(new Blog);

        $form->text('title', 'Title')->rules('required');
        $form->ckeditor('description', 'Description')->rules('required');
        $form->image('image', 'Image')->default('NULL')->placeholder('Upload Testimonial Image')->move('uploads/blogs')->uniqueName()->rules('required|dimensions:min_width=600,min_height=600');

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
            $blog = Blog::find($form->model()->id);
            $blog->image = $fileName;
            $blog->thumbnail = $fileName;
            $blog->update();
            return redirect(admin_base_path('auth/blogs'));
        });

        return $form;
    }
}
