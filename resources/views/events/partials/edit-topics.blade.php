<div id="topics" class="tab-pane fade in">
    <div class="contc-detail-wrap">
        <div class="acnt-adrs-innertitle">
            <h4>Event Topics And Category</h4>
        </div>
        <div class="event-topics-detail-inner">
            <div class="">
                <form method="post" id="event-topics">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Event Category <span class="required-field">*</span></label>
                                <select class="form-control" name="category">
                                    <option value="" @if(is_null($event->category)){{'selected'}}@endif>Select Event Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if(!is_null($event->category) && $category->id == $event->category_id){{'selected'}}@endif>{{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="form-error category"></div>
                            </div>

                            <div class="form-group">
                                <label>Event Topic</label>
                                <select class="form-control" id="event_topic" name="event_topic">
                                    <option value="" @if(is_null($event->topic)){{'selected'}}@endif>Select Topic</option>
                                    @foreach ($eventTopics as $topic)
                                        <option value="{{$topic->id}}"@if(!is_null($event->topic) && $topic->id == $event->event_topic_id){{'selected'}}@endif>{{$topic->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Event Type</label>
                                <select class="form-control" id="event_type" name="event_type">
                                    <option value="" @if(is_null($event->type)){{'selected'}}@endif>Select Event Type</option>
                                    @foreach($eventTypes as $type)
                                    <option value="{{$type->id}}"
                                            @if(!is_null($event->type) && $type->id == $event->event_type_id){{'selected'}}@endif>{{$type->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Event Tags <span class="required-field">*</span></label>
                                <select multiple data-role="tagsinput" name="event_tags[]">
                                    @if(!$eventTags->isEmpty())
                                        @foreach($eventTags as $tag)
                                            <option value="{{$tag->name}}">{{$tag->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="form-error event_tags"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="applybutton_right">
                            <button type="submit" class="btn btn-default profile-btn rounded-border">Save & Continue</button>
                        </div>
                    </div>
                    <input type="hidden" value="{{$eventId}}" name="event_id">
                </form>
            </div>
        </div>
    </div>
</div>