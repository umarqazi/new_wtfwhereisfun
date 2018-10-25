<div id="profile" class="tab-pane fade in active">
    <div class="contc-detail-wrap">
        <div class="acnt-adrs-innertitle">
            <h4>Profile</h4>
        </div>
        <div class="contc-detail-inner">
            <form id="profile-information" method="post">
                <div class="form-group">
                    <label for="">Prefix</label>
                    <select class="form-control" id="sel1" name="prefix" required>
                        <option value="" @if(empty($user->prefix)){{"selected"}}@endif disabled>--</option>
                        <option value="Dr." @if($user->prefix == 'Dr.'){{"selected"}}@endif> Dr.</option>
                        <option value="Mr." @if($user->prefix == 'Mr.'){{"selected"}}@endif>Mr.</option>
                        <option value="Mrs." @if($user->prefix == 'Mrs.'){{"selected"}}@endif>Mrs.</option>
                        <option value="Ms." @if($user->prefix == 'Ms.'){{"selected"}}@endif>Ms.</option>
                        <option value="Miss" @if($user->prefix == 'Miss.'){{"selected"}}@endif>Miss</option>
                        <option value="Mx." @if($user->prefix == 'Mx.'){{"selected"}}@endif>Mx.</option>
                        <option value="Prof." @if($user->prefix == 'Prof.'){{"selected"}}@endif>Prof.</option>
                        <option value="Rev." @if($user->prefix == 'Rev.'){{"selected"}}@endif>Rev.</option>
                    </select>
                    <div class="form-error prefix"></div>
                </div>
                <div class="row name-wrap">
                    <div class="col-sm-6 form-group">
                        <label for="">First name</label>
                        <input class="form-control" maxlength="25" placeholder="First Name" id="first_name" name="first_name" type="text" required value="{{$user->first_name}}">
                        <div class="form-error first_name"></div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="">Last Name</label>
                        <input class="form-control" id="last_name" maxlength="25" name="last_name" placeholder="Last Name" type="text" required value="{{$user->last_name}}">
                        <div class="form-error last_name"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Suffix</label>
                    <input class="form-control" placeholder="Suffix" maxlength="50" id="suffix" name="suffix" type="text"  value="{{$user->suffix}}">
                    <div class="form-error phone"></div>
                </div>
                <div class="row job-title-wrap">
                    <div class="col-sm-6 form-group">
                        <label for="">Job Title</label>
                        <input class="form-control" placeholder="Job Title" id="job_title" maxlength="30" name="job_title" type="text" value="{{$user->job_title}}">
                        <div class="form-error job_title"></div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="">Company / Organization</label>
                        <input class="form-control" placeholder="Company / Organization" maxlength="50" id="company" name="company" type="text" value="{{$user->company}}">
                        <div class="form-error company"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
            </form>
        </div>
    </div>
</div>