@extends('layouts.event-layouts-master')
@section('content')
    <section id="main">
        <div class="listing-single-wrap5">
            <div class="listing-single__hero5 bg-scroll" style="background-image: url({{$directory['web_path'].$event->header_image}})">
                <div class="overlay" style="background-color: rgba(0, 0, 0, 0.357)"></div>
            </div>


            <div class="listing-single__wrap-header5">
                <div class="container">
                    <div class="listing-single__header">
                        <div class="listing-single__title">
                            <h1>{{$event->title}}</h1>
                        </div>
                        <div class="listing-single__meta">
                            <div class="listing-single__date">
                                <span class="listing-single__label">Posted on</span>
                                {{monthDateYearFromat($event->created_at)}}
                            </div>
                            <div class="listing__meta-cat">
                                <span class="listing-single__label">Category</span>
                                <a href="" class="">@if(!empty($event->category_id)){{$event->category->name}} @else Other @endif</a>
                            </div>
                            <div class="listing-single__review">
                                <span class="listing-single__label">Rating</span>
                                <div class="listgo__rating">
                                    <span class="rating__star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    </span>
                                    <span class="rating__number">4.8</span>
                                </div>
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
                                        <a class="share-facebook facebook fb-share-button" href="https://facebook.com/sharer.php?u=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;t=Hoa+Lu+and+Tam+Coc" data-href="https://listgo.wiloke.com/listing/hoa-lu-and-tam-coc/" target="_blank" title="Share on Facebook"> <i class="fa fa-facebook"></i> Facebook </a>
                                        <a class="share-twitter twitter" href="https://twitter.com/intent/tweet?text=Hoa+Lu+and+Tam+Coc-https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;source=webclient" target="_blank" title="Share on Twitter"> <i class="fa fa-twitter"></i> Twitter </a>
                                        <a class="share-googleplus googleplus" href="https://google.com/bookmarks/mark?op=edit&amp;bkmk=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;title=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on Google Plus"> <i class="fa fa-google-plus"></i> Google Plus </a>
                                        <a class="share-digg digg" href="https://www.digg.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;title=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on Digg"> <i class="fa fa-digg"></i> Digg </a>
                                        <a class="share-reddit reddit" href="https://reddit.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;title=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on Reddit"> <i class="fa fa-reddit"></i> Reddit </a>
                                        <a class="share-linkedin linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;title=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on LinkedIn"> <i class="fa fa-linkedin"></i> LinkedIn </a>
                                        <a class="share-stumbleupon stumbleupon" href="http://www.stumbleupon.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;title=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on StumbleUpon"> <i class="fa fa-stumbleupon"></i> StumbleUpon </a>
                                        <a class="share-tumblr tumblr" href="https://www.tumblr.com/share/link?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;name=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on Tumblr"> <i class="fa fa-tumblr"></i> Tumblr </a>
                                        <a class="share-pinterest pinterest" href="https://pinterest.com/pin/create/button/?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;media=https%3A%2F%2Fi0.wp.com%2Flistgo.wiloke.com%2Fwp-content%2Fuploads%2F2017%2F06%2F7-1.jpg%3Ffit%3D640%252C382%26ssl%3D1&amp;description=Hoa+Lu+and+Tam+Coc" target="_blank" data-pin-do="buttonBookmark" title="Share on Pinterest"> <i class="fa fa-pinterest"></i> Pinterest </a>
                                        <a class="share-mail mail" href="mailto:?Subject=Hoa%20Lu%20and%20Tam%20Coc&amp;Body=Click%20on%20this%20link%20to%20read%20the%20article%20https://listgo.wiloke.com/listing/hoa-lu-and-tam-coc/" title="Send this article to an email"> <i class="fa fa-envelope"></i> Email </a>
                                        <a class="share-link copy_link" href="#" data-shortlink="https://listgo.wiloke.com/listing/hoa-lu-and-tam-coc/" title="Copy link"> <i class="fa fa-link"></i> Copy Link </a>
                                    </div>
                                </li>
                                <li class="action__like" data-tooltip="Add to my favorite">
                                    <a class="js_favorite" href="#" data-postid="131"><i class="icon_heart_alt"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="listing-single">
                            <div class="tab tab--2 listing-single__tab">
                                <ul class="tab__nav" style="display: inline-block;">
                                    <li class="active"><a href="#tab-description">Description</a></li>
                                    <li class="default-status has-single-map"><a href="#tab-contact-and-map">Contact Us</a></li>
                                    <li class="default-status"><a href="#tab-review">Review &amp; Rating</a></li>

                                    <li class="item-menu-more" style="display: none;">
                                        <a href="#">+ More</a>
                                        <ul class="sub-menu-more sub-menu"></ul>
                                    </li>
                                </ul> <div class="tab__content">
                                    <div id="tab-description" class="tab__panel active">
                                        <div class="listing-single__content">
                                            <p>{!! $event->description !!}</p>
                                            <div class="tiled-gallery type-rectangular" data-original-width="1200" >
                                                <div class="gallery-row" style="width: 750px; height: 108px;" data-original-width="1200" data-original-height="174">
                                                    <div class="gallery-group images-1" style="width: 166px; height: 108px;" data-original-width="266" data-original-height="174">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large" >
                                                            @if(count($event->images) >= 1)
                                                            <img src="{{$directory['web_path'].$event->images[0]->name}}" width="262" height="170" data-original-width="262" data-original-height="170" style="width: 162px; height: 104px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-1" style="width: 196px; height: 108px;" data-original-width="315" data-original-height="174">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 2)
                                                            <img src="{{$directory['web_path'].$event->images[1]->name}}" width="311" height="170" data-original-width="311" data-original-height="170" style="width: 192px; height: 104px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-1" style="width: 228px; height: 108px;" data-original-width="365" data-original-height="174">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 3)
                                                            <img src="{{$directory['web_path'].$event->images[2]->name}}" width="361" height="170" data-original-width="361" data-original-height="170" style="width: 224px; height: 104px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-1" style="width: 158px; height: 108px;" data-original-width="254" data-original-height="174">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 4)
                                                            <img src="{{$directory['web_path'].$event->images[3]->name}}" width="250" height="170" data-original-width="250" data-original-height="170" style="width: 154px; height: 104px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                    <div id="tab-contact-and-map" class="tab__panel default-status has-single-map">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="listing-single__contact form">
                                                    <div role="form" class="wpcf7" id="wpcf7-f6024-p131-o1" lang="en-US" dir="ltr">
                                                        <div class="screen-reader-response"></div>
                                                        <form action="/listing/hoa-lu-and-tam-coc/#wpcf7-f6024-p131-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                                                            <div style="display: none;">
                                                                <input type="hidden" name="_wpcf7" value="6024">
                                                                <input type="hidden" name="_wpcf7_version" value="5.0">
                                                                <input type="hidden" name="_wpcf7_locale" value="en_US">
                                                                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f6024-p131-o1">
                                                                <input type="hidden" name="_wpcf7_container_post" value="131">
                                                                <input type="hidden" name="_wiloke_post_author_email" value="131">
                                                            </div>
                                                            <p><label> Your Name (required)<br>
                                                                    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </label></p>
                                                            <p><label> Your Email (required)<br>
                                                                    <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </label></p>
                                                            <p><label> Subject<br>
                                                                    <span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </label></p>
                                                            <p><label> Your Message<br>
                                                                    <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </label></p>
                                                            <p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></p>
                                                            <div class="wpcf7-response-output wpcf7-display-none"></div></form></div> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="listing-single__map" class="listing-single__map" data-map="20.213,105.923" data-marker="https://listgo.wiloke.com/wp-content/uploads/2017/06/destinations.png"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-review" class="tab__panel default-status">
                                        <div id="comments" class="comments">
                                            <div class="comments__header">
                                                <h4 class="comment__title">
                                                    09 Reviews </h4>
                                                <select id="comments_orderby" name="comments_orderby" class="comments__header-order">
                                                    <option value="newest_first">Newest First</option>
                                                    <option value="top_review">Top Reviews</option>
                                                </select>
                                            </div>
                                            <ul class="review-rating">
                                                <li class="review-rating__label">
