<div id="other" class="tab-pane fade">
    <div class="contc-detail-wrap">
        <div class="acnt-adrs-innertitle">
            <h4>Other Information</h4>
        </div>
        <div class="other-information-inner">
            <form id="other-information">
                <div class="form-group">
                    <label for="">Gender</label>
                    <select class="form-control" id="sel1" name="gender" required="">
                        <option value="" @if(empty($user->gender)){{"selected"}}@endif disabled>Select Gender</option>
                        <option value="male" @if(!empty($user->gender) && $user->gender == 'male') {{"selected"}}@endif>Male</option>
                        <option value="female" @if(!empty($user->gender) && $user->gender == 'female') {{"selected"}}@endif>Female</option>
                        <option value="other" @if(!empty($user->gender) && $user->gender == 'other'){{"selected"}}@endif>Other</option>
                    </select>
                    @if ($errors->has('gender'))
                        <span class="help-block">
                                                            <strong class="manadatory">{{ $errors->first('gender') }}</strong>
                                                        </span>
                    @endif
                    <div class="form-error gender"></div>
                </div>

                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label for="">Month</label>
                        <select class="form-control" id="sel1" name="birth_month" required>
                            <option value="" @if(empty($user->birth_month)){{"selected"}}@endif disabled>Select Month</option>
                            @foreach(getMonths() as $month)
                                <option value="{{$month}}" @if($month == $user->birth_month){{"selected"}}@endif>{{$month}}</option>
                            @endforeach
                        </select>
                        <div class="form-error birth_month"></div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="">Day</label>
                        <select class="form-control" id="sel1" name="birth_date" required>
                            <option value="" @if(empty($user->birth_date)){{"selected"}}@endif disabled>Select Day</option>
                            @for($i=1; $i < 32; $i++) { ?>
                            <option value="{{$i}}" @if($i == $user->birth_date){{"selected"}}@endif>{{$i}}</option>
                            @endfor
                        </select>
                        <div class="form-error birth_date"></div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="">Year</label>
                        <select class="form-control" id="sel1" name="birth_year" required>
                            <option value="" @if(empty($user->birth_year)){{"selected"}}@endif disabled>Select Year</option>
                            @for($j=date('Y'); $j > 1900; $j--)
                                <option value="{{$j}}" @if($j == $user->birth_year){{"selected"}}@endif>{{$j}}</option>
                            @endfor
                        </select>
                        <div class="form-error birth_year"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Age</label>
                    <input class="form-control" placeholder="Age" id="age" name="age" min="1" type="number"  required value="{{$user->age}}">
                    <div class="form-error age"></div>
                </div>
                <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
            </form>
        </div>
    </div>
</div>