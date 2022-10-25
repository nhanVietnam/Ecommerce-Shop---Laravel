@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('admin.dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        {{-- <img src="{{ asset('backend/images/logo-dark.png') }}" alt=""> --}}
                        <h3><b>Ecommerce</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'admin.dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @php
                // $brand = (auth()->guard('admin')->user()->brand == 1);
                // $category = (auth()->guard('admin')->user()->category == 1);
                // $product = (auth()->guard('admin')->user()->product == 1);
                // $slider = (auth()->guard('admin')->user()->slider == 1);
                // $coupons = (auth()->guard('admin')->user()->coupons == 1);
                // $shipping = (auth()->guard('admin')->user()->shipping == 1);
                // $blog = (auth()->guard('admin')->user()->blog == 1);
                // $setting = (auth()->guard('admin')->user()->setting == 1);
                // $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
                // $review = (auth()->guard('admin')->user()->review == 1);
                // $orders = (auth()->guard('admin')->user()->orders == 1);
                // $stock = (auth()->guard('admin')->user()->stock == 1);
                // $reports = (auth()->guard('admin')->user()->reports == 1);
                // $alluser = (auth()->guard('admin')->user()->alluser == 1);
                // $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
                
                $brand = 1;
                $category = 1;
                $product = 1;
                $slider = 1;
                $coupons = 1;
                $shipping = 1;
                $blog = 1;
                $setting = 1;
                $returnorder = 1;
                $review = 1;
                $orders = 1;
                $stock = 1;
                $reports = 1;
                $alluser = 1;
                $adminuserrole = 1;
            @endphp
            @if ($brand)
                <li class="treeview {{ $prefix == '/brand' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Brands</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.brand' ? 'active' : '' }}"><a
                                href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
                    </ul>
                </li>
            @else
            @endif

            @if ($category)
                <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="mail"></i> <span>Category</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.category' ? 'active' : '' }}"><a
                                href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
                        <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}"><a
                                href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All
                                SubCategory</a></li>
                        <li class="{{ $route == 'all.subsubcategory' ? 'active' : '' }}"><a
                                href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All
                                Sub->SubCategory</a></li>
                    </ul>
                </li>
            @else
            @endif

            @if ($slider)
                <li class="treeview {{ $prefix == '/slide' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Slider</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'manage-slider' ? 'active' : '' }}"><a
                                href="{{ route('manage-slider') }}"><i class="ti-more"></i>All Slider</a></li>
                    </ul>
                </li>
            @else
            @endif

            @if ($coupons)
                <li class="treeview {{ $prefix == '/coupons' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Coupons</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'manage-coupon' ? 'active' : '' }}"><a
                                href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupon</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if ($shipping)
                <li class="treeview {{ $prefix == '/shipping' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Shipping Area</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'manage-division' ? 'active' : '' }}"><a
                                href="{{ route('manage-division') }}"><i class="ti-more"></i>Manage
                                Division</a>
                        </li>
                        <li class="{{ $route == 'manage-district' ? 'active' : '' }}"><a
                                href="{{ route('manage-district') }}"><i class="ti-more"></i>Manage
                                City</a></li>
                        <li class="{{ $route == 'manage-state' ? 'active' : '' }}"><a
                                href="{{ route('manage-state') }}"><i class="ti-more"></i>Manage District</a>
                        </li>

                    </ul>
                </li>
            @else
            @endif

            @if ($product)
                <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Products</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'add-product' ? 'active' : '' }}"><a
                                href="{{ route('add-product') }}"><i class="ti-more"></i>Add Product</a></li>
                        <li class="{{ $route == 'manage-product' ? 'active' : '' }}"><a
                                href="{{ route('manage-product') }}"><i class="ti-more"></i>Manage Product</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if ($stock)
                <li class="treeview {{ $prefix == '/stock' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Manage Stock</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'product.stock' ? 'active' : '' }}"><a
                                href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            <li class="header nav-small-cap">User Interface</li>

            @if ($orders)
                <li class="treeview {{ $prefix == '/orders' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Order</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'pending.orders' ? 'active' : '' }}"><a
                                href="{{ route('pending.orders') }}"><i class="ti-more"></i>Pending Order</a>
                        </li>
                        <li class="{{ $route == 'confirmed.orders' ? 'active' : '' }}"><a
                                href="{{ route('confirmed.orders') }}"><i class="ti-more"></i>Confirm
                                Order</a>
                        </li>
                        <li class="{{ $route == 'processing.orders' ? 'active' : '' }}"><a
                                href="{{ route('processing.orders') }}"><i class="ti-more"></i>Processing
                                Order</a></li>
                        <li class="{{ $route == 'picked.orders' ? 'active' : '' }}"><a
                                href="{{ route('picked.orders') }}"><i class="ti-more"></i>Picked Order</a>
                        </li>
                        <li class="{{ $route == 'shipped.orders' ? 'active' : '' }}"><a
                                href="{{ route('shipped.orders') }}"><i class="ti-more"></i>Shipped Order</a>
                        </li>
                        <li class="{{ $route == 'delivered.orders' ? 'active' : '' }}"><a
                                href="{{ route('delivered.orders') }}"><i class="ti-more"></i>Delivered
                                Order</a></li>
                        <li class="{{ $route == 'cancel.orders' ? 'active' : '' }}"><a
                                href="{{ route('cancel.orders') }}"><i class="ti-more"></i>Cancel Order</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if ($reports)
                <li class="treeview {{ $prefix == '/reports' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>All Reports</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.reports' ? 'active' : '' }}"><a
                                href="{{ route('all.reports') }}"><i class="ti-more"></i>All Reports</a></li>
                    </ul>
                </li>
            @else
            @endif

            @if ($alluser)
                <li class="treeview {{ $prefix == '/alluser' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>All Users</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.users' ? 'active' : '' }}"><a
                                href="{{ route('all.users') }}"><i class="ti-more"></i>All User</a></li>
                    </ul>
                </li>
            @else
            @endif

            @if ($adminuserrole)
                <li class="treeview {{ $prefix == '/adminuserrole' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Admin User Role</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.admin.users' ? 'active' : '' }}"><a
                                href="{{ route('all.admin.users') }}"><i class="ti-more"></i>All Admin
                                User</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if ($blog)
                <li class="treeview {{ $prefix == '/blog' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Manage Blog</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'blog.category' ? 'active' : '' }}"><a
                                href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog Category</a>
                        </li>
                        <li class="{{ $route == 'list.post' ? 'active' : '' }}"><a
                                href="{{ route('list.post') }}"><i class="ti-more"></i>List Blog Post</a>
                        </li>
                        <li class="{{ $route == 'add.post' ? 'active' : '' }}"><a
                                href="{{ route('add.post') }}"><i class="ti-more"></i>Add Blog Post</a></li>
                    </ul>
                </li>
            @else
            @endif

            @if ($setting)
                <li class="treeview {{ $prefix == '/setting' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Manage Setting</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'site.setting' ? 'active' : '' }}"><a
                                href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a>
                        </li>
                        <li class="{{ $route == 'seo.setting' ? 'active' : '' }}"><a
                                href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Setting</a></li>

                    </ul>
                </li>
            @else
            @endif

            @if ($returnorder)
                <li class="treeview {{ $prefix == '/return' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Return Order</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'return.request' ? 'active' : '' }}"><a
                                href="{{ route('return.request') }}"><i class="ti-more"></i>Return
                                Request</a>
                        </li>
                        <li class="{{ $route == 'all.request' ? 'active' : '' }}"><a
                                href="{{ route('all.request') }}"><i class="ti-more"></i>All Request</a></li>
                    </ul>
                </li>
            @else
            @endif

            @if ($review)
                <li class="treeview {{ $prefix == '/review' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Manage Review</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'pending.review' ? 'active' : '' }}"><a
                                href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending
                                Review</a>
                        </li>
                        <li class="{{ $route == 'publish.review' ? 'active' : '' }}"><a
                                href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish
                                Review</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

        </ul>
    </section>

    {{-- <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div> --}}
</aside>