<span class="review-rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half-o"></i>
</span>
                                                    <span class="review-rating__label-title">9 Ratings</span>
                                                </li>
                                                <li class="review-rating__item">
<span class="review-rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</span>
                                                    <div class="review-rating__bar">
                                                        <div class="review-rating__bar-percent" style="width: 77%"></div>
                                                    </div>
                                                </li>
                                                <li class="review-rating__item">
<span class="review-rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
</span>
                                                    <div class="review-rating__bar">
                                                        <div class="review-rating__bar-percent" style="width: 21%"></div>
                                                    </div>
                                                </li>
                                                <li class="review-rating__item">
<span class="review-rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
</span>
                                                    <div class="review-rating__bar">
                                                        <div class="review-rating__bar-percent" style="width: 0%"></div>
                                                    </div>
                                                </li>
                                                <li class="review-rating__item">
<span class="review-rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
</span>
                                                    <div class="review-rating__bar">
                                                        <div class="review-rating__bar-percent" style="width: 0%"></div>
                                                    </div>
                                                </li>
                                                <li class="review-rating__item">
<span class="review-rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-star-o"></i>
</span>
                                                    <div class="review-rating__bar">
                                                        <div class="review-rating__bar-percent" style="width: 3%"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ol id="commentlist" class="commentlist" data-totalcomments="09" data-commentsperpage="50">
                                                <li class="comment" data-reviewid="4663">
                                                    <div class="comment__inner">
                                                        <div class="comment__avatar">
                                                            <a href="https://listgo.wiloke.com/author/">
                                                                <span style="background-color: #00a4e4" class="widget_author__avatar-placeholder"></span> </a>
                                                        </div>
                                                        <div class="comment__body">
<span class="listgo__rating">
<span class="rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</span>
<span class="rating__number">5</span>
</span>
                                                            <div class="comment__by-role">
                                                                <span class="comment__by"></span>
                                                                <span class="member-item__role" style="color: #f5af02">
<i class="fa fa-user"></i>
Subscriber </span>
                                                                <span class="comment__date">Oct 02, 2017</span>
                                                            </div>
                                                            <h3 class="comment__name">Beautyful Viet Nam</h3>
                                                            <div class="comment__content">
                                                                <p>Duis maximus posuere scelerisque. Praesent iaculis tellus urna, a auctor ligula tempor eget. Quisque ut tortor viverra nisl aliquam accumsan quis non metus. Morbi sit amet massa ornare, blandit nibh nec, fermentum ligula.</p>
                                                                <div class="comment__gallery popup-gallery"></div> </div>
                                                            <div class="comment__reaction">


                                                                <a class="wiloke-listgo-thanks-for-reviewing comment-like " data-id="4663" href="#">
                                                                    <i class="wil-icon wil-icon-like"></i>
                                                                    <span class="comment-like__count">1</span>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="comment" data-reviewid="2767">
                                                    <div class="comment__inner">
                                                        <div class="comment__avatar">
                                                            <a href="https://listgo.wiloke.com/author/">
                                                                <span style="background-color: #00a4e4" class="widget_author__avatar-placeholder"></span> </a>
                                                        </div>
                                                        <div class="comment__body">
