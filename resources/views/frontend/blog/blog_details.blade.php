@extends('frontend.main_master')

@section('title')
    {{ $blogpost->post_title_vn }}
@endsection

@section('content')
    <style>
        .col-md-9 .blog-post img {
            width: 100% !important;
            height: auto !important;
        }

    </style>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class="active">
                        @if (session()->get('language') == 'vietnamese')
                            {{ $blogpost->post_title_vn }}
                        @else
                            {{ $blogpost->post_title_en }}
                        @endif
                    </li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        <div class="blog-post wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                            <img class="img-responsive" src="{{ asset($blogpost->post_image) }}" alt="">
                            @if (session()->get('language') == 'vietnamese')
                                <h1>
                                    {{ $blogpost->post_title_vn }}
                                </h1>
                            @else
                                <h1>
                                    {{ $blogpost->post_title_en }}
                                </h1>
                            @endif
                            <h1>Nemo enim ipsam voluptatem quia voluptas sit aspernatur</h1>
                            {{-- <span class="author">John Doe</span>
	<span class="review">7 Comments</span> --}}
                            <span
                                class="date-time">{{ Carbon\Carbon::parse($blogpost->created_at)->diffForHumans() }}</span>

                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox_tcyv"></div>


                            <p>
                                @if (session()->get('language') == 'vietnamese')
                                    {!! $blogpost->post_detail_vn !!}
                                @else
                                    {!! $blogpost->post_detail_en !!}
                                @endif
                            </p>

                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox_tcyv"></div>


                        </div>
                        {{-- <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Leave A Comment</h4>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputName">Your Name
                                                <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input"
                                                id="exampleInputName" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Email Address
                                                <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input"
                                                id="exampleInputEmail1" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputTitle">Title
                                                <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input"
                                                id="exampleInputTitle" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputComments">Your Comments
                                                <span>*</span></label>
                                            <textarea class="form-control unicase-form-control" id="exampleInputComments"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 outer-bottom-small m-t-20">
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit
                                        Comment</button>
                                </div>
                            </div>
                        </div> --}}
                        <br>
                    </div>
                    <div class="col-md-3 sidebar">



                        <div class="sidebar-module-container">
                            <div class="search-area outer-bottom-small">
                                <form>
                                    <div class="control-group">
                                        <input placeholder="Type to search" class="search-field">
                                        <a href="#" class="search-button"></a>
                                    </div>
                                </form>
                            </div>

                            <div class="home-banner outer-top-n outer-bottom-xs">
                                <img src="{{ asset('/frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                            </div>
                            <!-- ==============================================CATEGORY============================================== -->
                            <div class="sidebar-widget outer-bottom-xs wow fadeInUp animated"
                                style="visibility: visible; animation-name: fadeInUp;">
                                <h3 class="section-title">Blog Category</h3>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="accordion">
                                        @foreach ($blogcategory as $category)
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <a href="{{ url('/blog/category/post/' . $category->id) }}">
                                                        @if (session()->get('language') == 'vietnamese')
                                                            {!! $category->blog_category_name_vn !!}
                                                        @else
                                                            {!! $category->blog_category_name_en !!}
                                                        @endif
                                                    </a>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div><!-- /.accordion -->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== CATEGORY : END ============================================== -->
                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                            @include('frontend.common.product_tags')
                            <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6277cf1660f0ff90"></script>
@endsection
