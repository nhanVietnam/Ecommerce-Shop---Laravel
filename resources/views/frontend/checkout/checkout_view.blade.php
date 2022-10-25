@extends('frontend.main_master')

@section('title')
    Check Out Page
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <!-- guest-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>
                                                <form class="register-form" action="{{ route('checkout.store') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"><b>Shipping
                                                                Name</b> <span>*</span></label>
                                                        <input type="text" name="shipping_name" placeholder="fullname"
                                                            class="form-control unicase-form-control text-input"
                                                            id="exampleInputEmail1" value="{{ Auth::user()->name }}"
                                                            placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"><b>Email</b>
                                                            <span>*</span></label>
                                                        <input type="text" placeholder="shipping_email"
                                                            name="shipping_email"
                                                            class="form-control unicase-form-control text-input"
                                                            id="exampleInputEmail1" value="{{ Auth::user()->email }}"
                                                            placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"><b>Phone</b>
                                                            <span>*</span></label>
                                                        <input type="number" name="shipping_phone"
                                                            class="form-control unicase-form-control text-input" required
                                                            id="exampleInputEmail1" value="{{ Auth::user()->phone }}"
                                                            placeholder="Phone">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"><b>Post
                                                                Code</b> <span>*</span></label>
                                                        <input type="number" name="post_code"
                                                            class="form-control unicase-form-control text-input" required
                                                            id="exampleInputEmail1" readonly
                                                            value="{{ mt_rand(11111, 99999) }}">
                                                    </div>
                                            </div>
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <div class="form-group">
                                                    {{-- <h5><b>Division Select</b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        @php
                                                            // dd($divisions)
                                                        @endphp
                                                        <select name="division_id" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" selected disabled>Select Category</option>
                                                            @foreach ($divisions as $division)
                                                                <option value="{{ $division->id }}">
                                                                    {{ $division->division_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('division_id')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <h5><b>District Select</b> <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <select name="district_id" class="form-control"
                                                                aria-invalid="false">
                                                                @foreach ($districts as $district)
                                                                    <option value="{{ $district->id }}">
                                                                        {{ $district->district_name }}</option>
                                                                @endforeach
                                                                {{-- @foreach ($districts as $district)
                                        <option value="{{$district->id}}">{{$district->district_name_vn}}</option>
                                    @endforeach --}}
                                                            </select>
                                                            @error('district_id')
                                                                <span class="text-danger">
                                                                    {{ $message }}
                                                                </span>
                                                            @enderror
                                                            <div class="help-block"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5><b>States Select</b> <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <select name="state_id" class="form-control"
                                                                    aria-invalid="false">
                                                                    <option value="" selected disabled>Select State</option>
                                                                    {{-- @foreach ($statess as $states)
                                        <option value="{{$states->id}}">{{$states->states_name_vn}}</option>
                                    @endforeach --}}
                                                                </select>
                                                                @error('state_id')
                                                                    <span class="text-danger">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                                <div class="help-block"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="info-title"
                                                                    for="exampleInputEmail1"><b>Address</b>
                                                                    <span>*</span></label>
                                                                <input type="text" name="address"
                                                                    class="form-control unicase-form-control text-input"
                                                                    required placeholder="Example: 52 Nguyen Si Sach">
                                                                @error('address')
                                                                    <span class="text-danger">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="info-title" for="exampleInputEmail1">Notes
                                                                    <span>*</span></label>
                                                                <textarea name="notes" id="" class="form-control" cols="30" rows="5" placeholder="Notes"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- already-registered-login -->

                                                </div>
                                            </div>
                                            <!-- panel-body  -->

                                        </div><!-- row -->
                                    </div>
                                    <!-- checkout-step-01  -->
                                </div><!-- /.checkout-steps -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                                                        <strong>Subtotal: </strong>
                                                        {{ $cartTotal }}
                                                        <hr>
                                                        <strong>Grand Total: </strong>
                                                        {{ $cartTotal }}
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Paymen Method</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Stripe</label>
                                            <input type="radio" name="payment_method" value="stripe" id="">
                                            <img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Cash</label>
                                            <input type="radio" name="payment_method" value="cash" id="">
                                            <img src="{{ asset('frontend/assets/images/payments/2.png') }}" alt="">
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment
                                        Step</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                    </form>
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

@section('add-script')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                let division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/district-get/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            let d = $('select[name="district_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            $('select[name="district_id"]').on('change', function() {
                let district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{ url('/state-get/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            let de = $('select[name="state_id"]').empty();
                            $.each(data, function(key, value) {
                                console.log(value.state_name);
                                $('select[name="state_id"]').append('<option value="' +
                                    value.id + '">' + value.state_name + '</option>'
                                );
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });

        // let thumbnailImage = document.querySelector('#thumbnailImage');
        // thumbnailImage.addEventListener('change',function(e)
        // {
        //     if(e.target.files && e.target.files[0]){
        //         let reader = new FileReader();
        //         reader.onload = function(e){
        //             let thumbnailImageShow = document.querySelector('#thumbnailImageShow');
        //             thumbnailImageShow.setAttribute('src',e.target.result);
        //             thumbnailImageShow.style.width = '80px';
        //             thumbnailImageShow.style.height = '80px';
        //         }
        //         reader.readAsDataURL(e.target.files[0]);
        //     }
        // });

        // let multipleImage = document.querySelector('#multipleImage');
        // multipleImage.addEventListener('change',function(e){

        //     if(window.File && window.FileReader && window.FileList && window.Blob){
        //         let data = e.target.files;
        //         console.log(data);
        //         Array.prototype.forEach.call(data, function(file, index){
        //             let myfiles = file.name;
        //             console.log(myfiles);
        //             let ext = myfiles.split('.').pop();
        //             console.log(ext);
        //             if(ext == "jpeg" || ext == "jpg"  || ext == "png"|| ext == "gif" || ext == "webp"){
        //                 let reader1 = new FileReader();
        //                 reader1.onload = (function(file){
        //                     return function(e){
        //                         console.log(e.target.result);
        //                         let img = document.createElement("img");
        //                         img.classList.add("thumb");
        //                         img.setAttribute('src',e.target.result);
        //                         img.style.width = '80px';
        //                         img.style.height = '80px';
        //                         let multipleImageShow = document.querySelector('#multipleImageShow');
        //                         multipleImageShow.appendChild(img);
        //                     };
        //                 })(file);
        //                 reader1.readAsDataURL(e.target.files[index]);
        //             }      
        //         });
        //     };
        // });
    </script>
@endsection