<span class="listgo__rating">
<span class="rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
 <i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</span>
<span class="rating__number">5</span>
</span>
                                                            <div class="comment__by-role">
                                                                <span class="comment__by"></span>
                                                                <span class="member-item__role" style="color: #f5af02">
<i class="fa fa-user"></i>
Subscriber </span>
                                                                <span class="comment__date">Aug 11, 2017</span>
                                                            </div>
                                                            <h3 class="comment__name">Hduiek fidele b fkkfbd</h3>
                                                            <div class="comment__content">
                                                                <p>Kann ok ills kläglich Nile Lyon skyline gel Gangnam flektiert Fall Pflege Döner</p>
                                                            </div>
                                                            <div class="comment__reaction">


                                                                <a class="wiloke-listgo-thanks-for-reviewing comment-like " data-id="2767" href="#">
                                                                    <i class="wil-icon wil-icon-like"></i>
                                                                    <span class="comment-like__count">1</span>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="comment" data-reviewid="2724">
                                                    <div class="comment__inner">
                                                        <div class="comment__avatar">
                                                            <a href="https://listgo.wiloke.com/author/">
                                                                <span style="background-color: #00a4e4" class="widget_author__avatar-placeholder"></span> </a>
                                                        </div>
                                                        <div class="comment__body">
<span class="listgo__rating">
<span class="rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</span>
<span class="rating__number">5</span>
</span>
                                                            <div class="comment__by-role">
                                                                <span class="comment__by"></span>
                                                                <span class="member-item__role" style="color: #f5af02">
<i class="fa fa-user"></i>
Subscriber </span>
                                                                <span class="comment__date">Aug 11, 2017</span>
                                                            </div>
                                                            <h3 class="comment__name">I love Ninh binh</h3>
                                                            <div class="comment__content">
                                                                <p>I came here last year, the nature is so beautiful</p>
                                                            </div>
                                                            <div class="comment__reaction">


                                                                <a class="wiloke-listgo-thanks-for-reviewing comment-like " data-id="2724" href="#">
                                                                    <i class="wil-icon wil-icon-like"></i>
                                                                    <span class="comment-like__count">1</span>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="comment" data-reviewid="2578">
                                                    <div class="comment__inner">
                                                        <div class="comment__avatar">
                                                            <a href="https://listgo.wiloke.com/author/">
                                                                <span style="background-color: #00a4e4" class="widget_author__avatar-placeholder"></span> </a>
                                                        </div>
                                                        <div class="comment__body">
<span class="listgo__rating">
<span class="rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
</span>
<span class="rating__number">4</span>
</span>
                                                            <div class="comment__by-role">
                                                                <span class="comment__by"></span>
                                                                <span class="member-item__role" style="color: #f5af02">
<i class="fa fa-user"></i>
Subscriber </span>
                                                                <span class="comment__date">Aug 07, 2017</span>
                                                            </div>
                                                            <h3 class="comment__name">ertertretretretretretretre</h3>
                                                            <div class="comment__content">
                                                                <p>dfdfdfdf</p>
                                                                <div class="comment__gallery popup-gallery"> <a href="https://listgo.wiloke.com/wp-content/uploads/2017/08/Resize-2-1.jpg" class="bg-scroll" style="background-image: url(https://i2.wp.com/listgo.wiloke.com/wp-content/uploads/2017/08/Resize-2-1.jpg?resize=150%2C150&amp;ssl=1)"><img src="https://listgo.wiloke.com/wp-content/uploads/2017/08/Resize-2-1.jpg" alt="ertertretretretretretretre"></a>
                                                                </div> </div>
                                                            <div class="comment__reaction">


                                                                <a class="wiloke-listgo-thanks-for-reviewing comment-like " data-id="2578" href="#">
                                                                    <i class="wil-icon wil-icon-like"></i>
                                                                    <span class="comment-like__count">1</span>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="comment" data-reviewid="1984">
                                                    <div class="comment__inner">
                                                        <div class="comment__avatar">
                                                            <a href="https://listgo.wiloke.com/author/admin/">
                                                                <img src="https://i0.wp.com/listgo.wiloke.com/wp-content/uploads/2017/07/about_1.jpg?fit=90%2C90&amp;ssl=1" alt="Peter Larson" height="150" width="150" class="avatar">
                                                            </a>
                                                        </div>
                                                        <div class="comment__body">
<span class="listgo__rating">
<span class="rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</span>
<span class="rating__number">5</span>
</span>
                                                            <div class="comment__by-role">
                                                                <span class="comment__by">Peter Larson</span>
                                                                <span class="member-item__role" style="color: rgb(230, 51, 42)">
