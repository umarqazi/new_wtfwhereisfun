@extends('layouts.event-layouts-master')
@section('content')
    <div class="is-desktop bg-color">
        <section id="main">
            <div class="temp_3 listing-single-wrap7">

                <div class="listing-single__hero7 bg-scroll" style="background-image: url({{$directory['web_path'].$event->header_image}})">
                    <div class="overlay" style="background-color: rgba(0, 0, 0, 0.339)"></div>
                </div>

                <div class="listing-single__wrap-header7">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="listing-single__header">
                                    <div class="listing-single__title">
                                        <h1 style="font-size: 30px;">{{$event->title}}</h1>
                                    </div>
                                    <div class="listing-single__meta">
                                        <div class="listing-single__date">
                                            <span class="listing-single__label">Posted on</span>
                                            {{monthDateYearFromat($event->created_at)}}
                                        </div>
                                        <div class="listing__meta-cat">
                                            <span class="listing-single__label">Category</span>
                                            <a href="" class="">@if(!empty($event->category_id)){{$event->category->name}} @else Other @endif
                                            </a>
                                        </div>
                                        <div class="listing-single__review">
                                            <span class="listing-single__label">Rating</span>
                                            <div class="listgo__rating">
                                            <span class="rating__star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                                <span class="rating__number">3.5</span>
                                            </div>
                                        </div>
                                        <div class="listing-single__status">
                                            <span class="listing-single__label">Status</span>
                                            <span class="ongroup">
                                            @if($event->is_approved)
                                                    <span class="onclose green">Approved</span>
                                                @else
                                                    <span class="onclose red">Not Approved</span>
                                                @endif
                                                <span class="onopensin yellow">
                                                Opens at 08:30:AM today
                                            </span>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="listing-single__actions">
                                        <ul>
                                            <li class="js_report action__report" data-tooltip="Report">
                                                <a href="#"><i class="icon_error-triangle_alt"></i></a>
                                            </li>
                                            <li class="action__share" data-tooltip="Share">
                                                <a href="#"><i class="social_share"></i></a>
                                                <div class="wiloke-sharing-post-social action__share-list">
                                                    <a class="share-facebook facebook fb-share-button" href="https://facebook.com/sharer.php?u=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fgage-spa%2F&amp;t=Gage+Spa" data-href="https://listgo.wiloke.com/listing/gage-spa/" target="_blank" title="Share on Facebook"> <i class="fa fa-facebook"></i> Facebook </a>
                                                    <a class="share-twitter twitter" href="https://twitter.com/intent/tweet?text=Gage+Spa-https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fgage-spa%2F&amp;source=webclient" target="_blank" title="Share on Twitter"> <i class="fa fa-twitter"></i> Twitter </a>
                                                    <a class="share-googleplus googleplus" href="https://google.com/bookmarks/mark?op=edit&amp;bkmk=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fgage-spa%2F&amp;title=Gage+Spa" target="_blank" title="Share on Google Plus"> <i class="fa fa-google-plus"></i> Google Plus </a>
                                                    <a class="share-digg digg" href="https://www.digg.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fgage-spa%2F&amp;title=Gage+Spa" target="_blank" title="Share on Digg"> <i class="fa fa-digg"></i> Digg </a>
                                                    <a class="share-reddit reddit" href="https://reddit.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fgage-spa%2F&amp;title=Gage+Spa" target="_blank" title="Share on Reddit"> <i class="fa fa-reddit"></i> Reddit </a>
                                                    <a class="share-linkedin linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fgage-spa%2F&amp;title=Gage+Spa" target="_blank" title="Share on LinkedIn"> <i class="fa fa-linkedin"></i> LinkedIn </a>
                                                    <a class="share-stumbleupon stumbleupon" href="http://www.stumbleupon.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fgage-spa%2F&amp;title=Gage+Spa" target="_blank" title="Share on StumbleUpon"> <i class="fa fa-stumbleupon"></i> StumbleUpon </a>
                                                    <a class="share-tumblr tumblr" href="https://www.tumblr.com/share/link?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fgage-spa%2F&amp;name=Gage+Spa" target="_blank" title="Share on Tumblr"> <i class="fa fa-tumblr"></i> Tumblr </a>
                                                    <a class="share-pinterest pinterest" href="https://pinterest.com/pin/create/button/?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fgage-spa%2F&amp;media=https%3A%2F%2Fi0.wp.com%2Flistgo.wiloke.com%2Fwp-content%2Fuploads%2F2017%2F08%2Fpost_444.jpg%3Ffit%3D640%252C425%26ssl%3D1&amp;description=Gage+Spa" target="_blank" data-pin-do="buttonBookmark" title="Share on Pinterest"> <i class="fa fa-pinterest"></i> Pinterest </a>
                                                    <a class="share-mail mail" href="mailto:?Subject=Gage%20Spa&amp;Body=Click%20on%20this%20link%20to%20read%20the%20article%20https://listgo.wiloke.com/listing/gage-spa/" title="Send this article to an email"> <i class="fa fa-envelope"></i> Email </a>
                                                    <a class="share-link copy_link" href="#" data-shortlink="https://listgo.wiloke.com/listing/gage-spa/" title="Copy link"> <i class="fa fa-link"></i> Copy Link </a>
                                                </div>
                                            </li>
                                            <li class="action__like" data-tooltip="Add to my favorite">
                                                <a class="js_favorite" href="#" data-postid="69"><i class="icon_heart_alt"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-push-4">
                            <div class="listing-single" style="margin-top: -280px;">
                                <div class="tab tab--2 listing-single__tab">

                                    @include('events.partials.event-layout-tabs')

                                    <div class="tab__content">
                                        <div id="tab-description" class="tab__panel active">
                                            <div class="listing-single__content">
                                                @include('events.partials.event-description')
                                            </div>
                                        </div>

                                        <div id="event-tickets" class="tab__panel default-status has-single-map">
                                            @include('events.partials.event-tickets')
                                        </div>

                                    </div>
                                </div>

                                @include('events.partials.event-more')

                            </div>
                        </div>

                        @include('events.partials.event-sidebar')

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection