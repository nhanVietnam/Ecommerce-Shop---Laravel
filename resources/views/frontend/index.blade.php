@extends('frontend.main_master')

@section('title')
    Ecommerce Shop
@endsection

@php
if (isset($_GET['vnp_ResponseCode']) == '00') {
    $del = Gloudemans\Shoppingcart\Facades\Cart::destroy();
}
@endphp
@section('content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    <!-- ================================== TOP NAVIGATION ================================== -->
                    @include('frontend.common.vertical_menu')
                    <!-- /.side-menu -->
                    <!-- ==================================deOP NAVIGATION : END ================================== -->

                    <!-- ============================================== HOT DEALS ============================================== -->
                    @include('frontend.common.hot_deals')
                    <!-- ============================================== HOT DEALS: END ============================================== -->

                    <!-- ============================================== SPECIAL OFFER ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">Special Offer</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        @foreach ($special_offers as $product)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image"> <a
                                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}">
                                                                        <img src="{{ asset($product->product_thumbnail) }}"
                                                                            alt=""> </a> </div>
                                                                <!-- /.image -->

                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}">
                                                                        @if (session()->get('language') == 'vietnamese')
                                                                            {{ $product->product_name_vn }}
                                                                    </a>
                                                                @else
                                                                    {{ $product->product_name_en }}</a>
                                        @endif
                                        </a></h3>
                                        <div class="product-price"> <span class="price">
                                                {{ str_replace(',', '.', number_format($product->selling_price)) }}đ
                                            </span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================== SPECIAL OFFER : END ============================================== -->
    <!-- ============================================== PRODUCT TAGS ============================================== -->
    @include('frontend.common.product_tags')
    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
    <!-- ============================================== SPECIAL DEALS ============================================== -->
    <br>
    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">Special Deals</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                <div class="item">
                    <div class="products special-product">
                        @foreach ($special_deals as $product)
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}">
                                                        <img src="{{ asset($product->product_thumbnail) }}" alt=""> </a>
                                                </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}">
                                                        @if (session()->get('language') == 'vietnamese')
                                                            {{ $product->product_name_vn }}
                                                    </a>
                                                @else
                                                    {{ $product->product_name_en }}</a>
                        @endif
                        </a></h3>
                        <div class="product-price"> <span class="price"> {{ $product->selling_price }}đ </span>
                        </div>
                        <!-- /.product-price -->

                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.product-micro-row -->
        </div>
        <!-- /.product-micro -->

    </div>
    @endforeach
    </div>
    </div>
    </div>
    </div>
    <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================== SPECIAL DEALS : END ============================================== -->
    <!-- ============================================== NEWSLETTER ============================================== -->
    {{-- <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
        <h3 class="section-title">Newsletters</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Subscribe to our newsletter">
                </div>
                <button class="btn btn-primary">Subscribe</button>
            </form>
        </div>
        <!-- /.sidebar-widget-body -->
    </div> --}}
    <!-- /.sidebar-widget -->
    <!-- ============================================== NEWSLETTER: END ============================================== -->

    <!-- ============================================== Testimonials============================================== -->


    <!-- ============================================== Testimonials: END ============================================== -->

    <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner') }}.jpg" alt="Image">
    </div>
    </div>
    <!-- /.sidemenu-holder -->
    <!-- ============================================== SIDEBAR : END ============================================== -->

    <!-- ============================================== CONTENT ============================================== -->
    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                @foreach ($sliders as $slider)
                    <div class="item" style="background-image: url({{ asset($slider->slider_image) }});">
                        <div class="container-fluid">
                            <div class="caption bg-color vertical-center text-left">
                                @if ($slider->title == null || $slider->title == '')
                                @else
                                    <div class="big-text fadeInDown-1"> {{ $slider->title }} </div>
                                @endif
                                @if ($slider->description == null || $slider->description == '')
                                @else
                                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>
                                            {{ $slider->description }}
                                        </span> </div>
                                @endif
                                {{-- <div class="button-holder fadeInDown-3"> <a href="#"
                                        class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div> --}}
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                @endforeach
                <!-- /.item -->

            </div>
            <!-- /.owl-carousel -->
        </div>

        <!-- ========================================= SECTION – HERO : END ========================================= -->

        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
                <div class="row">
                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">money back</h4>
                                </div>
                            </div>
                            <h6 class="text">30 Days Money Back Guarantee</h6>
                        </div>
                    </div>
                    <!-- .col -->

                    <div class="hidden-md col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">free shipping</h4>
                                </div>
                            </div>
                            <h6 class="text">Shipping on orders over $99</h6>
                        </div>
                    </div>
                    <!-- .col -->

                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">Special Sale</h4>
                                </div>
                            </div>
                            <h6 class="text">Extra $5 off on all items </h6>
                        </div>
                    </div>
                    <!-- .col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.info-boxes-inner -->

        </div>
        <!-- /.info-boxes -->
        <!-- ============================================== INFO BOXES : END ============================================== -->
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
                <h3 class="new-product-title pull-left">New Products</h3>
                <ul class="nav nav-tabs nav-tab-line pull-right">
                    <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a>
                    </li>
                    @foreach ($categories as $category)
                        <li>
                            <a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">
                                @if (session()->get('language') == 'vietnamese')
                                    {{ $category->category_name_vn }}
                            </a>
                        @else
                            {{ $category->category_name_en }}</a>
                    @endif
                    </a>
                    </li>
                    @endforeach
                    {{-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> --}}
                </ul>
                <!-- /.nav-tabs -->
            </div>
            <div class="tab-content outer-top-xs">
                <div class="tab-pane in active" id="all">
                    <div class="product-slider">
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                            @foreach ($products as $product)
                                @php
                                    $amount = intval($product->selling_price) - intval($product->discount_price);
                                    $discount = ($amount / intval($product->selling_price)) * 100;
                                @endphp
                                @if ($product->discount_price == null || $product->discount_price == 0 || round($discount) == 0)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a
                                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}"><img
                                                                src="{{ asset($product->product_thumbnail) }}"
                                                                alt=""></a>
                                                    </div>
                                                    <!-- /.image -->
                                                    <div>
                                                        @if ($product->discount_price == null || $product->discount_price == 0 || round($discount) == 0)
                                                            <div class="tag new">
                                                                <span>new</span>
                                                            </div>
                                                        @else
                                                            <div class="tag hot">
                                                                <span>{{ round($discount) }} %</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}">
                                                            @if (session()->get('language') == 'vietnamese')
                                                                {{ $product->product_name_vn }}
                                                            @else
                                                                {{ $product->product_name_en }}
                                                            @endif
                                                        </a></h3>
                                                    <div class="description"></div>
                                                    @if ($product->discount_price == null || $product->discount_price == 0 || round($discount) == 0)
                                                        <div class="product-price">
                                                            <span class="price">
                                                                {{ str_replace(',', '.', number_format($product->selling_price)) }}₫
                                                            </span>
                                                        </div>
                                                    @else
                                                        <div class="product-price"> <span class="price">
                                                                {{ str_replace(',', '.', number_format($product->discount_price)) }}
                                                                ₫ </span> <span
                                                                class="price-before-discount">{{ str_replace(',', '.', number_format($product->selling_price)) }}₫
                                                            </span> </div>
                                                    @endif
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" title="Add Cart"
                                                                    data-toggle="modal" data-target="#exampleModal"
                                                                    type="button" id="{{ $product->id }}"
                                                                    onclick="productView(this.id)"> <i
                                                                        class="fa fa-shopping-cart"></i> </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" class="btn btn-primary icon"
                                                                    title="Wishlist" id="{{ $product->id }}"
                                                                    onclick="addToWishlist(this.id)">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </button>
                                                            </li>
                                                            {{-- <li class="lnk"> <a class="add-to-cart" data-toggle="tooltip"
                                            href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                aria-hidden="true"></i> </a> </li> --}}
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
                                @else
                                @endif
                            @endforeach
                            <!-- /.item -->
                        </div>
                        <!-- /.home-owl-carousel -->
                    </div>
                    <!-- /.product-slider -->
                </div>

                @foreach ($categories as $category)
                    <div class="tab-pane" id="category{{ $category->id }}">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                @php
                                    $catwiseProduct = App\Models\Product::where('category_id', $category->id)
                                        ->orderBy('id', 'DESC')
                                        ->get();
                                @endphp

                                @forelse ($catwiseProduct as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a
                                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}"><img
                                                                src="{{ asset($product->product_thumbnail) }}"
                                                                alt=""></a> </div>
                                                    <!-- /.image -->
                                                    @php
                                                        $amount = intval($product->selling_price) - intval($product->discount_price);
                                                        $discount = ($amount / intval($product->selling_price)) * 100;
                                                    @endphp
                                                    <div>
                                                        @if ($product->discount_price == null || $product->discount_price == 0 || round($discount) == 0)
                                                            <div class="tag new">
                                                                <span>new</span>
                                                            </div>
                                                        @else
                                                            <div class="tag hot">
                                                                <span>{{ round($discount) }} %</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="{{ url('product/details/' . $product->id) }}">
                                                            @if (session()->get('language') == 'vietnamese')
                                                                {{ $product->product_name_vn }}
                                                        </a>
                                                    @else
                                                        {{ $product->product_name_en }}</a>
                                @endif
                                </a></h3>
                                <div class="description"></div>
                                @if ($product->discount_price == null || $product->discount_price == 0 || round($discount) == 0)
                                    <div class="product-price">
                                        <span class="price">
                                            {{ str_replace(',', '.', number_format($product->selling_price)) }} ₫ </span>
                                    </div>
                                @else
                                    <div class="product-price"> <span class="price">
                                            {{ str_replace(',', '.', number_format($product->discount_price)) }} ₫
                                        </span> <span
                                            class="price-before-discount">{{ str_replace(',', '.', number_format($product->selling_price)) }}
                                            ₫ </span> </div>
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
                                                onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-primary icon" title="Wishlist"
                                                id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                                <i class="icon fa fa-heart"></i>
                                            </button>
                                        </li>
                                        {{-- <li class="lnk"> <a class="add-to-cart" data-toggle="tooltip" href="detail.html"
                                    title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li> --}}
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
        @empty
            @if (session()->get('language') == 'vietnamese')
                <h5 class='text-danger'>Không Tìm Thấy Sản Phẩm</h5>
            @else
                <h5 class='text-danger'>Products Not Found</h5>
            @endif
            @endforelse
            <!-- /.item -->
        </div>
        <!-- /.home-owl-carousel -->
    </div>
    <!-- /.product-slider -->
    </div>
    <!-- /.tab-pane -->
    @endforeach
    </div>
    <!-- /.tab-content -->
    </div>
    <!-- /.scroll-tabs -->
    <!-- ============================================== SCROLL TABS : END ============================================== -->
    <!-- ============================================== WIDE PRODUCTS ============================================== -->
    {{-- <div class="wide-banners wow fadeInUp outer-bottom-xs">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <div class="wide-banner cnt-strip">
                    <div class="image"> <img class="img-responsive"
                            src="{{ asset('frontend/assets/images/banners/home-banner1') }}.jpg" alt=""> </div>
                </div>
                <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
                <div class="wide-banner cnt-strip">
                    <div class="image"> <img class="img-responsive"
                            src="{{ asset('frontend/assets/images/banners/home-banner2') }}.jpg" alt=""> </div>
                </div>
                <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div> --}}
    <!-- /.wide-banners -->

    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
    <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">Featured products</h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            @foreach ($featureds as $product)
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}"><img
                                            src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                <!-- /.image -->
                                @php
                                    $amount = intval($product->selling_price) - intval($product->discount_price);
                                    $discount = ($amount / intval($product->selling_price)) * 100;
                                @endphp
                                <div>
                                    @if ($product->discount_price == null || $product->discount_price == 0 || round($discount) == 0)
                                        <div class="tag new">
                                            <span>new</span>
                                        </div>
                                    @else
                                        <div class="tag hot">
                                            <span>{{ round($discount) }} %</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}">
                                        @if (session()->get('language') == 'vietnamese')
                                            {{ $product->product_name_vn }}
                                    </a>
                                @else
                                    {{ $product->product_name_en }}</a>
            @endif
            </a></h3>
            <div class="description"></div>
            @if ($product->discount_price == null || $product->discount_price == 0)
                <div class="product-price">
                    <span class="price"> {{ str_replace(',', '.', number_format($product->selling_price)) }} ₫
                    </span>
                </div>
            @else
                <div class="product-price"> <span class="price">
                        {{ str_replace(',', '.', number_format($product->discount_price)) }} ₫ </span>
                    <span
                        class="price-before-discount">{{ str_replace(',', '.', number_format($product->selling_price)) }}
                        ₫ </span>
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
                    </li>
                    <button type="button" class="btn btn-primary icon" title="Wishlist" id="{{ $product->id }}"
                        onclick="addToWishlist(this.id)">
                        <i class="icon fa fa-heart"></i>
                    </button>
                    {{-- <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i
                                class="fa fa-signal" aria-hidden="true"></i> </a> </li> --}}
                </ul>
            </div>
            <!-- /.action -->
        </div>
        <!-- /.cart -->
        </div>
        <!-- /.product -->

        </div>
        <!-- /.products -->
        <!-- /.item -->
        </div>
        @endforeach
        </div>
        <!-- /.home-owl-carousel -->
    </section>
    <!-- /.section -->
    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
    <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">
            @if (session()->get('language') == 'vietnamese')
                {{ $skip_category_0->category_name_vn }}</a>
            @else
                {{ $skip_category_0->category_name_en }}</a>
            @endif
        </h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            @foreach ($skip_product_0 as $product)
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}"><img
                                            src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                <!-- /.image -->
                                @php
                                    $amount = intval($product->selling_price) - intval($product->discount_price);
                                    $discount = ($amount / intval($product->selling_price)) * 100;
                                @endphp
                                <div>
                                    @if ($product->discount_price == null || $product->discount_price == 0 || round($discount) == 0)
                                        <div class="tag new">
                                            <span>new</span>
                                        </div>
                                    @else
                                        <div class="tag hot">
                                            <span>{{ round($discount) }} %</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="{{ url('product/details/' . $product->id) }}">
                                        @if (session()->get('language') == 'vietnamese')
                                            {{ $product->product_name_vn }}
                                    </a>
                                @else
                                    {{ $product->product_name_en }}</a>
            @endif
            </a></h3>
            <div class="description"></div>
            @if ($product->discount_price == null || $product->discount_price == 0)
                <div class="product-price">
                    <span class="price"> {{ str_replace(',', '.', number_format($product->selling_price)) }}₫
                    </span>
                </div>
            @else
                <div class="product-price"> <span class="price">
                        {{ str_replace(',', '.', number_format($product->discount_price)) }}₫ </span>
                    <span
                        class="price-before-discount">{{ str_replace(',', '.', number_format($product->selling_price)) }}₫
                    </span>
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
                    </li>
                    <li>
                        <button type="button" class="btn btn-primary icon" title="Wishlist" id="{{ $product->id }}"
                            onclick="addToWishlist(this.id)">
                            <i class="icon fa fa-heart"></i>
                        </button>
                    </li>
                    {{-- <li class="lnk"> <a class="add-to-cart" data-toggle="tooltip" href="detail.html"
                            title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li> --}}
                </ul>
            </div>
            <!-- /.action -->
        </div>
        <!-- /.cart -->
        </div>
        <!-- /.product -->

        </div>
        <!-- /.products -->
        <!-- /.item -->
        </div>
        @endforeach
        </div>
        <!-- /.home-owl-carousel -->
    </section>
    <!-- /.section -->
    <!-- ============================================== FEATURED PRODUCTS : END
                                                                                                                                                                                                                                                                                                                                          <!-- ============================================== FEATURED PRODUCTS ============================================== -->
    <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">
            @if (session()->get('language') == 'vietnamese')
                {{ $skip_category_1->category_name_vn }}
            @else
                {{ $skip_category_1->category_name_en }}
            @endif
        </h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            @foreach ($skip_product_1 as $product)
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}"><img
                                            src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                <!-- /.image -->
                                @php
                                    $amount = intval($product->selling_price) - intval($product->discount_price);
                                    $discount = ($amount / intval($product->selling_price)) * 100;
                                @endphp
                                <div>
                                    @if ($product->discount_price == null || $product->discount_price == 0 || round($discount) == 0)
                                        <div class="tag new">
                                            <span>new</span>
                                        </div>
                                    @else
                                        <div class="tag hot">
                                            <span>{{ round($discount) }} %</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}">
                                        @if (session()->get('language') == 'vietnamese')
                                            {{ $product->product_name_vn }}
                                        @else
                                            {{ $product->product_name_en }}
                                        @endif
                                    </a></h3>
                                <div class="description"></div>
                                @if ($product->discount_price == null || $product->discount_price == 0 || round($discount) == 0)
                                    <div class="product-price">
                                        <span class="price">
                                            {{ str_replace(',', '.', number_format($product->selling_price)) }}₫
                                        </span>
                                    </div>
                                @else
                                    <div class="product-price"> <span class="price">
                                            {{ str_replace(',', '.', number_format($product->discount_price)) }}₫ </span>
                                        <span
                                            class="price-before-discount">{{ str_replace(',', '.', number_format($product->selling_price)) }}₫
                                        </span>
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
                                                onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-primary icon" title="Wishlist"
                                                id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                                <i class="icon fa fa-heart"></i>
                                            </button>
                                        </li>
                                        {{-- <li class="lnk"> <a class="add-to-cart" data-toggle="tooltip"
                                                href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                    aria-hidden="true"></i> </a> </li> --}}
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                    <!-- /.item -->
                </div>
            @endforeach
        </div>
        <!-- /.home-owl-carousel -->
    </section>
    <!-- /.section -->
    <!-- ============================================== FEATURED PRODUCTS : END
                                                                                                                                                                                                                                                                                                                                          <!-- ============================================== FEATURED PRODUCTS ============================================== -->

    <!-- /.section -->
    <!-- ============================================== FEATURED PRODUCTS : END
                                                                                                                                                                                                                                                                                                                                        <!-- ============================================== WIDE PRODUCTS ============================================== -->
    <!-- /.wide-banners -->
    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
    <!-- ============================================== BEST SELLER ============================================== -->
    {{-- <div class="best-deal wow fadeInUp outer-bottom-xs">
        <h3 class="section-title">Best seller</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                <div class="item">
                    <div class="products best-product">
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> <a href="#"> <img
                                                        src="{{ asset('frontend/assets/images/products/p20.jpg') }}"
                                                        alt=""> </a> </div>
                                            <!-- /.image -->

                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col2 col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->

                        </div>
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> <a href="#"> <img
                                                        src="{{ asset('frontend/assets/images/products/p21.jpg') }}"
                                                        alt=""> </a> </div>
                                            <!-- /.image -->

                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col2 col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->

                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="products best-product">
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> <a href="#"> <img
                                                        src="{{ asset('frontend/assets/images/products/p22.jpg') }}"
                                                        alt=""> </a> </div>
                                            <!-- /.image -->

                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col2 col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->

                        </div>
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> <a href="#"> <img
                                                        src="{{ asset('frontend/assets/images/products/p23.jpg') }}"
                                                        alt=""> </a> </div>
                                            <!-- /.image -->

                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col2 col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->

                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="products best-product">
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> <a href="#"> <img
                                                        src="{{ asset('frontend/assets/images/products/p24.jpg') }}"
                                                        alt=""> </a> </div>
                                            <!-- /.image -->

                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col2 col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->

                        </div>
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> <a href="#"> <img
                                                        src="{{ asset('frontend/assets/images/products/p25.jpg') }}"
                                                        alt=""> </a> </div>
                                            <!-- /.image -->

                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col2 col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->

                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="products best-product">
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> <a href="#"> <img
                                                        src="{{ asset('frontend/assets/images/products/p26.jpg') }}"
                                                        alt=""> </a> </div>
                                            <!-- /.image -->

                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col2 col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->

                        </div>
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> <a href="#"> <img
                                                        src="{{ asset('frontend/assets/images/products/p27.jpg') }}"
                                                        alt=""> </a> </div>
                                            <!-- /.image -->

                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col2 col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.sidebar-widget-body -->
    </div> --}}
    <!-- /.sidebar-widget -->
    <!-- ============================================== BEST SELLER : END ============================================== -->

    <!-- ============================================== BLOG SLIDER ============================================== -->
    <section class="section latest-blog outer-bottom-vs wow fadeInUp">
        <h3 class="section-title">Latest form blog</h3>
        <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
                @foreach ($blogpost as $blog)
                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image"> <a
                                        href="{{ url('/post/details/' . $blog->post_slug_en . '/' . $blog->id) }}"><img
                                            src="{{ asset($blog->post_image) }}" alt=""></a> </div>
                            </div>
                            <!-- /.blog-post-image -->

                            <div class="blog-post-info text-left">
                                <h3 class="name">
                                    <a href="{{ url('/post/details/' . $blog->post_slug_en . '/' . $blog->id) }}"
                                        style="display: -webkit-box;-webkit-line-clamp: 3; -webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                                        @if (session()->get('language') == 'vietnamese')
                                            {!! Str::limit($blog->post_title_vn, 150) !!}
                                        @else
                                            {!! Str::limit($blog->post_title_en, 150) !!}
                                        @endif
                                    </a>
                                </h3>
                                <span
                                    class="info">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                                <p class="text">
                                    @if (session()->get('language') == 'vietnamese')
                                        {!! Str::limit($blog->post_short_detail_vn, 100) !!}
                                    @else
                                        {!! Str::limit($blog->post_short_detail_en, 100) !!}
                                    @endif
                                </p>
                                <a href="{{ url('/post/details/' . $blog->post_slug_en . '/' . $blog->id) }}"
                                    class="lnk btn btn-primary">Read
                                    more</a>
                            </div>
                            <!-- /.blog-post-info -->

                        </div>
                        <!-- /.blog-post -->
                    </div>
                @endforeach
                <!-- /.item -->
            </div>
            <!-- /.owl-carousel -->
        </div>
        <!-- /.blog-slider-container -->
    </section>
    <!-- /.section -->
    <!-- ============================================== BLOG SLIDER : END ============================================== -->

    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
    <!-- /.section -->
    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

    </div>
    <!-- /.homebanner-holder -->
    <!-- ============================================== CONTENT : END ============================================== -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.body.brands', ['data' => $brands])
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
    </div>
@endsection