<img src="https://listgo.wiloke.com/wp-content/uploads/2017/08/admin.png" alt="Badge">
Administrator </span>
                                                                <span class="comment__date">Jul 19, 2017</span>
                                                            </div>
                                                            <h3 class="comment__name">Really cute restaurent</h3>
                                                            <div class="comment__content">
                                                                <p>Really cute kitschy breakfast/brunch place close to MIT/Harvard. Parking can be a pain but it's located in a really cute recently-renovated plaza. We came on a Friday morning and there was still a wait despite it being a weekday. The indoor waiting area is adorably geeky, and we were seated pretty promptly (it was only about 10-15 mins). Our service was quick and friendly and they have some cool retro decorations around. I ordered the eggs benedict which also came with potatoes and bacon (your choice)</p>
                                                            </div>
                                                            <div class="comment__reaction">


                                                                <a class="wiloke-listgo-thanks-for-reviewing comment-like " data-id="1984" href="#">
                                                                    <i class="wil-icon wil-icon-like"></i>
                                                                    <span class="comment-like__count">1</span>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="comment" data-reviewid="1761">
                                                    <div class="comment__inner">
                                                        <div class="comment__avatar">
                                                            <a href="https://listgo.wiloke.com/author/">
                                                                <span style="background-color: #00a4e4" class="widget_author__avatar-placeholder"></span> </a>
                                                        </div>
                                                        <div class="comment__body">
<span class="listgo__rating">
<span class="rating__star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</span>
<span class="rating__number">5</span>
</span>
                                                            <div class="comment__by-role">
                                                                <span class="comment__by"></span>
                                                                <span class="member-item__role" style="color: #f5af02">
<i class="fa fa-user"></i>
Subscriber </span>
                                                                <span class="comment__date">Jul 17, 2017</span>
                                                            </div>
                                                            <h3 class="comment__name">Excellent</h3>
                                                            <div class="comment__content">
                                                                <p>Nullam posuere semper urna, eget laoreet magna. Vivamus elit enim, blandit varius nisi eu, sagittis bibendum sapien. Proin quis odio eros. Nam finibus purus ex, eu malesuada ex ultricies sit amet. Pellentesque vel ante consequat libero commodo pellentesque in et metus. Vivamus elementum ultrices ligula, id aliquet tellus ultrices at. Duis maximus posuere scelerisque. Praesent iaculis tellus urna, a auctor ligula tempor eget. Quisque ut tortor viverra nisl aliquam accumsan quis non metus. Morbi sit amet massa ornare, blandit nibh nec, fermentum ligula.</p>
                                                            </div>
                                                            <div class="comment__reaction">


                                                                <a class="wiloke-listgo-thanks-for-reviewing comment-like " data-id="1761" href="#">
                                                                    <i class="wil-icon wil-icon-like"></i>
                                                                    <span class="comment-like__count">1</span>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                            <div id="pagination-placeholder" class="nav-links text-center"></div>
                                        </div>
                                        <div id="comment-respond" class="comment-respond">
                                            <h3 class="comment-reply-title">Write a Review</h3>
                                            <div class="row">
                                                <form id="form-rating" action="#" class="comment-form" enctype="multipart/form-data" method="POST">
                                                    <input type="hidden" name="post_ID" value="131">
                                                    <input type="hidden" id="wiloke-listgo-nonce-field" name="wiloke-listgo-nonce-field" value="a61ca52830"><input type="hidden" name="_wp_http_referer" value="/listing/hoa-lu-and-tam-coc/">
                                                    <p class="col-sm-12">
                                                        <label>Your overall rating of this property <sup>*</sup></label>
                                                        <span class="comment__rate-wrap">
