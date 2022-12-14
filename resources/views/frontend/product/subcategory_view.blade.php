@extends('frontend.main_master')
@section('title')
    Subcategory Product
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    @php
                        // dd($breadsubcat);
                    @endphp
                    @foreach ($breadsubcat as $subcategory)
                        <li class="active" style="display: unset;">{{ $subcategory->category->category_name_en }}
                        </li>
                    @endforeach
                    {{-- @foreach ($breadsubcat as $subcategory)
                        <li class="active" style="display: unset;">
                            {{ $subcategory->subcategory->subcategory_name_en }}</li>
                    @endforeach --}}
                    @foreach ($breadsubcat as $subcategory)
                        <li class="active" style="display: unset;">{{ $subcategory->subcategory_name_en }}</li>
                    @endforeach
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    @include('frontend.common.vertical_menu')
                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp animated"
                                style="visibility: visible; animation-name: fadeInUp;">
                                <h3 class="section-title">shop by</h3>
                                <div class="widget-header">
                                    <h4 class="widget-title">Category</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">
                                        @foreach ($categories as $category)
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a href="#collapse{{ $category->id }}" data-toggle="collapse"
                                                        class="accordion-toggle collapsed">
                                                        @if (session()->get('language') == 'vietnamese')
                                                            {{ $category->category_name_vn }}
                                                        @else
                                                            {{ $category->category_name_en }}
                                                        @endif
                                                    </a>
                                                </div>
                                                <!-- /.accordion-heading -->
                                                <div class="accordion-body collapse" id="collapse{{ $category->id }}"
                                                    style="height: 0px;">
                                                    <div class="accordion-inner">
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                                                ->orderBy('subcategory_name_vn', 'ASC')
                                                                ->get();
                                                        @endphp
                                                        <ul>
                                                            @foreach ($subcategories as $subcategory)
                                                                <li><a
                                                                        href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->subcategory_slug_vn) }}">{{ $subcategory->subcategory_name_vn }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <!-- /.accordion-inner -->
                                                </div>
                                                <!-- /.accordion-body -->
                                            </div>
                                        @endforeach
                                        <!-- /.accordion-group -->
                                    </div>
                                    <!-- /.accordion -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <br>
                            @include('frontend.common.product_tags')
                            <!-- /.sidebar-widget -->
                            <!----------- Testimonials------------->
                            {{-- @include('frontend.common.testimonials') --}}

                            <!-- ============================================== Testimonials: END ============================================== -->

                            {{-- <div class="home-banner"> <img
                                    src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                            </div> --}}
                        </div>
                        <!-- /.sidebar-filter -->
                    </div>
                    <!-- /.sidebar-module-container -->
                </div>
                <!-- /.sidebar -->
                <div class="col-md-9">
                    <!-- ========================================== SECTION ??? HERO ========================================= -->

                    {{-- <div id="category" class="category-carousel hidden-xs">
                        <div class="item">
                            <div class="image"> <img
                                    src="{{ asset('frontend/assets/images/banners/cat-banner-1.jpg') }}" alt=""
                                    class="img-responsive"> </div>
                            <div class="container-fluid">
                                <div class="caption vertical-top text-left">
                                    <div class="big-text"> Big Sale </div>
                                    <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                    <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                    </div> --}}
                    @foreach ($breadsubcat as $subcategory)
                        <span class="badge badge-danger"
                            style="background-color: #808088;">{{ $subcategory->category->category_name_en }}</span>
                    @endforeach
                    /
                    {{-- @foreach ($breadsubcat as $subcategory)
                        <span class="badge badge-danger"
                            style="background-color: #808088;">{{ $subcategory->subcategory->subcategory_name_vn }}</span>
                    @endforeach --}}

                    @foreach ($breadsubcat as $subcategory)
                        <span class="badge badge-danger"
                            style="background-color: #ff0000;">{{ $subcategory->subcategory_name_en }}</span>
                    @endforeach

                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active"> <a data-toggle="tab" href="#grid-container"><i
                                                    class="icon fa fa-th-large"></i>Grid</a> </li>
                                        <li><a data-toggle="tab" href="#list-container"><i
                                                    class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-12 col-md-6">
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                                                    Position <span class="caret"></span> </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">position</a></li>
                                                    <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                    <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                    <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Show</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1
                                                    <span class="caret"></span> </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">1</a></li>
                                                    <li role="presentation"><a href="#">2</a></li>
                                                    <li role="presentation"><a href="#">3</a></li>
                                                    <li role="presentation"><a href="#">4</a></li>
                                                    <li role="presentation"><a href="#">5</a></li>
                                                    <li role="presentation"><a href="#">6</a></li>
                                                    <li role="presentation"><a href="#">7</a></li>
                                                    <li role="presentation"><a href="#">8</a></li>
                                                    <li role="presentation"><a href="#">9</a></li>
                                                    <li role="presentation"><a href="#">10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-6 col-md-4 text-right">

                                <!-- /.pagination-container -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    {{-- product grid view start --}}
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-sm-6 col-md-4 wow fadeInUp animated"
                                                style="visibility: visible; animation-name: fadeInUp;">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}"><img
                                                                        src="{{ asset($product->product_thumbnail) }}"
                                                                        alt=""></a>
                                                            </div>
                                                            <!-- /.image -->

                                                            @php
                                                                $amount = intval($product->selling_price) - intval($product->discount_price);
                                                                $discount = ($amount / intval($product->selling_price)) * 100;
                                                            @endphp
                                                            <div>
                                                                @if ($product->discount_price == null || $product->discount_price == 0)
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
                                                            <h3 class="name">
                                                                <a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}">
                                                                    @if (session()->get('language') == 'vietnamese')
                                                                        {{ $product->product_name_vn }}
                                                                    @else
                                                                        {{ $product->product_name_en }}
                                                                    @endif
                                                                </a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="rating rateit-small rateit">
                                                                <button id="rateit-reset-2" data-role="none"
                                                                    class="rateit-reset" aria-label="reset rating"
                                                                    aria-controls="rateit-range-2" style="display: none;">
                                                                </button>
                                                                <div id="rateit-range-2" class="rateit-range" tabindex="0"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-2" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="4" aria-readonly="true"
                                                                    style="width: 70px; height: 14px;">
                                                                    <div class="rateit-selected"
                                                                        style="height: 14px; width: 56px;"></div>
                                                                    <div class="rateit-hover" style="height:14px"></div>
                                                                </div>
                                                            </div>
                                                            <div class="description">
                                                                @if ($product->discount_price == null)
                                                                    <div class="product-price">
                                                                        <span class="price">
                                                                            {{ str_replace(',', '.', number_format($product->selling_price)) }}??
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <div class="product-price">
                                                                        <span class="price">
                                                                            {{ str_replace(',', '.', number_format($product->discount_price)) }}??
                                                                        </span> <span class="price-before-discount">
                                                                            {{ str_replace(',', '.', number_format($product->selling_price)) }}??</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon"
                                                                            data-toggle="dropdown" type="button"> <i
                                                                                class="fa fa-shopping-cart"></i> </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                            type="button">Add to cart</button>
                                                                    </li>
                                                                    <li class="lnk wishlist"> <a class="add-to-cart"
                                                                            href="detail.html" title="Wishlist"> <i
                                                                                class="icon fa fa-heart"></i> </a> </li>
                                                                    <li class="lnk"> <a class="add-to-cart"
                                                                            href="detail.html" title="Compare"> <i
                                                                                class="fa fa-signal"></i> </a> </li>
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

                                            <!-- /.item -->
                                        @endforeach

                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->
                            {{-- product grid view end --}}
                            {{-- Product List View Start --}}
                            @foreach ($products as $product)
                                <div class="tab-pane " id="list-container">
                                    <div class="category-product">
                                        <div class="category-product-inner wow fadeInUp animated"
                                            style="visibility: visible; animation-name: fadeInUp;">
                                            <div class="products">
                                                <div class="product-list product">
                                                    <div class="row product-list-row">
                                                        <div class="col col-sm-4 col-lg-4">
                                                            <div class="product-image">
                                                                <div class="image"> <img
                                                                        src="{{ asset($product->product_thumbnail) }}"
                                                                        alt=""> </div>
                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-sm-8 col-lg-8">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_vn) }}">
                                                                        @if (session()->get('language') == 'vietnamese')
                                                                            {{ $product->product_name_vn }}
                                                                        @else
                                                                            {{ $product->product_name_en }}
                                                                        @endif
                                                                    </a></h3>
                                                                <div class="rating rateit-small rateit"><button
                                                                        id="rateit-reset-14" data-role="none"
                                                                        class="rateit-reset" aria-label="reset rating"
                                                                        aria-controls="rateit-range-14"
                                                                        style="display: none;"></button>
                                                                    <div id="rateit-range-14" class="rateit-range"
                                                                        tabindex="0" role="slider" aria-label="rating"
                                                                        aria-owns="rateit-reset-14" aria-valuemin="0"
                                                                        aria-valuemax="5" aria-valuenow="4"
                                                                        aria-readonly="true"
                                                                        style="width: 70px; height: 14px;">
                                                                        <div class="rateit-selected"
                                                                            style="height: 14px; width: 56px;"></div>
                                                                        <div class="rateit-hover" style="height:14px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if ($product->discount_price == null)
                                                                    <div class="product-price">
                                                                        <span class="price">
                                                                            {{ str_replace(',', '.', number_format($product->selling_price)) }}??
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <div class="product-price">
                                                                        <span class="price">
                                                                            {{ str_replace(',', '.', number_format($product->discount_price)) }}
                                                                        </span> <span class="price-before-discount">
                                                                            {{ str_replace(',', '.', number_format($product->selling_price)) }}??</span>
                                                                    </div>
                                                                @endif
                                                                <!-- /.product-price -->
                                                                <div class="description m-t-10">{
                                                                    @if (session()->get('language') == 'vietnamese')
                                                                        {{ $product->short_description_vn }}
                                                                    @else
                                                                        {{ $product->short_description_en }}
                                                                    @endif
                                                                </div>
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            <li class="add-cart-button btn-group">
                                                                                <button class="btn btn-primary icon"
                                                                                    data-toggle="dropdown" type="button"> <i
                                                                                        class="fa fa-shopping-cart"></i>
                                                                                </button>
                                                                                <button class="btn btn-primary cart-btn"
                                                                                    type="button">Add to cart</button>
                                                                            </li>
                                                                            <li class="lnk wishlist"> <a
                                                                                    class="add-to-cart"
                                                                                    href="detail.html" title="Wishlist"> <i
                                                                                        class="icon fa fa-heart"></i> </a>
                                                                            </li>
                                                                            <li class="lnk"> <a
                                                                                    class="add-to-cart"
                                                                                    href="detail.html" title="Compare"> <i
                                                                                        class="fa fa-signal"></i> </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- /.action -->
                                                                </div>
                                                                <!-- /.cart -->

                                                            </div>
                                                            <!-- /.product-info -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-list-row -->
                                                    @if ($product->discount_price == null || $product->discount_price == 0)
                                                        <div class="tag new">
                                                            <span>new</span>
                                                        </div>
                                                    @else
                                                        <div class="tag hot">
                                                            <span>{{ round($discount) }} %</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /.product-list -->
                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.category-product-inner -->
                                    </div>
                                </div>
                            @endforeach
                            {{-- product list view end --}}
                        </div>
                        <!-- /.category-product -->
                    </div>
                    <!-- /.tab-pane #list-container -->
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    {{ $products->links() }}
                                </ul>
                                <!-- /.list-inline -->
                            </div>
                            <!-- /.pagination-container -->
                        </div>
                        <!-- /.text-right -->

                    </div>
                </div>
                <!-- /.tab-content -->
                <!-- /.filters-container -->
            </div>
            <!-- /.search-result-container -->
            @include('frontend.body.brands', ['data' => $brands])

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    {{-- </div>
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->

    </div>
    </div> --}}
@endsection
