<div id="details" class="tab-pane fade in active">
    <div class="contc-detail-wrap">
        <div class="acnt-adrs-innertitle">
            <h4>Event Details</h4>
        </div>
        <div class="contc-detail-inner">
            <form method="post" name="mapdata" id="event-details" enctype="multipart/form-data">
                <div class="form_bg_box basicInformationWrapper">
                    <h4>Basic information</h4>
                    <div class="form-group">
                        <label>Facebook Event Name<span class="required-field">*</span></label>
                        <span class="label_cap text-right char_limit">0/75</span>
                        <input type="text" class="form-control" placeholder="Make it a short and catchy title" name="title" value="{{$event->title}}" id="event_title" required="" maxlength="75">
                        <div class="form-error title"></div>
                    </div>
                    <div class="form-group">
                        <label for="description"> Description <span class="required-field">*</span></label>
                        <span class="label_cap">This description will appear on the event listing page.</span>
                        <textarea class="" id="description" name="description">{{$event->description}}</textarea>
                        <div class="form-error description"></div>
                    </div>

                    <div class="form-group">
                        <label for="facebook-pages"> Select Facebook Page <span class="required-field">*</span></label>
                        <select class="form-control" name="facebook_page" id="facebook-pages">
                            <option disabled="">Select Facebook Page</option>
                            @foreach($fbPages as $page)
                                <option value="{{$page['id']}}">{{$page['name']}}</option>
                            @endforeach
                        </select>
                        <div class="form-error facebook_page"></div>
                        <span class="label_cap">Hidden pages are not able to publish events.</span>
                    </div>

                    <div class="form-group">
                        <div class="applybutton_right">
                            <button type="submit" class="btn btn-default profile-btn rounded-border">Post on Facebook</button>
                        </div>
                    </div>
                    <input type="hidden" value="{{$eventId}}" name="event_id">
                </div>
            </form>
        </div>
    </div>
</div>