<span class="comment__rate">
<span class="selected">
<a class="fa fa-star-o" data-score="1" data-title="Terrible"></a>
<a class="fa fa-star-o" data-score="2" data-title="Poor"></a>
<a class="fa fa-star-o" data-score="3" data-title="Average"></a>
<a class="fa fa-star-o" data-score="4" data-title="Very Good"></a>
<a class="fa fa-star-o active" data-score="5" data-title="Excellent"></a>
</span>
<span class="comment__rate-placeholder" data-placeholder="Click to rate">Click to rate</span>
</span>
</span>
                                                        <input type="hidden" name="rating" id="rating" value="5" required="">
                                                    </p>
                                                    <p class="col-sm-12 form-item">
                                                        <label for="username">Username <sup>*</sup></label>
                                                        <input id="username" name="username" type="text" required="" aria-required="true">
                                                    </p>
                                                    <p class="col-sm-12 form-item">
                                                        <label for="email">Email <sup>*</sup></label>
                                                        <input id="email" name="email" type="text" required="" aria-required="true">
                                                    </p>
                                                    <p class="col-sm-12 form-item">
                                                        <label for="password">Password <sup>*</sup></label>
                                                        <input id="password" name="password" type="password" required="" aria-required="true">
                                                    </p>
                                                    <p class="col-sm-12">
                                                        <label for="title">Title of your review <sup>*</sup></label>
                                                        <input id="title" name="title" type="text" required="" aria-required="true" placeholder="Summarize the service or highlight an interesting detail">
                                                    </p>
                                                    <p class="col-sm-12">
                                                        <label for="review">Your Review <sup>*</sup></label>
                                                        <textarea id="review" name="review" rows="5" cols="10" placeholder="Describe your experience" required=""></textarea>
                                                    </p>
                                                    <div class="col-sm-12">
                                                        <div id="preview-gallery" class="comment__gallery" data-allow="50"></div>
                                                        <label for="upload_photos" class="input-upload-file">
                                                            <input id="upload_photos" type="file" name="upload_photos[]" multiple="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                                                            <span>Add a photo</span>
                                                            <i>The image size should smaller than or equal to 50M </i>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-12" style="margin-bottom: 30px;">
                                                        <div class="g-recaptcha" data-sitekey="6Ld4IzAUAAAAADwau5T3RxJtZv1Dp6aULj5X9Tvv"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=2&amp;k=6Ld4IzAUAAAAADwau5T3RxJtZv1Dp6aULj5X9Tvv&amp;co=aHR0cHM6Ly9saXN0Z28ud2lsb2tlLmNvbTo0NDM.&amp;hl=en&amp;v=v1537165899310&amp;size=normal&amp;cb=rmocr3634dgg" width="304" height="78" role="presentation" name="a-i3qk6ejb88om" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div>
                                                    </div>
                                                    <p class="col-sm-12">
                                                        <button id="submit-review" class="listgo-btn btn-primary listgo-btn--large" type="submit">Signup &amp; Submit Review</button>
                                                        <span class="review_status success-msg"></span>
                                                    </p>
                                                </form>
                                            </div>
                                        </div> </div>
                                </div>
                            </div>
                            <div class="listing-single__claim">
                                <div class="listing-single__claim-content">
                                    <h4 class="listing-single__claim-title">Is this your business?</h4>
                                    <p class="listing-single__claim-description">Claim listing is the best way to manage and protect your business</p>
                                </div>
                                <a id="wiloke-claim-listing" href="#" data-modal="#wiloke-form-claim-information-wrapper" class="listgo-btn btn-primary">Claim it now!</a>
                            </div>


                            <div class="listing-single-bar">
                                <div class="container">
                                    <ul class="tab__nav" style="display: inline-block;">
                                        <li class="active"><a href="#tab-description">Description</a></li>
                                        <li class="default-status has-single-map"><a href="#tab-contact-and-map-prefix5bac9358c71e0">Contact Us</a></li>
                                        <li class="default-status"><a href="#tab-review">Review &amp; Rating</a></li>

                                        <li class="item-menu-more" style="display: none;">
                                            <a href="#">+ More</a>
                                            <ul class="sub-menu-more sub-menu"></ul>
                                        </li>
                                    </ul> <div class="listing-single__actions">
                                        <ul>
                                            <li class="js_report action__report" data-tooltip="Report">
                                                <a href="#"><i class="icon_error-triangle_alt"></i></a>
                                            </li>
                                            <li class="action__share" data-tooltip="Share">
                                                <a href="#"><i class="social_share"></i></a>
                                                <div class="wiloke-sharing-post-social action__share-list">
                                                    <a class="share-facebook facebook fb-share-button" href="https://facebook.com/sharer.php?u=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;t=Hoa+Lu+and+Tam+Coc" data-href="https://listgo.wiloke.com/listing/hoa-lu-and-tam-coc/" target="_blank" title="Share on Facebook"> <i class="fa fa-facebook"></i> Facebook </a><a class="share-twitter twitter" href="https://twitter.com/intent/tweet?text=Hoa+Lu+and+Tam+Coc-https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;source=webclient" target="_blank" title="Share on Twitter"> <i class="fa fa-twitter"></i> Twitter </a><a class="share-googleplus googleplus" href="https://google.com/bookmarks/mark?op=edit&amp;bkmk=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;title=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on Google Plus"> <i class="fa fa-google-plus"></i> Google Plus </a><a class="share-digg digg" href="https://www.digg.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;title=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on Digg"> <i class="fa fa-digg"></i> Digg </a><a class="share-reddit reddit" href="https://reddit.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;title=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on Reddit"> <i class="fa fa-reddit"></i> Reddit </a><a class="share-linkedin linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;title=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on LinkedIn"> <i class="fa fa-linkedin"></i> LinkedIn </a><a class="share-stumbleupon stumbleupon" href="http://www.stumbleupon.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;title=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on StumbleUpon"> <i class="fa fa-stumbleupon"></i> StumbleUpon </a><a class="share-tumblr tumblr" href="https://www.tumblr.com/share/link?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;name=Hoa+Lu+and+Tam+Coc" target="_blank" title="Share on Tumblr"> <i class="fa fa-tumblr"></i> Tumblr </a><a class="share-pinterest pinterest" href="https://pinterest.com/pin/create/button/?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fhoa-lu-and-tam-coc%2F&amp;media=https%3A%2F%2Fi0.wp.com%2Flistgo.wiloke.com%2Fwp-content%2Fuploads%2F2017%2F06%2F7-1.jpg%3Ffit%3D640%252C382%26ssl%3D1&amp;description=Hoa+Lu+and+Tam+Coc" target="_blank" data-pin-do="buttonBookmark" title="Share on Pinterest"> <i class="fa fa-pinterest"></i> Pinterest </a><a class="share-mail mail" href="mailto:?Subject=Hoa%20Lu%20and%20Tam%20Coc&amp;Body=Click%20on%20this%20link%20to%20read%20the%20article%20https://listgo.wiloke.com/listing/hoa-lu-and-tam-coc/" title="Send this article to an email"> <i class="fa fa-envelope"></i> Email </a><a class="share-link copy_link" href="#" data-shortlink="https://listgo.wiloke.com/listing/hoa-lu-and-tam-coc/" title="Copy link"> <i class="fa fa-link"></i> Copy Link </a> </div>
                                            </li>
                                            <li class="action__like" data-tooltip="Add to my favorite">
                                                <a class="js_favorite" href="#" data-postid="131"><i class="icon_heart_alt"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 listgo-single-listing-sidebar-wrapper">
                        <div class="sidebar-background listgo-single-listing-sidebar">
                            <div id="wiloke_about-3" class="widget widget_about widget_author widget_text">
                                <div class="widget_author__header">
                                    <a href="{{$event->organizer->organizer_url}}">
                                        <div class="widget_author__avatar">
                                            @if(!is_null($event->organizer) && !empty($event->organizer->thumbnail))
                                                @php $organizerDirectory = getDirectory('organizers', $event->organizer->id); @endphp
                                                @php $organizerImage = $organizerDirectory['web_path'].$event->organizer->thumbnail @endphp
                                            @else
                                                @php $organizerImage = asset('img/default-148.png') @endphp
                                            @endif
                                            <img width="128" height="128" src="{{$organizerImage}}" class="attachment-128x128 size-128x128" sizes="(max-width: 128px) 100vw, 128px">
                                        </div>
                                        <div class="overflow-hidden">
                                            <h4 class="widget_author__name">{{$event->organizer->name}}</h4>
                                            <span class="widget_author__role">
                                                <span class="member-item__role" style="color: rgb(250, 34, 118)">
                                                    <img src="{{asset('img/admin.png')}}" alt="Badge">
                                                    Organizer
                                                </span>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="account-subscribe">
                                    <span class="followers"><a href="https://listgo.wiloke.com/info/?mode=followers&amp;user=10"><span class="count">1</span> Followers</a></span>
                                    <span class="following"><a href="https://listgo.wiloke.com/info/?mode=following&amp;user=10"><span class="count">0</span> Following</a></span>
                                    <a href="#" class="js_subscribe widget_author__follow listgo-btn listgo-btn--sm" data-authorid="10">Follow <i class="fa fa-rss"></i></a>
                                </div>
                                <div class="widget_author__content">
                                    <ul class="widget_author__address">
                                        <li>
                                            <i class="fa fa-map-marker"></i>
                                            Ninh Bình Province, Vietnam </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            <a href="tel:4562 012 1200">4562 012 1200</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-globe"></i>
                                            <a href="{{$event->organizer->organizer_url}}" target="_blank">{{$event->organizer->organizer_url}}</a>
                                        </li>
                                    </ul>
                                    <div class="widget_author__social">
                                        @if(!empty($event->organizer->facebook))<a href="https://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a> @endif
                                        @if(!empty($event->organizer->twitter))<a href="{{$event->organizer->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a> @endif
                                        @if(!empty($event->organizer->google))<a
                                                href="{{$event->organizer->google}}" target="_blank"><i class="fa fa-google-plus"></i></a> @endif
                                        @if(!empty($event->organizer->timbler))<a href="{{$event->organizer->timbler}}" target="_blank"><i class="fa fa-tumblr"></i></a> @endif
                                        @if(!empty($event->organizer->instagram))<a href="{{$event->organizer->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a> @endif
                                        @if(!empty($event->organizer->linkedin))<a href="{{$event->organizer->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a> @endif
                                    </div>
                                    <div class="widget_author__link">
                                        <a href="{{$event->organizer->website}}" target="_blank">Visit Website</a>
                                    </div>
                                </div>
                            </div>
                            <div id="wiloke_contact-2" class="widget widget_contact">
                                <h4 class="widget_title"><i class="icon_mail"></i> Contact Me</h4> <div class="contactform-wrapper">
                                    <div role="form" class="wpcf7" id="wpcf7-f6024-p131-o2" lang="en-US" dir="ltr">
                                        <div class="screen-reader-response"></div>
                                        <form action="/listing/hoa-lu-and-tam-coc/#wpcf7-f6024-p131-o2" method="post" class="wpcf7-form" novalidate="novalidate">
                                            <div style="display: none;">
                                                <input type="hidden" name="_wpcf7" value="6024">
                                                <input type="hidden" name="_wpcf7_version" value="5.0">
                                                <input type="hidden" name="_wpcf7_locale" value="en_US">
                                                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f6024-p131-o2">
                                                <input type="hidden" name="_wpcf7_container_post" value="131">
                                                <input type="hidden" name="_wiloke_post_author_email" value="131">
                                            </div>
                                            <p><label> Your Name (required)<br>
                                                    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </label></p>
                                            <p><label> Your Email (required)<br>
                                                    <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </label></p>
                                            <p><label> Subject<br>
                                                    <span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </label></p>
                                            <p><label> Your Message<br>
                                                    <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </label></p>
                                            <p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></p>
                                            <div class="wpcf7-response-output wpcf7-display-none"></div></form></div> </div>
                            </div><div id="widget_map-2" class="widget widget_map"> <div class="widgetmap">
                                    <div id="widget-map" class="widget-map" data-map="20.213,105.923" data-marker="https://listgo.wiloke.com/wp-content/uploads/2017/06/destinations.png" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div tabindex="0" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 995; transform: matrix(1, 0, 0, 1, -106, -42);"><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div style="position: absolute; z-index: 995; transform: matrix(1, 0, 0, 1, -106, -42);"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div></div></div><div style="width: 27px; height: 43px; overflow: hidden; position: absolute; left: -14px; top: -43px; z-index: 0;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 27px; height: 43px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 995; transform: matrix(1, 0, 0, 1, -106, -42);"><div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i24!3i13!4i256!2m3!1e2!6m1!3e5!2m3!1e0!2sm!3i437142040!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1301875&amp;key=AIzaSyB2s7viIU_L9PyYV0oCUYf0gkV2cCfWwUk&amp;token=115220" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i26!3i13!4i256!2m3!1e2!6m1!3e5!2m3!1e0!2sm!3i437142040!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1301875&amp;key=AIzaSyB2s7viIU_L9PyYV0oCUYf0gkV2cCfWwUk&amp;token=26249" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i24!3i14!4i256!2m3!1e2!6m1!3e5!2m3!1e0!2sm!3i437142040!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1301875&amp;key=AIzaSyB2s7viIU_L9PyYV0oCUYf0gkV2cCfWwUk&amp;token=127278" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i26!3i14!4i256!2m3!1e2!6m1!3e5!2m3!1e0!2sm!3i437142040!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1301875&amp;key=AIzaSyB2s7viIU_L9PyYV0oCUYf0gkV2cCfWwUk&amp;token=38307" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i25!3i13!4i256!2m3!1e2!6m1!3e5!2m3!1e0!2sm!3i437142040!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1301875&amp;key=AIzaSyB2s7viIU_L9PyYV0oCUYf0gkV2cCfWwUk&amp;token=5199" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i25!3i14!4i256!2m3!1e2!6m1!3e5!2m3!1e0!2sm!3i437142040!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1301875&amp;key=AIzaSyB2s7viIU_L9PyYV0oCUYf0gkV2cCfWwUk&amp;token=17257" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"><p class="gm-style-pbt"></p></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div style="width: 27px; height: 43px; overflow: hidden; position: absolute; opacity: 0; left: -14px; top: -43px; z-index: 0;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2.png" draggable="false" usemap="#gmimap0" style="position: absolute; left: 0px; top: 0px; width: 27px; height: 43px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"><map name="gmimap0" id="gmimap0"><area log="miw" coords="13.5,0,4,3.75,0,13.5,13.5,43,27,13.5,23,3.75" shape="poly" title="" style="cursor: pointer; touch-action: none;"></map></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div></div><iframe aria-hidden="true" frameborder="0" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;" src="about:blank"></iframe><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=20.213,105.923&amp;z=5&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google_white5.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 300px; height: 180px; position: absolute; left: 30px; top: 60px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2018 Google, SK telecom, ZENRIN</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 165px; bottom: 0px; width: 55px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="text-decoration: none; cursor: pointer;">Map Data</a><span style="display: none;">Map data ©2018 Google, SK telecom, ZENRIN</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2018 Google, SK telecom, ZENRIN</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><button draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button" class="gm-control-active gm-fullscreen-control" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%20018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px; margin: 11px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px; margin: 11px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px; margin: 11px;"></button><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; display: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@20.213,105.923,5z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="40" controlheight="81" style="margin: 10px; user-select: none; position: absolute; bottom: 95px; right: 40px;"><div class="gmnoprint" controlwidth="40" controlheight="81" style="position: absolute; left: 0px; top: 0px;"><div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px; height: 81px;"><button draggable="false" title="Zoom in" aria-label="Zoom in" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px; margin: 9px 11px 13px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23333%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px; margin: 9px 11px 13px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23111%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px; margin: 9px 11px 13px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); top: 0px;"></div><button draggable="false" title="Zoom out" aria-label="Zoom out" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px; margin: 13px 11px 9px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px; margin: 13px 11px 9px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px; margin: 13px 11px 9px;"></button></div></div><div class="gmnoprint" controlwidth="40" controlheight="40" style="display: none; position: absolute;"><div style="width: 40px; height: 40px;"><button draggable="false" title="Rotate map 90 degrees" aria-label="Rotate map 90 degrees" type="button" class="gm-control-active" style="background: none rgb(255, 255, 255); display: none; border: 0px; margin: 0px 0px 32px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 28px; width: 28px; margin: 6px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 28px; width: 28px; margin: 6px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 28px; width: 28px; margin: 6px;"></button><button draggable="false" title="Tilt map" aria-label="Tilt map" type="button" class="gm-tilt gm-control-active" style="background: none rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px; height: 16px; margin: 12px 11px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px; height: 16px; margin: 12px 11px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px; height: 16px; margin: 12px 11px;"></button></div></div></div><div draggable="false" class="gm-style-cc" style="position: absolute; user-select: none; height: 14px; line-height: 14px; right: 71px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><span>200 km&nbsp;</span><div style="position: relative; display: inline-block; height: 8px; bottom: -1px; width: 46px;"><div style="width: 100%; height: 4px; position: absolute; left: 0px; top: 0px;"></div><div style="width: 4px; height: 8px; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"></div><div style="width: 4px; height: 8px; position: absolute; background-color: rgb(255, 255, 255); right: 0px; bottom: 0px;"></div><div style="position: absolute; background-color: rgb(102, 102, 102); height: 2px; left: 1px; bottom: 1px; right: 1px;"></div><div style="position: absolute; width: 2px; height: 6px; left: 1px; top: 1px; background-color: rgb(102, 102, 102);"></div><div style="width: 2px; height: 6px; position: absolute; background-color: rgb(102, 102, 102); bottom: 1px; right: 1px;"></div></div></div></div></div></div><div style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;"><div><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google_gray.svg" draggable="false" style="padding: 0px; margin: 0px; border: 0px; height: 17px; vertical-align: middle; width: 52px; user-select: none;"></div><div style="line-height: 20px; margin: 15px 0px;"><span style="color: rgba(0, 0, 0, 0.87); font-size: 14px;">This page can't load Google Maps correctly.</span></div><table style="width: 100%;"><tr><td style="line-height: 16px; vertical-align: middle;"><a href="https://developers.google.com/maps/documentation/javascript/error-messages?utm_source=maps_js&amp;utm_medium=degraded&amp;utm_campaign=billing#api-key-and-billing-errors" target="_blank" rel="noopener" style="color: rgba(0, 0, 0, 0.54); font-size: 12px;">Do you own this website?</a></td><td style="text-align: right;"><button class="dismissButton">OK</button></td></tr></table></div></div>
                                    <p>Ninh Bình Province, Vietnam <a target="_blank" href="//maps.google.com/maps?daddr=20.213,105.923">(Get directions)</a></p>
                                </div>
                            </div><div id="wiloke_gallery-3" class="widget widget widget_author_gallery"><h4 class="widget_title"><i class="icon_camera_alt"></i> Gallery</h4> <div class="widget_author-gallery">
                                    <ul class="popup-gallery">
                                        <li class="">
                                            <a class="bg-scroll" href="https://i2.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/Trang-An-Eco-Ninh-Binh.jpg?fit=1980%2C1348&amp;ssl=1" data-title="Trang-An-Eco-Ninh-Binh" style="background-image: url(https://i2.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/Trang-An-Eco-Ninh-Binh.jpg?resize=150%2C150&amp;ssl=1)">
                                            </a>
                                        </li>
                                        <li class="">
                                            <a class="bg-scroll" href="https://i2.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/When-and-How-to-go-to-Vietnam-1170x550.jpg?fit=1170%2C550&amp;ssl=1" data-title="When-and-How-to-go-to-Vietnam-1170×550" style="background-image: url(https://i2.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/When-and-How-to-go-to-Vietnam-1170x550.jpg?resize=150%2C150&amp;ssl=1)">
                                            </a>
                                        </li>
                                        <li class="">
                                            <a class="bg-scroll" href="https://i2.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/vietnamù.jpg?fit=640%2C350&amp;ssl=1" data-title="vietnamù" style="background-image: url(https://i2.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/vietnamù.jpg?resize=150%2C150&amp;ssl=1)">
                                            </a>
                                        </li>
                                        <li class="author__gallery-plus">
                                            <a class="bg-scroll" href="https://i2.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/what-to-do-in-ninh-binh-itinerary-thung-nham-bird-park-sunset-.jpg?fit=1200%2C900&amp;ssl=1" data-title="what-to-do-in-ninh-binh-itinerary-thung-nham-bird-park-sunset-" style="background-image: url(https://i2.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/what-to-do-in-ninh-binh-itinerary-thung-nham-bird-park-sunset-.jpg?resize=150%2C150&amp;ssl=1)">
                                                <span class="count">+8</span>
                                            </a>
                                        </li>
                                        <li class="hidden">
                                            <a class="bg-scroll" href="https://i0.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/what-to-do-in-ninh-binh-itinerary-tam-coc-hang-mua.jpg?fit=1200%2C900&amp;ssl=1" data-title="what-to-do-in-ninh-binh-itinerary-tam-coc-hang-mua" style="background-image: url(https://i0.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/what-to-do-in-ninh-binh-itinerary-tam-coc-hang-mua.jpg?resize=150%2C150&amp;ssl=1)">
                                            </a>
                                        </li>
                                        <li class="hidden">
                                            <a class="bg-scroll" href="https://i0.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/what-to-do-in-ninh-binh-itinerary-tam-coc-paddy-rice-fields.jpg?fit=2239%2C1678&amp;ssl=1" data-title="what-to-do-in-ninh-binh-itinerary-tam-coc-paddy-rice-fields" style="background-image: url(https://i0.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/what-to-do-in-ninh-binh-itinerary-tam-coc-paddy-rice-fields.jpg?resize=150%2C150&amp;ssl=1)">
                                            </a>
                                        </li>
                                        <li class="hidden">
                                            <a class="bg-scroll" href="https://i1.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/what-to-do-in-ninh-binh-itinerary-bich-dong-temple.jpg?fit=1200%2C900&amp;ssl=1" data-title="what-to-do-in-ninh-binh-itinerary-bich-dong-temple" style="background-image: url(https://i1.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/what-to-do-in-ninh-binh-itinerary-bich-dong-temple.jpg?resize=150%2C150&amp;ssl=1)">
                                            </a>
                                        </li>
                                        <li class="hidden">
                                            <a class="bg-scroll" href="https://i0.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/Hoa-Lu-Ancient-Capital-with-Vietnam-Eco-Travel1.jpg?fit=1067%2C600&amp;ssl=1" data-title="Hoa Lu Ancient Capital with Vietnam Eco Travel(1)" style="background-image: url(https://i0.wp.com/listgo.wiloke.com/wp-content/uploads/2017/06/Hoa-Lu-Ancient-Capital-with-Vietnam-Eco-Travel1.jpg?resize=150%2C150&amp;ssl=1)">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><div id="wiloke_mailchimp-9" class="widget widget_newsletter"><h4 class="widget_title">Subscribe</h4> <div class="mailchimp__content">
                                    <p>Subscribe us and never miss our new articles</p>
                                    <form class="pi_subscribe">
                                        <input type="email" class="pi-subscribe-email wiloke-subscribe-email form-remove" placeholder="Enter your email..." value="">
                                        <button type="submit" class="wiloke-submit-subscribe pi-btn pi-subscribe form-remove" data-sendingtext="Sending">Send <i class="icon_mail_alt"></i></button>
                                        <p class="message"></p>
                                    </form>
                                </div>
                            </div> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection