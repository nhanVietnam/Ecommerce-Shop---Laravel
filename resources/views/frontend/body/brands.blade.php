<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
        @php
            // dd($data);
        @endphp
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            @foreach ($data as $brand)
                <div class="item m-t-15"> <a href="#" class="image"> <img {{-- data-echo="{{ asset('frontend/assets/images/brands/brand1.png') }}" --}}
                            src="{{ asset($brand->brand_image) }}" style="max-width:166px;max-height:100px" alt="">
                    </a>
                </div>
            @endforeach
            @foreach ($data as $brand)
                <div class="item m-t-15"> <a href="#" class="image"> <img {{-- data-echo="{{ asset('frontend/assets/images/brands/brand1.png') }}" --}}
                            src="{{ asset($brand->brand_image) }}" style="max-width:166px;max-height:100px" alt="">
                    </a>
                </div>
            @endforeach
            <!--/.item-->
        </div>
        <!-- /.owl-carousel #logo-slider -->
    </div>
    <!-- /.logo-slider-inner -->
</div>
