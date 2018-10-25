<div id="change-password" class="tab-pane fade">
    <div class="contc-detail-wrap">
        <div class="acnt-adrs-innertitle">
            <h4>Change Password</h4>
        </div>
        <div class="other-information-inner">
            <form id="password-change" method="post">
                <div class="form-group">
                    <label for="usr">Current Password</label>
                    <input type="password" placeholder="Current Password" required name="current_password" class="form-control prevent-copy-paste">
                    <div class="form-error current_password"></div>
                </div>
                <div class="form-group">
                    <label for="usr">New Password</label>
                    <input type="password" placeholder="New Password" required name="password" class="form-control prevent-copy-paste">
                    <div class="form-error password"></div>
                </div>
                <div class="form-group">
                    <label for="usr">Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" required name="password_confirmation" class="form-control prevent-copy-paste">
                    <div class="form-error password_confirmation"></div>
                </div>
                <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
            </form>
        </div>
    </div>
</div>