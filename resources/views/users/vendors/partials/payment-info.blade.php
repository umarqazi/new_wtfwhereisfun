<div id="payment-info" class="tab-pane fade">
    <div class="contc-detail-wrap">
        <div class="acnt-adrs-innertitle">
            <h4>Payment Information</h4>
        </div>
        <div class="other-information-inner">
            <form id="user-payment-info" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="usr">Email</label>
                    <input type="email" placeholder="Email" required name="payment_email" class="form-control prevent-copy-paste" @if(!empty($user->payment_email)) value="{{$user->payment_email}}" @endif>
                    <div class="form-error payment_email"></div>
                </div>
                <div class="form-group">
                    <label for="usr">Confirm Email</label>
                    <input type="email" placeholder="Confirm Email" required name="confirm_payment_email" class="form-control prevent-copy-paste" @if(!empty($user->payment_email)) value="{{$user->payment_email}}" @endif>
                    <div class="form-error confirm_payment_email"></div>
                </div>
                <div class="form-group">
                    <label for="usr">Bank Name</label>
                    <input type="name" placeholder="Bank Name" required name="bank_name" class="form-control prevent-copy-paste" @if(!empty($user->bank_name)) value="{{$user->bank_name}}" @endif>
                    <div class="form-error bank_name"></div>
                </div>
                <div class="form-group">
                    <label for="usr">Account No</label>
                    <input type="name" placeholder="Account No." required name="account_number" class="form-control prevent-copy-paste" @if(!empty($user->account_number)) value="{{$user->account_number}}" @endif>
                    <div class="form-error account_number"></div>
                </div>
                <div class="form-group">
                    <label for="usr">Account Title</label>
                    <input type="name" placeholder="Account Title" required name="account_title" class="form-control prevent-copy-paste" @if(!empty($user->account_title)) value="{{$user->account_title}}" @endif>
                    <div class="form-error account_title"></div>
                </div>
                <div class="form-group">
                    <label for="usr">Select Payment Method</label>
                    <br>
                    <input name="payment_method" type="radio" id="radio_4" class="with-gap" value="paypal" required @if(!empty($user->payment_method == 'paypal')) checked @endif>
                    <label for="radio_4"><i class="fab fa-cc-paypal payment-card"></i></label>

                    <input name="payment_method" type="radio" id="radio_5" class="with-gap" value="stripe" required @if(!empty($user->payment_method == 'stripe')) checked @endif>
                    <label for="radio_5"><i class="fab fa-cc-stripe payment-card stripe-icon"></i></label>

                    <div class="form-error payment_method"></div>
                </div>
                <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
            </form>
        </div>
    </div>
</div>