@extends('frontend.main_master')

@section('title')
    VNPAY Payment Page
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class="active">VNPAY</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row" style="display: flex;
                                                    justify-content: center;">
                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">

                                            @foreach ($carts as $cart)
                                                <li>
                                                    <strong>Image: </strong>
                                                    <img src="{{ asset($cart->options->images) }}"
                                                        style="height: 50px;width: 50px;" alt="">
                                                </li>
                                                <li>
                                                    <strong>Quality: </strong>
                                                    ({{ $cart->qty }})
                                                    <strong>Color: </strong>
                                                    {{ $cart->options->color }}
                                                    <strong>Size: </strong>
                                                    {{ $cart->options->size }}
                                                </li>
                                                <hr>
                                                <li>
                                                    @if (Session::has('coupon'))
                                                        <strong>Subtotal: </strong>
                                                        {{ $cartTotal }}đ
                                                        <hr>
                                                        <strong>Coupon Name: </strong>
                                                        {{ session()->get('coupon')['coupon_name'] }}
                                                        ({{ session()->get('coupon')['coupon_discount'] }}%)
                                                        <hr>
                                                        {{-- @php
                                                            dd(str_replace('.','',$cartTotal));
                                                        @endphp --}}
                                                        <strong>Coupon Discount: </strong>
                                                        {{ str_replace(',', '.', number_format((str_replace('.', '', $cartTotal) * session()->get('coupon')['coupon_discount']) / 100)) }}đ
                                                        <hr>
                                                        <strong>Grand Total: </strong>
                                                        ({{ str_replace(',', '.', number_format(intval(str_replace('.', '', $cartTotal)) - (intval(str_replace('.', '', $cartTotal)) * session()->get('coupon')['coupon_discount']) / 100)) }}đ)
                                                    @else
                                                        @php
                                                            // dd($cartTotal);
                                                        @endphp
                                                        <strong>Subtotal: </strong>
                                                        {{ $cartTotal }}đ
                                                        <hr>
                                                        <strong>Grand Total: </strong>
                                                        {{ $cartTotal }}đ
                                                    @endif
                                                </li>
                                            @endforeach
                                            {{-- <li>
                                                @if (Session::has('coupon'))
                                                    <strong>Subtotal: </strong>
                                                    {{ $cartTotal }}
                                                    <hr>
                                                    <strong>Coupon Name: </strong>
                                                    {{ session()->get('coupon')['coupon_name'] }}
                                                    ({{ session()->get('coupon')['coupon_discount'] }}%)
                                                    <hr>
                                                    <strong>Coupon Discount: </strong>
                                                    {{ str_replace(',', '.', number_format((str_replace('.', '', $cartTotal) * session()->get('coupon')['coupon_discount']) / 100)) }}đ
                                                    <hr>
                                                    <strong>Grand Total: </strong>
                                                    ({{ str_replace(',', '.', number_format(intval(str_replace('.', '', $cartTotal)) - (intval(str_replace('.', '', $cartTotal)) * session()->get('coupon')['coupon_discount']) / 100)) }}đ)
                                                @else
                                                    <strong>Subtotal: </strong>
                                                    {{ $cartTotal }}đ
                                                    <hr>
                                                    <strong>Grand Total: </strong>
                                                    {{ $cartTotal }}đ
                                                @endif
                                            </li> --}}
                                        </ul>
                                    </div>
                                    <hr>
                                    <form action="{{ route('vnpay.order') }}" method="POST" id="payment-form">
                                        @csrf
                                        <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                        <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                        <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                        <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                        <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                        <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                        <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                        <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                        <input type="hidden" name="redirect">
                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp" style="visibility: hidden; animation-name: none;">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme"
                        style="opacity: 1; display: block;">
                        <div class="owl-wrapper-outer">
                            <div class="owl-wrapper" style="width: 3800px; left: 0px; display: block;">
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item m-t-15">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item m-t-10">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->
                        <div class="owl-controls clickable">
                            <div class="owl-buttons">
                                <div class="owl-prev"></div>
                                <div class="owl-next"></div>
                            </div>
                        </div>
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->

            </div><!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div>
    </div>
@endsection
