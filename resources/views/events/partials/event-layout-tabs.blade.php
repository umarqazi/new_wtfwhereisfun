<ul class="tab__nav" style="display: inline-block;">
    <li class="@if($errors->isEmpty()) active @endif"><a href="#tab-description">Description</a></li>
    <li class="default-status has-single-map @if(!$errors->isEmpty()) active @endif"><a href="#event-tickets">Event Tickets</a></li>

    <li class="item-menu-more" style="display: none;">
        <a href="#">+ More</a>
        <ul class="sub-menu-more sub-menu"></ul>
    </li>
</ul>