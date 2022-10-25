@extends('frontend.main_master')

@section('title')
    My Cart Page
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="my-wishlist-page">
                <div class="row" id="checkEmpty">
                    {{-- @php	
                    dd(session('coupon')['total_amount']);
                @endphp --}}
                    <div class="shopping-cart">
                        <div class="shopping-cart-table ">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-romove item">Image</th>
                                            <th class="cart-description item">Name</th>
                                            <th class="cart-price item">Price</th>
                                            <th class="cart-product-name item">Color</th>
                                            <th class="cart-edit item">Size</th>
                                            <th class="cart-qty item">Quantity</th>
                                            <th class="cart-sub-total item">Subtotal</th>
                                            <th class="cart-total last-item">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cartPage">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12"></div>
                        <div class="col-md-4 col-sm-12 estimate-ship-tax">
                            @if (Session::has('coupon'))
                            @else
                                <table class="table" id="couponField">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="estimate-title">Discount Code</span>
                                                <p>Enter your coupon code if you have one..</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control unicase-form-control text-input"
                                                        placeholder="You Coupon..." id="coupon_name">
                                                </div>
                                                <div class="clearfix pull-right">
                                                    <button type="submit" onclick="applyCoupon()"
                                                        class="btn-upper btn btn-primary">APPLY COUPON</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody><!-- /tbody -->
                                </table><!-- /table -->
                            @endif
                        </div>
                        <div class="col-md-4 col-sm-12 cart-shopping-total">
                            <table class="table">
                                <thead id="couponCalculatedField">
                                    <tr>
                                        <th>
                                            <div class="cart-sub-total">
                                                Subtotal<span class="inner-left-md">0đ</span>
                                            </div>
                                            <div class="cart-grand-total">
                                                Grand Total<span class="inner-left-md">0đ</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead><!-- /thead -->
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="cart-checkout-btn pull-right">
                                                <a href="{{ route('checkout') }}"
                                                    class="btn btn-primary checkout-btn">PROCCED TO
                                                    CHEKOUT</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div>
                    {{-- <div class="col-md-12"
                            style="height: 70vh; min-height: 500px; display:flex; flex-direction: column;align-items: center; gap: 16px	">
                            ;
                            <img src="{{ asset('upload/emptyCard.png') }}" style="width: 300px; height:auto;" alt="">
                            <p>Giỏ hàng chưa có sản phẩm nào</p>
                            <a class="btn btn-primary"
                                style="padding:10px 20px; display: inline; border-radius: 4px; width:fit-content;"
                                href="/">Mua sắm ngay</a>
                        </div> --}}
                </div>
                <br>
            </div>
        </div>
        {{-- @include('frontend.body.brands') --}}
    </div>
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
@endsection
