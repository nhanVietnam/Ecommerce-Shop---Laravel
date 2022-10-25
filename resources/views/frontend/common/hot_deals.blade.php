@php
$hot_deals = App\Models\Product::whereNotNull('discount_price')
    ->orWhere('hot_deals', '==', 1)
    ->orderBy('id', 'DESC')
    ->limit(3)
    ->get();
@endphp
<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @php
            // dd($hot_deals);
        @endphp
        @foreach ($hot_deals as $product)
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image"> <img src="{{ asset($product->product_thumbnail) }}" alt=""> </div>
                        @php
                            $amount = intval($product->selling_price) - intval($product->discount_price);
                            $discount = ($amount / intval($product->selling_price)) * 100;
                        @endphp
                        @if ($product->discount_price == null || $product->discount_price == 0 || round($discount) == 0)
                            <div class="sale-offer-tag"
                                style="background-color: #46aad7; display: flex; justify-content: center; align-items: center;">
                                <span style="top: 0;">new</span>
                            </div>
                        @else
                            <div class="sale-offer-tag"><span>{{ round($discount) }}%<br>
                                    off</span></div>
                        @endif
                        {{-- <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box"> <span class="key">120</span> <span
                                        class="value">DAYS</span> </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="hour box"> <span class="key">20</span> <span
                                        class="value">HRS</span> </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="minutes box"> <span class="key">36</span> <span
                                        class="value">MINS</span> </div>
                            </div>
                            <div class="box-wrapper hidden-md">
                                <div class="seconds box"> <span class="key">60</span> <span
                                        class="value">SEC</span> </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a
                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}">
                                @if (session()->get('language') == 'vietnamese')
                                    {{ $product->product_name_vn }}
                                @else
                                    {{ $product->product_name_en }}
                                @endif
                            </a></h3>
                        <div class="product-price">
                            @if ($product->discount_price == null || $product->discount_price == 0)
                                <span class="price">
                                    {{ str_replace(',', '.', number_format($product->selling_price)) }} đ</span>
                            @else
                                <span class="price">
                                    {{ str_replace(',', '.', number_format($product->discount_price)) }} đ</span>
                                <span
                                    class="price-before-discount">{{ str_replace(',', '.', number_format($product->selling_price)) }}
                                    đ</span>
                            @endif
                        </div>
                        <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                        class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" title="Add Cart" data-toggle="modal"
                                    data-target="#exampleModal" type="button" id="{{ $product->id }}"
                                    onclick="productView(this.id)">Add to cart</button>
                            </div>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.sidebar-widget -->
</div>
