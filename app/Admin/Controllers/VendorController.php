<?php

namespace App\Admin\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\App;

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
        $grid->model()->whereHas('roles', function($query){
            return $query->where('name', 'vendor');
        });
        $grid->id('Id');
        $grid->first_name('First name');
        $grid->last_name('Last name');
        $grid->username('Username');
        $grid->email('Email');
        $grid->phone('Phone');
        $grid->mobile('Mobile');
        $grid->is_verified('Status')->display(function($status){
            if($status == 1){
                return '<span class="label label-success">Verified</span>';
            }else {
                return '<span class="label label-primary">Not Verified</span>';
            }
        });
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

        $grid->is_blocked('Block')->display(function ($block) {
            if($block == 1){
                return '<a class="btn btn-success" href="vendors/unblock/'.$this->getKey().'" >UnBlock</a>';
            }else{
                return '<a class="btn btn-danger" href="vendors/block/'.$this->getKey().'" >Block</a>';
            }
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
        $directory  = getDirectory('vendors', $id);
        $show->profile_thumbnail()->image($directory['web_path']);
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

        $form->text('first_name', 'First name')->rules('required|string|max:255');
        $form->text('last_name', 'Last name')->rules('required|string|max:255');
        $form->text('username', 'Username')->rules('required|string|max:50');
        $form->email('email', 'Email')->rules('required|string|email|max:255|unique:users');
        $form->password('password', 'Password')->rules('required|string|max:14|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/', ['Password must contain at least 6 characters, including UPPER/lower case & numbers, at-least one special character']);
        $form->mobile('phone', 'Phone');
        $form->mobile('mobile', 'Mobile');

//        $form->select('user.roles', $roles);

        $form->footer(function ($footer){
            // disable `View` checkbox
            $footer->disableViewCheck();

            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();

            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();
        });

        $form->saving(function(Form $form) {
            if($form->password && $form->model()->password != $form->password)
            {
                $form->password = bcrypt($form->password);
            }

            if (is_numeric(basename(request()->path()))) {
                // edit mode
            } else {
                $form->is_verified = 1;
            }
        });

        $form->saved(function (Form $form){
            $form->model()->assignRole('vendor');
        });

        return $form;
    }

    public function unBlockVendor($id){
        $user = User::findOrFail($id);
        $user->is_blocked = 0;
        $user->save();

        admin_toastr('User UnBlocked', 'success');
        return redirect('admin/auth/vendors');
    }

    public function blockVendor($id){
        $user = User::findOrFail($id);
        $user->is_blocked = 1;
        $user->save();

        admin_toastr('User Blocked', 'error');
        return redirect('admin/auth/vendors');
    }

    public function dashboardBlock(){
        $countVendors = User::whereHas('roles', function($query){
            $query->where('name', 'vendor');
        })->get()->count();

        return view('admin::dashboard.block',
            [
                'text'      => 'Vendors',
                'count'     =>  $countVendors,
                'url'       => '/admin/auth/vendors',
                'urlLabel'  => 'All Vendors',
                'class'     => '',
                'color'     => 'aqua',
                'icon'      => 'fa-users'
            ]
        );
    }
}
