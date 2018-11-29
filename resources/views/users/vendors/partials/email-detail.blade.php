<div id="email" class="tab-pane fade">
    <div class="acnt-adrs-innertitle">
        <h4>Email Preferences</h4>
    </div>
    <div class="email-preferences all-form">
        <form method="post" id="email-preferences">
            <div class="email-preferences-inner">
                @if($user->hasRole('vendor'))
                    <div class="attending-events-wrap">
                        <div class="acnt-adrs-innertitle">
                            <h3>Attending Events</h3>
                        </div>
                        <p class="email-preferences-subtitle">News and updates about events created by event organizers</p>
                        <div class="attng-evnt-eml-wrap">
                            <div class="acnt-adrs-innersubtitle"><p>Email me</p></div>
                            <div class="form-group">
                                <input type="checkbox" id="basic_checkbox_2" class="form-control" @if(!is_null($emailPreference) && $emailPreference->update_new_feature){{"checked"}}@endif  name="update_new_feature" value="1">
                                <label for="basic_checkbox_2">Updates about new WTF WHERE’S THE FUN features and announcements</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="basic_checkbox_3" class="form-control" @if(!is_null($emailPreference) && $emailPreference->weekly_event_guide){{"checked"}}@endif  name="weekly_event_guide" value="1">
                                <label for="basic_checkbox_3">WTF WHERE’S THE FUN weekly event guide: A digest of personalized
                                    event recommendations</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="basic_checkbox_4" class="form-control" @if(!is_null($emailPreference) && $emailPreference->additional_info){{"checked"}}@endif  name="additional_info" value="1">
                                <label for="basic_checkbox_4">Requests for additional information on an event after you have
                                    attended</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="basic_checkbox_5" class="form-control" @if(!is_null($emailPreference) && $emailPreference->updates_for_attendees){{"checked"}}@endif  name="updates_for_attendees" value="1">
                                <label for="basic_checkbox_5">Unsubscribe from all WTF WHERE’S THE FUN
                                    newsletters and updates for attendees</label>
                            </div>
                        </div>
                        <div class="attending-events-ntfcn">
                            <div class="acnt-adrs-innersubtitle"><p>Notifications</p></div>
                            <div class="form-group">
                                <input type="checkbox" id="basic_checkbox_6" class="form-control" @if(!is_null($emailPreference) && $emailPreference->buy_ticket){{"checked"}}@endif  name="buy_ticket" value="1">
                                <label for="basic_checkbox_6">When friends buy tickets or register for events near me</label>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="organizing-events-wrap">
                    <div class="acnt-adrs-innertitle">
                        <h3>Organizing Events</h3>
                    </div>
                    <p class="organizing-events-subtitle">Helpful updates and tips for organizing events on WTF WHERE’S THE FUN </p>
                    <div class="org-evnt-eml-wrap">
                        <div class="acnt-adrs-innersubtitle"><p>Email me</p></div>
                        <div class="form-group">
                            <input type="checkbox" id="basic_checkbox_7" class="form-control" @if(!is_null($emailPreference) && $emailPreference->organizing_update_new_feature){{"checked"}}@endif  name="organizing_update_new_feature" value="1">
                            <label for="basic_checkbox_7">Updates about new WTF WHERE’S THE FUN features and
                                announcements</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="basic_checkbox_8" class="form-control" @if(!is_null($emailPreference) && $emailPreference->event_sales_recap){{"checked"}}@endif  name="event_sales_recap" value="1">
                            <label for="basic_checkbox_8">Event Sales Recap</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="basic_checkbox_9" class="form-control" @if(!is_null($emailPreference) && $emailPreference->updates_for_event_organizers){{"checked"}}@endif  name="updates_for_event_organizers" value="1">
                            <label for="basic_checkbox_9">Unsubscribe from all WTF WHERE’S THE FUN newsletters and updates
                                for event organizing-events-wrap</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="basic_checkbox_10" class="form-control" @if(!is_null($emailPreference) && $emailPreference->updates_for_event_attendees){{"checked"}}@endif  name="updates_for_event_attendees" value="1">
                            <label for="basic_checkbox_10">Unsubscribe from all WTF WHERE’S THE FUN newsletters and updates
                                for attendees</label>
                        </div>
                    </div>
                    <div class="org-evnt-ntfcn">
                        <div class="acnt-adrs-innersubtitle"><p>Notifications</p></div>
                        <div class="form-group">
                            <input type="checkbox" id="basic_checkbox_11" class="form-control" @if(!is_null($emailPreference) && $emailPreference->important_reminders){{"checked"}}@endif  name="important_reminders" value="1">
                            <label for="basic_checkbox_11">Important reminders for my next event</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="basic_checkbox_12" class="form-control" @if(!is_null($emailPreference) && $emailPreference->order_confirmation){{"checked"}}@endif  name="order_confirmation" value="1">
                            <label for="basic_checkbox_12">Order confirmations from my attendees</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="acnt-erefernce-btn">
                <button type="submit" class="btn btn-default email-preferences-btn rounded-border">Save</button>
            </div>
        </form>
    </div>
</div>