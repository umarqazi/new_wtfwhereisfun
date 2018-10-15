<div class="event-description">
    @if(!empty($event->additional_message))
        <div class="addtional-msg">
            <h5>Additional Message</h5>
            <p>{{$event->additional_message}}</p>
        </div>
    @endif

    @if(!is_null($event->refund_policy))
        <div class="refund-policy">
            <h5>Refund Policy</h5>
            <p>{{$event->refund_policy->text}}</p>
        </div>
    @endif
</div>