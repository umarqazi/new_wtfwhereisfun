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
        $grid = new Grid(new User);

        $grid->id('Id');
        $grid->first_name('First name');
        $grid->last_name('Last name');
        $grid->username('Username');
        $grid->email('Email');
        $grid->password('Password');
        $grid->prefix('Prefix');
        $grid->suffix('Suffix');
        $grid->phone('Phone');
        $grid->mobile('Mobile');
        $grid->job_title('Job title');
        $grid->company('Company');
        $grid->website('Website');
        $grid->blog('Blog');
        $grid->birth_date('Birth date');
        $grid->birth_month('Birth month');
        $grid->birth_year('Birth year');
        $grid->age('Age');
        $grid->gender('Gender');
        $grid->is_social_signup('Is social signup');
        $grid->social_type('Social type');
        $grid->social_id('Social id');
        $grid->profile_picture('Profile picture');
        $grid->profile_thumbnail('Profile thumbnail');
        $grid->is_verified('Is verified');
        $grid->is_blocked('Is blocked');
        $grid->is_deactivated('Is deactivated');
        $grid->last_login('Last login');
        $grid->account_close_type('Account close type');
        $grid->account_close_reason('Account close reason');
        $grid->stripe_user_id('Stripe user id');
        $grid->deleted_at('Deleted at');
        $grid->remember_token('Remember token');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show->password('Password');
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
        $show->is_social_signup('Is social signup');
        $show->social_type('Social type');
        $show->social_id('Social id');
        $show->profile_picture('Profile picture');
        $show->profile_thumbnail('Profile thumbnail');
        $show->is_verified('Is verified');
        $show->is_blocked('Is blocked');
        $show->is_deactivated('Is deactivated');
        $show->last_login('Last login');
        $show->account_close_type('Account close type');
        $show->account_close_reason('Account close reason');
        $show->stripe_user_id('Stripe user id');
        $show->deleted_at('Deleted at');
        $show->remember_token('Remember token');
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
        $form->text('prefix', 'Prefix');
        $form->text('suffix', 'Suffix');
        $form->mobile('phone', 'Phone');
        $form->mobile('mobile', 'Mobile');
        $form->text('job_title', 'Job title');
        $form->text('company', 'Company');
        $form->text('website', 'Website');
        $form->textarea('blog', 'Blog');
        $form->number('birth_date', 'Birth date');
        $form->text('birth_month', 'Birth month');
        $form->number('birth_year', 'Birth year');
        $form->number('age', 'Age');
        $form->text('gender', 'Gender');
        $form->switch('is_social_signup', 'Is social signup');
        $form->text('social_type', 'Social type');
        $form->text('social_id', 'Social id');
        $form->text('profile_picture', 'Profile picture');
        $form->text('profile_thumbnail', 'Profile thumbnail');
        $form->switch('is_verified', 'Is verified');
        $form->switch('is_blocked', 'Is blocked');
        $form->switch('is_deactivated', 'Is deactivated');
        $form->datetime('last_login', 'Last login')->default(date('Y-m-d H:i:s'));
        $form->text('account_close_type', 'Account close type');
        $form->textarea('account_close_reason', 'Account close reason');
        $form->text('stripe_user_id', 'Stripe user id');
        $form->text('remember_token', 'Remember token');

        return $form;
    }
}
