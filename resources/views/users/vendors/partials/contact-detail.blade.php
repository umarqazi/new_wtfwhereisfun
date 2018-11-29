<div id="contact" class="tab-pane fade in">
    <div class="contc-detail-wrap">
        <div class="acnt-adrs-innertitle">
            <h4>Contact Information</h4>
        </div>
        <div class="contc-detail-inner">
            <form id="contact-information" method="post">
                <div class="row tele-no-wrap">
                    <div class="col-sm-6 form-group">
                        <label for="">Home Phone</label>
                        <input class="form-control" maxlength="15" minlength="10" placeholder="Home Phone" id="home_phone" name="phone" type="text" required type="text" value="{{ $user->phone}}">
                        <div class="form-error phone"></div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="">Cell Phone</label>
                        <input class="form-control" maxlength="15" minlength="10" placeholder="Cell Phone" id="cell_phone" name="mobile" type="text" required value="{{ $user->mobile}}">
                        <div class="form-error mobile"></div>
                    </div>
                </div>
                <div class="row job-title-wrap">
                    <div class="col-sm-6 form-group">
                        <label for="">Website</label>
                        <input class="form-control" placeholder="http://" id="website" maxlength="40" name="website" type="text" value="{{$user->website}}">
                        <div class="form-error website"></div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="">Blog</label>
                        <input class="form-control" maxlength="50" placeholder="Blog" id="blog" name="blog" type="text" value="{{$user->blog}}">
                        <div class="form-error blog"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
            </form>
        </div>
    </div>
</div>