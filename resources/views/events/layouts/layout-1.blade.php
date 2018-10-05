@extends('layouts.event-layouts-master')
@section('content')
    <div class="bg-color">
        <section id="main">
            <div class="listing-single-wrap8">
                <div class="listing-single__wrap-header8">
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
                                    <a href="#" class="">
                                        @if(!empty($event->category_id)){{$event->category->name}} @else Other @endif
                                    </a>
                                </div>
                                <div class="listing-single__review">
                                    <span class="listing-single__label">Rating</span>
                                    <div class="listgo__rating">
                                        <span class="rating__star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        </span>
                                        <span class="rating__number">5.0</span>
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
                                            <a class="share-facebook facebook fb-share-button" href="" data-href="" target="_blank" title="Share on Facebook"> <i class="fa fa-facebook"></i> Facebook </a>
                                            <a class="share-twitter twitter" href="" target="_blank" title="Share on Twitter"> <i class="fa fa-twitter"></i> Twitter </a>
                                            <a class="share-googleplus googleplus" href="" target="_blank" title="Share on Google Plus"> <i class="fa fa-google-plus"></i> Google Plus </a>
                                            <a class="share-digg digg" href="" target="_blank" title="Share on Digg"> <i class="fa fa-digg"></i> Digg </a>
                                            <a class="share-reddit reddit" href="" target="_blank" title="Share on Reddit"> <i class="fa fa-reddit"></i> Reddit </a>
                                            <a class="share-linkedin linkedin" href="" target="_blank" title="Share on LinkedIn"> <i class="fa fa-linkedin"></i> LinkedIn </a>
                                            <a class="share-stumbleupon stumbleupon" href="" target="_blank" title="Share on StumbleUpon"> <i class="fa fa-stumbleupon"></i> StumbleUpon </a>
                                            <a class="share-tumblr tumblr" href="" target="_blank" title="Share on Tumblr"> <i class="fa fa-tumblr"></i> Tumblr </a>
                                            <a class="share-pinterest pinterest" href="" target="_blank" data-pin-do="buttonBookmark" title="Share on Pinterest"> <i class="fa fa-pinterest"></i> Pinterest </a>
                                            <a class="share-mail mail" href="" title="Send this article to an email"> <i class="fa fa-envelope"></i> Email </a>
                                            <a class="share-link copy_link" href="#" data-shortlink="" title="Copy link"> <i class="fa fa-link"></i> Copy Link </a>
                                        </div>
                                    </li>
                                    <li class="action__like" data-tooltip="Add to my favorite">
                                        <a class="js_favorite" href="#" data-postid="103"><i class="icon_heart_alt"></i></a>
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

                                <div class="listing-single__img-hero8 bg-scroll" style="background-image: url({{$directory['web_path'].$event->header_image}})">
                                    <img src="{{$directory['web_path'].$event->header_image}}" alt="Chilean Patagonia">
                                    <div class="overlay" style="background-color: rgba(0, 0, 0, 0.2)"></div>
                                </div>

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
                                                <p>
                                                    {!! $event->description !!}
                                                </p>
                                                <div class="tiled-gallery type-rectangular" data-original-width="1200" data-carousel-extra="{&quot;blog_id&quot;:1,&quot;permalink&quot;:&quot;https:\/\/listgo.wiloke.com\/listing\/chilean-patagonia\/&quot;,&quot;likes_blog_id&quot;:132612991}" itemscope="" itemtype="http://schema.org/ImageGallery">
                                                    <div class="gallery-row" style="width: 710px; height: 306px;"  >
                                                        <div class="gallery-group images-2" style=" width: 250px; height: 306px;" >
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 1)
                                                                <img src="{{$directory['web_path'].$event->images[0]->name}}" class="layout-img-1" style="width: 246px; height: 134px;" width="420" height="230">
                                                                @endif
                                                            </div>
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 2)
                                                                <img src="{{$directory['web_path'].$event->images[1]->name}}" style="width: 246px; height: 164px;" width="420" height="280">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="gallery-group images-1" style="width: 459px; height: 306px;" >
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 3)
                                                                <img src="{{$directory['web_path'].$event->images[2]->name}}" width="772" height="514" style="width: 455px; height: 302px;" class="layout-img-">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="gallery-row" style="width: 710px; height: 320px;">
                                                        <div class="gallery-group images-1" style="width: 479px; height: 320px;" data-original-width="810" data-original-height="541">
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 4)
                                                                <img src="{{$directory['web_path'].$event->images[3]->name}}" width="806" height="537" style="width: 475px; height: 316px;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="gallery-group images-2" style="width: 230px; height: 320px;" data-original-width="390" data-original-height="541">
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 5)
                                                                    <img src="{{$directory['web_path'].$event->images[4]->name}}" width="386" height="243" style="width: 226px; height: 142px;">
                                                                @endif
                                                            </div>
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 6)
                                                                    <img src="{{$directory['web_path'].$event->images[5]->name}}" width="386" height="290" data-original-width="386" data-original-height="290" style="width: 226px; height: 169px;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-contact-and-map" class="tab__panel default-status has-single-map">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="listing-single__contact form">
                                                        <div role="form" class="wpcf7" id="wpcf7-f6024-p103-o1" lang="en-US" dir="ltr">
                                                            <div class="screen-reader-response"></div>
                                                            <form action="/listing/chilean-patagonia/#wpcf7-f6024-p103-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                                                                <div style="display: none;">
                                                                    <input type="hidden" name="_wpcf7" value="6024">
                                                                    <input type="hidden" name="_wpcf7_version" value="5.0">
                                                                    <input type="hidden" name="_wpcf7_locale" value="en_US">
                                                                    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f6024-p103-o1">
                                                                    <input type="hidden" name="_wpcf7_container_post" value="103">
                                                                    <input type="hidden" name="_wiloke_post_author_email" value="103">
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
                                                    <div id="listing-single__map" class="listing-single__map" data-map="-41.4245,-73.096" data-marker="https://listgo.wiloke.com/wp-content/uploads/2017/06/winery.png"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-review" class="tab__panel default-status">
                                            <div id="comments" class="comments">
                                                <div class="comments__header">
                                                    <h4 class="comment__title">
                                                        05 Reviews </h4>
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
                                                        <span class="review-rating__label-title">5 Ratings</span>
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
                                                            <div class="review-rating__bar-percent" style="width: 83%"></div>
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
                                                            <div class="review-rating__bar-percent" style="width: 17%"></div>
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
                                                            <div class="review-rating__bar-percent" style="width: 0%"></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ol id="commentlist" class="commentlist" data-totalcomments="05" data-commentsperpage="50">
                                                    <li class="comment" data-reviewid="2765">
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
                                                                <h3 class="comment__name">dfbdfbdfb</h3>
                                                                <div class="comment__content">
                                                                    <p>fdbsdfbdsfbdsfb</p>
                                                                    <div class="comment__gallery popup-gallery"></div> </div>
                                                                <div class="comment__reaction">


                                                                    <a class="wiloke-listgo-thanks-for-reviewing comment-like " data-id="2765" href="#">
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
                                                        <input type="hidden" name="post_ID" value="103">
                                                        <input type="hidden" id="wiloke-listgo-nonce-field" name="wiloke-listgo-nonce-field" value="2a93e19d02"><input type="hidden" name="_wp_http_referer" value="/listing/chilean-patagonia/">
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
                                                            <div class="g-recaptcha" data-sitekey="6Ld4IzAUAAAAADwau5T3RxJtZv1Dp6aULj5X9Tvv"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Ld4IzAUAAAAADwau5T3RxJtZv1Dp6aULj5X9Tvv&amp;co=aHR0cHM6Ly9saXN0Z28ud2lsb2tlLmNvbTo0NDM.&amp;hl=en&amp;v=v1537770717608&amp;size=normal&amp;cb=k3cjieau49xr" width="304" height="78" role="presentation" name="a-s8hqb6qt81sj" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div></div>
                                                        </div>
                                                        <p class="col-sm-12">
                                                            <button id="submit-review" class="listgo-btn btn-primary listgo-btn--large" type="submit">Signup &amp; Submit Review</button>
                                                            <span class="review_status success-msg"></span>
                                                        </p>
                                                    </form>
                                                </div>
                                            </div> </div>
                                    </div> </div>
                                <div class="listing-single__claim">
                                    <div class="listing-single__claim-content">
                                        <h4 class="listing-single__claim-title">Is this your business?</h4>
                                        <p class="listing-single__claim-description">Claim listing is the best way to manage and protect your business</p>
                                    </div>
                                    <a id="wiloke-claim-listing" href="#" data-modal="#wiloke-form-claim-information-wrapper" class="listgo-btn btn-primary">Claim it now!</a>
                                </div>

                                <div class="listing-single__related">
                                    <h3 class="listing-single__related-title">More Listings By Diane Lucas</h3>
                                    <div class="row row-clear-lines">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="listing_related-item">
                                                <a href="https://listgo.wiloke.com/listing/essential-adventures-in-south-america/">
                                                    <div class="listing_related-item__media" style="background-image: url(https://i1.wp.com/listgo.wiloke.com/wp-content/uploads/2017/05/post_407.jpg?fit=460%2C307&amp;ssl=1)">
                                                        <img src="https://i1.wp.com/listgo.wiloke.com/wp-content/uploads/2017/05/post_407.jpg?fit=460%2C307&amp;ssl=1" alt="Essential adventures in South America">
                                                    </div>
                                                    <div class="listing_related-item__body">
                                                        <h2 class="listing_related-item__title">Essential adventures in South America</h2>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-single-bar">
                                    <div class="container">
                                        <ul class="tab__nav" style="display: inline-block;">
                                            <li class="active"><a href="#tab-description">Description</a></li>
                                            <li class="default-status has-single-map"><a href="#tab-contact-and-map-prefix5bb1f38e520c2">Contact Us</a></li>
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
                                                        <a class="share-facebook facebook fb-share-button" href="https://facebook.com/sharer.php?u=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;t=Chilean+Patagonia" data-href="https://listgo.wiloke.com/listing/chilean-patagonia/" target="_blank" title="Share on Facebook"> <i class="fa fa-facebook"></i> Facebook </a><a class="share-twitter twitter" href="https://twitter.com/intent/tweet?text=Chilean+Patagonia-https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;source=webclient" target="_blank" title="Share on Twitter"> <i class="fa fa-twitter"></i> Twitter </a><a class="share-googleplus googleplus" href="https://google.com/bookmarks/mark?op=edit&amp;bkmk=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;title=Chilean+Patagonia" target="_blank" title="Share on Google Plus"> <i class="fa fa-google-plus"></i> Google Plus </a><a class="share-digg digg" href="https://www.digg.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;title=Chilean+Patagonia" target="_blank" title="Share on Digg"> <i class="fa fa-digg"></i> Digg </a><a class="share-reddit reddit" href="https://reddit.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;title=Chilean+Patagonia" target="_blank" title="Share on Reddit"> <i class="fa fa-reddit"></i> Reddit </a><a class="share-linkedin linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;title=Chilean+Patagonia" target="_blank" title="Share on LinkedIn"> <i class="fa fa-linkedin"></i> LinkedIn </a><a class="share-stumbleupon stumbleupon" href="http://www.stumbleupon.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;title=Chilean+Patagonia" target="_blank" title="Share on StumbleUpon"> <i class="fa fa-stumbleupon"></i> StumbleUpon </a><a class="share-tumblr tumblr" href="https://www.tumblr.com/share/link?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;name=Chilean+Patagonia" target="_blank" title="Share on Tumblr"> <i class="fa fa-tumblr"></i> Tumblr </a><a class="share-pinterest pinterest" href="https://pinterest.com/pin/create/button/?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;media=https%3A%2F%2Fi1.wp.com%2Flistgo.wiloke.com%2Fwp-content%2Fuploads%2F2017%2F07%2Fpost_355.jpg%3Ffit%3D640%252C427%26ssl%3D1&amp;description=Chilean+Patagonia" target="_blank" data-pin-do="buttonBookmark" title="Share on Pinterest"> <i class="fa fa-pinterest"></i> Pinterest </a><a class="share-mail mail" href="mailto:?Subject=Chilean%20Patagonia&amp;Body=Click%20on%20this%20link%20to%20read%20the%20article%20https://listgo.wiloke.com/listing/chilean-patagonia/" title="Send this article to an email"> <i class="fa fa-envelope"></i> Email </a><a class="share-link copy_link" href="#" data-shortlink="https://listgo.wiloke.com/listing/chilean-patagonia/" title="Copy link"> <i class="fa fa-link"></i> Copy Link </a> </div>
                                                </li>
                                                <li class="action__like" data-tooltip="Add to my favorite">
                                                    <a class="js_favorite" href="#" data-postid="103"><i class="icon_heart_alt"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('events.partials.events-sidebar')
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection