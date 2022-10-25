@extends('frontend.main_master')

@section('title')
    @if (session()->get('language') == 'vietnamese')
        {{ $product->product_name_vn }}
    @else
        {{ $product->product_name_en }}
    @endif
@endsection
{{-- @php
dd($product->subcategory);
@endphp --}}

@section('content')
    <style>
        #description .product-tab img {
            width: 100%;
        }

    </style>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled" style="white-space: nowrap;">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#">{{ $product->category->category_name_en }}</a></li>
                    <li><a
                            href="{{ url('subcategory/product/' . $product->subcategory->id . '/' . $product->subcategory->subcategory_slug_en) }}">{{ $product->subcategory->subcategory_name_en }}</a>
                    </li>
                    <li><a
                            href="{{ url('subsubcategory/product/' . $product->subsubcategory->id . '/' . $product->subsubcategory->subsubcategory_slug_en) }}">{{ $product->subsubcategory->subsubcategory_name_en }}</a>
                    </li>
                    <li class="active">{{ $product->product_name_en }}</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row single-product">
                <div class="col-md-3 sidebar">
                    <div class="sidebar-module-container">
                        <!-- ============================================== HOT DEALS ============================================== -->
                        @include('frontend.common.hot_deals')
                        <!-- ============================================== HOT DEALS: END ============================================== -->


                        <!-- ============================================== Testimonials============================================== -->
                        {{-- @include('frontend.common.testimonials') --}}
                        <!-- ============================================== Testimonials: END ============================================== -->
                    </div>
                </div>
                <!-- /.sidebar -->
                <div class="col-md-9">
                    <div class="detail-block">
                        <div class="row wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                        @foreach ($images as $image)
                                            <div class="single-product-gallery-item" id="slide{{ $image->id }}">
                                                <a data-lightbox="image-1" data-title="Gallery"
                                                    href="{{ asset($image->photo_name) }}">
                                                    <img class="img-responsive" alt=""
                                                        src="{{ asset($image->photo_name) }}"
                                                        data-echo="{{ asset($image->photo_name) }}" />
                                                </a>
                                            </div>
                                            <!-- /.single-product-gallery-item -->
                                        @endforeach

                                    </div>
                                    <!-- /.single-product-slider -->

                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                            @foreach ($images as $image)
                                                <div class="item">
                                                    <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                        data-slide="1" href="#slide{{ $image->id }}">
                                                        <img class="img-responsive" width="85" alt=""
                                                            src="{{ asset($image->photo_name) }}"
                                                            data-echo="{{ asset($image->photo_name) }}" />
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- /#owl-single-product-thumbnails -->
                                    </div>
                                    <!-- /.gallery-thumbs -->
                                </div>
                                <!-- /.single-product-gallery -->
                            </div>
                            <!-- /.gallery-holder -->
                            <div class="col-sm-6 col-md-7 product-info-block">
                                <div class="product-info">
                                    <h1 class="name" id="productName">
                                        @if (session()->get('language') == 'vietnamese')
                                            {{ $product->product_name_vn }}
                                        @else
                                            {{ $product->product_name_en }}
                                        @endif
                                    </h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            @php
                                                $reviewsCount = App\Models\Review::where('product_id', $product->id)
                                                    ->latest()
                                                    ->get();
                                                // dd(count($reviewsCount));
                                            @endphp
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">({{ count($reviewsCount) }}
                                                        Reviews)</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">
                                                        @if ($product->product_quantity == 0)
                                                            Out Of Stock
                                                        @else
                                                            In Stock
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        @if (session()->get('language') == 'vietnamese')
                                            {{ $product->short_description_vn }}
                                        @else
                                            {{ $product->short_description_en }}
                                        @endif
                                    </div>
                                    <!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if ($product->discount_price == null || $product->discount_price == 0)
                                                        <span
                                                            class="price">{{ str_replace(',', '.', number_format($product->selling_price)) }}đ</span>
                                                    @else
                                                        <span
                                                            class="price">{{ str_replace(',', '.', number_format($product->discount_price)) }}đ</span>
                                                        <span
                                                            class="price-strike">{{ str_replace(',', '.', number_format($product->selling_price)) }}đ</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    {{-- <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                        title="Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a> --}}
                                                    <button type="button" class="btn btn-primary icon" data-toggle="tooltip"
                                                        data-placement="right" title="Add To Wishlist"
                                                        id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                                        <i class="icon fa fa-heart"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.price-container -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title control-label">Choose Color <span>*</span></label>
                                                @php
                                                    $choseColor = 0;
                                                @endphp
                                                <select required id="color"
                                                    class="form-control unicase-form-control selectpicker"
                                                    style="display: none;">
                                                    {{-- <option selected disabled>--Select Color--</option> --}}
                                                    @foreach ($product_color_vn as $color)
                                                        <option @php
                                                            $choseColor += 1;
                                                            $choseColor == 1 ? 'selected' : '';
                                                        @endphp value="{{ $color }}">
                                                            {{ ucwords($color) }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                @if ($product->product_size_vn == null || $product->product_size_vn == '')
                                                @else
                                                    <label class="info-title control-label">Choose Size
                                                        <span>*</span></label>
                                                    @php
                                                        $choseSize = 0;
                                                    @endphp
                                                    <select id="size" class="form-control unicase-form-control selectpicker"
                                                        style="display: none;">
                                                        <option disabled>--Select Size--</option>
                                                        @foreach ($product_size_vn as $size)
                                                            <option @php
                                                                $choseSize += 1;
                                                                $choseSize == 1 ? 'selected' : '';
                                                            @endphp value="{{ $size }}">
                                                                {{ ucwords($size) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="quantity-container info-container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <span class="label">Quantity :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient" id="plusQuantity">
                                                                <span class="ir"><i
                                                                        class="icon fa fa-sort-asc"></i></span>
                                                            </div>
                                                            <div class="arrow minus gradient" id="minusQuantity">
                                                                <span class="ir"><i
                                                                        class="icon fa fa-sort-desc"></i></span>
                                                            </div>
                                                        </div>
                                                        <input type="number" id="quantity" name="quantity" value="1"
                                                            min="1" />
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" id="product_id" value="{{ $product->id }}">

                                            <div class="col-sm-7">
                                                @if ($product->product_quantity > 0)
                                                    <button type="submit" onclick="addToCart()" class="btn btn-primary"><i
                                                            class="fa fa-shopping-cart inner-right-vs"></i>
                                                        ADD TO CART</button>
                                                @else
                                                    <button type="button" class="btn btn-danger"><i
                                                            class="fa fa-exclamation-circle inner-right-vs"></i>
                                                        OUT OF STOCK</button>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.quantity-container -->

                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                    <div class="addthis_inline_share_toolbox_tcyv"></div>


                                </div>
                                <!-- /.product-info -->
                            </div>
                            <!-- /.col-sm-7 -->
                        </div>
                        <!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active">
                                        <a data-toggle="tab" href="#description">DESCRIPTION</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                </ul>
                                <!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">
                                <div class="tab-content">
                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                @if (session()->get('language') == 'vietnamese')
                                                    {!! $product->long_description_vn !!}</a>
                                                @else
                                                    {!! $product->long_description_en !!}</a>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">
                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>
                                                @php
                                                    $reviews = App\Models\Review::where('product_id', $product->id)
                                                        ->latest()
                                                        ->limit(5)
                                                        ->get();
                                                @endphp
                                                <div class="reviews">
                                                    @foreach ($reviews as $review)
                                                        @if ($review->status == 0)
                                                        @else
                                                            <div class="review">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <img src="{{ !empty($review->user->profile_photo_path) ? url('upload/user_images/' . $review->user->profile_photo_path) : url('upload/no_image.jpg') }}"
                                                                            style="width: 40px; height:40px; border-radius: 100px; margin-right: 8px; margin-bottom: 8px;"
                                                                            alt=""><b>{{ $review->user->name }}</b>
                                                                    </div>
                                                                    <div class="col-md-6"></div>
                                                                </div>
                                                                <div class="review-title">
                                                                    <span
                                                                        class="summary">{{ $review->summary }}</span><span
                                                                        class="date"><i
                                                                            class="fa fa-calendar"></i><span>{{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span></span>
                                                                </div>
                                                                <div class="text">
                                                                    "{{ $review->comment }}"
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <!-- /.reviews -->
                                            </div>
                                            <!-- /.product-reviews -->

                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">

                                                </div>
                                                <!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">
                                                        @guest()
                                                            <p><b>For Add Product Review. You Need To Login First <a
                                                                        href="{{ route('login') }}">Login Here</a></b></p>
                                                        @else
                                                            <form role="form" class="cnt-form" method="POST"
                                                                action="{{ route('review.store') }}">
                                                                @csrf
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product->id }}">
                                                                <div class="row">
                                                                    <div class="col-sm-6">

                                                                        <div class="form-group">
                                                                            <label for="exampleInputSummary">Summary
                                                                                <span class="astk">*</span></label>
                                                                            <input type="text" required name="summary"
                                                                                class="form-control txt"
                                                                                id="exampleInputSummary"
                                                                                placeholder="Example: It't good" />
                                                                        </div>
                                                                        <!-- /.form-group -->
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputReview">Review
                                                                                <span class="astk">*</span></label>
                                                                            <textarea class="form-control txt txt-review" id="exampleInputReview" required rows="4"
                                                                                placeholder="Example: love it..."
                                                                                name="comment"></textarea>
                                                                        </div>
                                                                        <!-- /.form-group -->
                                                                    </div>
                                                                </div>
                                                                <!-- /.row -->

                                                                <div class="action text-right">
                                                                    <button type="submit" class="btn btn-primary btn-upper">
                                                                        SUBMIT REVIEW
                                                                    </button>
                                                                </div>
                                                                <!-- /.action -->
                                                            </form>
                                                        @endguest
                                                        <!-- /.cnt-form -->
                                                    </div>
                                                    <!-- /.form-container -->
                                                </div>
                                                <!-- /.review-form -->
                                            </div>
                                            <!-- /.product-add-review -->
                                        </div>
                                        <!-- /.product-tab -->
                                    </div>
                                    <!-- /.tab-pane -->

                                    {{-- <div id="tags" class="tab-pane">
                                        <div class="product-tag">
                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">
                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags:
                                                        </label>
                                                        <input type="email" id="exampleInputTag"
                                                            class="form-control txt" />
                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">
                                                        ADD TAGS
                                                    </button>
                                                </div>
                                                <!-- /.form-container -->
                                            </form>
                                            <!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                        single quotes
                                                        (') for phrases.</span>
                                                </div>
                                            </form>
                                            <!-- /.form-cnt -->
                                        </div>
                                        <!-- /.product-tab -->
                                    </div> --}}
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">relate products</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                            @foreach ($relatedProduct as $product)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}"><img
                                                            src="{{ asset($product->product_thumbnail) }}" alt="" /></a>
                                                </div>
                                                <!-- /.image -->
                                                @php
                                                    $amount = intval($product->selling_price) - intval($product->discount_price);
                                                    $discount = ($amount / intval($product->selling_price)) * 100;
                                                @endphp
                                                @if ($product->discount_price == null || $product->discount_price == 0 || round($discount) == 0)
                                                    <div class="tag new">
                                                        <span>new</span>
                                                    </div>
                                                @else
                                                    <div class="tag sale">
                                                        <span>{{ round($discount) }} %</span>
                                                    </div>
                                                @endif
                                                {{-- <div class="tag sale"><span>sale</span></div> --}}
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name">
                                                    <a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}">
                                                        @if (session()->get('language') == 'vietnamese')
                                                            {{ $product->product_name_vn }}
                                                    </a>
                                                @else
                                                    {{ $product->product_name_en }}</a>
                            @endif
                            </a>
                            </h3>
                            <div class="description"></div>
                            @if ($product->discount_price == null || $product->discount_price == 0)
                                <div class="product-price">
                                    <span class="price">
                                        {{ str_replace(',', '.', number_format($product->selling_price)) }}đ </span>
                                </div>
                            @else
                                <div class="product-price">
                                    <span class="price">
                                        {{ str_replace(',', '.', number_format($product->discount_price)) }}đ</span>
                                    <span
                                        class="price-before-discount">{{ str_replace(',', '.', number_format($product->selling_price)) }}đ</span>
                                </div>
                            @endif
                            <!-- /.product-price -->
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" title="Add Cart" data-toggle="modal"
                                            data-target="#exampleModal" type="button" id="{{ $product->id }}"
                                            onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                        {{-- <button class="btn btn-primary cart-btn" type="button">
                                            Add to cart
                                        </button> --}}
                                    </li>

                                    <li class="">
                                        <button type="button" class="btn btn-primary icon" title="Wishlist"
                                            id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                            <i class="icon fa fa-heart"></i>
                                        </button>
                                    </li>

                                    {{-- <li class="lnk">
                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                            <i class="fa fa-signal"></i>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                            <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                </div>
                <!-- /.product -->
            </div>
            <!-- /.products -->
        </div>
        @endforeach
    </div>
    <!-- /.item -->
    </div>
    <!-- /.home-owl-carousel -->
    </section>
    <!-- /.section -->
    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
    </div>
    <!-- /.col -->
    <div class="clearfix"></div>
    </div>
    <!-- /.row -->
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6277cf1660f0ff90"></script>

@endsection

@section('add-script')
    <script>
        let plusQuantity = document.querySelector('#plusQuantity');
        let minusQuantity = document.querySelector('#minusQuantity');
        let quantity = document.querySelector('#quantity');
        plusQuantity.addEventListener('click', function(e) {
            quantity.setAttribute('value', quantity.value++);
        });
        minusQuantity.addEventListener('click', function(e) {
            if (quantity.value > 1) {
                quantity.setAttribute('value', quantity.value--);
            }
        });
    </script>
@endsection
