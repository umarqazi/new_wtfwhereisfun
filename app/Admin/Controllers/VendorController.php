<?php

namespace App\Admin\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class VendorController extends Controller
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
            ->header('Vendors')
            ->description('All Vendors')
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
            ->header('Vendor')
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
            ->header('Vendor')
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
            ->header('Vendor')
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
        $grid = new Grid(new User);

        $grid->id('Id');
        $grid->first_name('First name');
        $grid->last_name('Last name');
        $grid->username('Username');
        $grid->email('Email');
        $grid->phone('Phone');
        $grid->mobile('Mobile');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        // The filter($callback) method is used to set up a simple search box for the table
        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();

            // Sets the First Name Filter
            $filter->like('first_name', 'First Name');

            // Sets the Last Name Filter
            $filter->like('last_name', 'Last Name');

            // Sets the Email Filter
            $filter->like('email', 'Email');
        });

        $grid->disableRowSelector();
        $grid->disableExport();
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
        $show = new Show(User::findOrFail($id));

        $show->id('Id');
        $show->first_name('First name');
        $show->last_name('Last name');
        $show->username('Username');
        $show->email('Email');
        $show->prefix('Prefix');
        $show->suffix('Suffix');
        $show->phone('Phone');
        $show->mobile('Mobile');
        $show->job_title('Job title');
        $show->company('Company');
        $show->website('Website');
        $show->blog('Blog');
        $show->birth_date('Birth date');
        $show->birth_month('Birth month');
        $show->birth_year('Birth year');
        $show->age('Age');
        $show->gender('Gender');
        $show->is_verified('Verified');
        $show->is_blocked('Blocked');
        $show->is_deactivated('Deactivated');
        $show->account_close_type('Account close type');
        $show->account_close_reason('Account close reason');
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
        $form = new Form(new User);

        $form->text('first_name', 'First name');
        $form->text('last_name', 'Last name');
        $form->text('username', 'Username');
        $form->email('email', 'Email');
        $form->password('password', 'Password');
        $form->mobile('phone', 'Phone');
        $form->mobile('mobile', 'Mobile');

        return $form;
    }
}
