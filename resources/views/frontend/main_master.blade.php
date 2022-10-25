<!DOCTYPE html>
<html lang="en">
@php
$seo = App\Models\Seo::find(1);
@endphp

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta name="keywords" content="{{ $seo->meta_keyword }}">
    <meta name="robots" content="all">
    <script>
        {{ $seo->google_analytics }}
    </script>
    <title>@yield('title') </title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <style>
        .search-area {
            position: relative;
        }

        #searchProducts {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: #ffffff;
            z-index: 999;
            border-radius: 8px;
            margin-top: 5px;
        }

    </style>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.body.header')
    <!-- ============================================== HEADER : END ============================================== -->
    @yield('content')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.body.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            let type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}")
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}")
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}")
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}")
                    break;
            }
        @endif
    </script>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="display: flex; align-items: center; justify-content: space-between;">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><span id="productName"></span></strong>
                    </h5>
                    <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="" id="productImage" class="card-img-top" alt=""
                                    style="height: 200px; width: 200px;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Product Price: <strong class="text-danger">
                                        <span id="productPrice">
                                        </span>đ
                                    </strong><del id="productOldPrice"></del>đ</li>
                                <li class="list-group-item">Product Code: <strong id="productCode"></strong></li>
                                <li class="list-group-item">Category: <strong id="productCategory"></strong></li>
                                <li class="list-group-item">Brand: <strong id="productBrand"></strong></li>
                                <li class="list-group-item">Stock: <span id="available"
                                        class="badge badge-pill badge-success"
                                        style="background: green; color:white;"></span><span id="stockout"
                                        class="badge badge-pill badge-success"
                                        style="background: red;color: white;"></span></li>

                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="color">Select Color</label>
                                <select class="form-control" name="color" id="color">
                                </select>
                            </div>
                            <div class="form-group" id="hideSize">
                                <label for="size">Select Size</label>
                                <select class="form-control" name="size" id="size">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity </label>
                                <input type="number" class="form-control" onkeyup="changeValueTypeNumber(this.value)"
                                    name="quantity" id="quantity" min="1" value="1" max="10">
                            </div>
                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary mb-2" id="addToCartBtn"
                                onclick="addToCart()">Add To
                                Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
            }
        });

        function productView(id) {
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    $('#productPrice').text(data.product.selling_price);
                    $('#productCode').text(data.product.product_code);
                    $('#productName').text(data.product.product_name_vn);
                    $('#productImage').attr('src', '/' + data.product.product_thumbnail);
                    $('#productCategory').text(data.product.category.category_name_vn);
                    $('#productBrand').text(data.product.brand.brand_name_vn);

                    $('#product_id').val(id);
                    $('#quantity').val(1);

                    if (data.product.discount_price == null || data.product.discount_price == 0) {
                        $('#productPrice').text('');
                        $('#productOldPrice').text('');
                        $('#productPrice').text(data.product.selling_price);
                    } else {
                        $('#productPrice').text('');
                        $('#productOldPrice').text('');
                        $('#productPrice').text(data.product.discount_price);
                        $('#productOldPrice').text(data.product.selling_price);
                    }

                    if (data.product.product_quantity > 0) {
                        $('#stockout').text('');
                        $('#available').text('');
                        $('#available').text('In Stock');
                    } else {
                        $('#stockout').text('');
                        $('#available').text('');
                        $('#stockout').text('Out Of Stock');
                        $("#addToCartBtn").hide();
                    }

                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value="' + value + '">' + value +
                            '</option>');
                    });
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value="' + value + '">' + value +
                            '</option>');
                    });

                    if (data.size == "" || data.size == null) {
                        $('#hideSize').hide();
                    } else {
                        $('#hideSize').show();
                    }
                },
            });
        }

        function addToCart() {
            let product_name = $('#productName').text();
            let id = $('#product_id').val();
            let color = $('#color option:selected').text();
            let size = $('#size option:selected').text();
            let quantity = $('#quantity').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart();
                    $('#closeModal').click();
                    const toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        toast.fire({
                            type: 'success',
                            title: data.success,

                        });
                    } else {
                        toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                }
            });
        }

        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                data: 'json',
                success: function(response) {
                    // console.log(response.cartQuantity);
                    $('span[id="cartSubTotal"]').text(response.cartTotal);
                    $('#cartQty').text(response.cartQuantity);
                    let miniCart = '';
                    $.each(response.carts, function(key, value) {
                        miniCart += `
                        <div class="cart-item product-summary">
                            <div class="row">
                            <div class="col-xs-4">
                                <div class="image"> <a href="detail.html"><img src="/${value.options.images}" alt=""></a></div>
                            </div>
                            <div class="col-xs-7">
                                <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                <div class="price">${value.price}đ * ${value.qty}</div>
                            </div>
                            <div class="col-xs-1 action"> <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
                            </div>
                        </div>
                        <!-- /.cart-item -->
                        <div class="clearfix"></div>
                        <hr>`;
                    });

                    $('#miniCart').html(miniCart);
                    // $('#checkEmpty').html(` 
                // <div class="col-md-12"
                //     style="height: 70vh; min-height: 500px; display:flex; flex-direction: column;align-items: center; gap: 16px	">
                //     ;
                //     <img src="{{ asset('upload/emptyCard.png') }}" style="width: 300px; height:auto;" alt="">
                //     <p>Giỏ hàng chưa có sản phẩm nào</p>
                //     <a class="btn btn-primary"
                //         style="padding:10px 20px; display: inline; border-radius: 4px; width:fit-content;"
                //         href="/">Mua sắm ngay</a>
                // </div>
                //);
            },
        });
    }
    miniCart();

    function miniCartRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/' + rowId,
            dataType: 'json',
            success: function(data) {
                miniCart();
                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }
                // End Message 
            }
        });
    }

    function addToWishlist(product_id) {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "/add-to-wishlist/" + product_id,
            success: function(data) {
                const toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 3000
                });
                if ($.isEmptyObject(data.error)) {
                    toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,

                    });
                } else {
                    toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    });
                }
            }
        });
    }

    function wishlist() {
        $.ajax({
            type: 'GET',
            url: '/user/get-wishlist-product',
            data: 'json',
            success: function(data) {
                // console.log(data);
                let rows = '';
                $.each(data, function(key, value) {
                    rows +=
                        `<tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="image"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td class="col-md-7">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="product-name"><a href="#">${value.product.product_name_vn}</a></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="price">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ${(value.product.discount_price == null || value.product.discount_price == 0) ? `${value.product.selling_price}đ` : `${value.product.discount_price}đ <span>${value.product.selling_price}đ</span>`}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td class="col-md-2">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="btn btn-primary icon"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            title="Add Cart"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            data-toggle="modal"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            data-target="#exampleModal"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            type="button" id="${value.product_id}" onclick="productView(this.id)"> Add To Cart <i class="fa fa-shopping-cart"></i> </button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td class="col-md-1 close-btn">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button type="submit" id="${value.id}" onclick="wishListRemove(this.id)" class=""><i class="fa fa-times"></i></button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </tr>`;
                });
                $('#wishlist').html(rows);
            },
            error: function() {
                console.log('unauthenticate');
            }
        });
    }
    let wishlistCheck = document.querySelector('#wishlistCheck');
    if (wishlistCheck) {
        wishlist();

    }

    function wishListRemove(id) {
        $.ajax({
            type: 'GET',
            url: '/user/wishlist-remove/' + id,
            dataType: 'json',
            success: function(data) {
                wishlist();
                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }
                // End Message 
            }
        });
    }

    function cart() {
        $.ajax({
            type: 'GET',
            url: '/user/get-cart-product',
            data: 'json',
            success: function(data) {

                let rows = '';
                $.each(data.carts, function(key, value) {
                    rows +=
                        `<tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td class="col-md-2"><img src="/${value.options.images}" style="width:60px; height:60px;" alt="image"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td class="col-md-2">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="product-name"><a href="#">${value.name}</a></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="price">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ${value.price}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td class="col-md-2">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <strong>${value.options.color}</strong>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td class="col-md-2">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ${value.options.size == null ? `<span>...<span>` : `<strong>${value.options.size}</strong>`}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td class="col-md-2" style="white-space: nowrap;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ${value.qty > 1
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?  `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button>`
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                :  `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button>`
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text" value="${value.qty}" min="1" max="100" disabled style="width:25px;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td class="col-md-2">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <strong>${value.subtotal }</strong>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td class="col-md-1 close-btn">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <button type="submit" id="${value.rowId}" onclick="cartRemove(this.id)" class=""><i class="fa fa-times"></i></button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </tr>`;
                });
                $('#cartPage').html(rows);
                // console.log(data.carts);
                if (data.carts.length == 0) {
                    {{ Session::has('coupon') ? 'couponRemove()' : '' }}
                    $('#checkEmpty').html(
                        ` 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="col-md-12"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    style="height: 70vh; min-height: 500px; display:flex; flex-direction: column;align-items: center; gap: 16px	">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <img src="{{ asset('upload/emptyCard.png') }}" style="width: 300px; height:auto;" alt="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <p>Giỏ hàng chưa có sản phẩm nào</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <a class="btn btn-primary"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        style="padding:10px 20px; display: inline; border-radius: 4px; width:fit-content;"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        href="/">Mua sắm ngay</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>`
                    );
                }
            },
        });
    }
    cart();

    function cartRemove(id) {
        $.ajax({
            type: 'GET',
            url: '/user/cart-remove/' + id,
            dataType: 'json',
            success: function(data) {
                cart();
                miniCart();
                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }
                // End Message 
            }
        });
    }

    function cartIncrement(rowId) {
        $.ajax({
            type: 'GET',
            url: '/cart-increment/' + rowId,
            dataType: 'json',
            success: function(data) {
                cart();
                couponCalculation();
                miniCart();
            },
        });
    }

    function cartDecrement(rowId) {
        $.ajax({
            type: 'GET',
            url: '/cart-decrement/' + rowId,
            dataType: 'json',
            success: function(data) {
                cart();
                couponCalculation();
                miniCart();
            },
        });
    }

    function applyCoupon() {
        let couponName = $('#coupon_name').val();
        // console.log(couponName);
        $.ajax({
            type: 'POST',
            data: {
                coupon_name: couponName
            },
            url: "{{ url('/coupon-apply') }}",
            dataType: 'json',
            success: function(data) {
                couponCalculation();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });
                if ($.isEmptyObject(data.error)) {
                    $('#couponField').hide();
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }
                // End Message 
            }
        })
    }

    function couponCalculation() {
        $.ajax({
            type: 'GET',
            url: "{{ url('/coupon-calculation') }}",
            dataType: 'json',
            success: function(data) {
                if (data.total) {
                    $('#couponCalculatedField').html(
                        `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="cart-sub-total">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Subtotal<span class="inner-left-md">${data.total}đ</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="cart-grand-total">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Grand Total<span class="inner-left-md">${data.total}đ</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                `
                    );
                } else {
                    $('#couponCalculatedField').html(
                        `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="cart-sub-total">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Subtotal<span class="inner-left-md">${data.subtotal}đ</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="cart-sub-total">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Coupon<span class="inner-left-md">${data.coupon_name}</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <button type="submit" onclick="couponRemove()" ><i class="fa fa-times"></i></button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="cart-sub-total">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Discount Amount<span class="inner-left-md">${data.discount_amount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}đ</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="cart-grand-total">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Grand Total<span class="inner-left-md">${data.total_amount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}đ</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `
                        );
                    }
                },
            });
        }

        couponCalculation();

        function couponRemove() {
            $.ajax({
                type: "GET",
                url: "{{ url('/coupon-remove') }}",
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    $('#couponCalculatedField').show();
                    $('#couponField').show();
                    $('#coupon_name').val('');

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                },
            });
        }
        let modalQuantity = document.querySelector('#quantity');
        console.log(modalQuantity.value);

        function changeValueTypeNumber(value) {
            console.log(value);
            if (value > 10) {
                modalQuantity.value = 10;
            } else if (value < 0) {
                modalQuantity.value = 1;
            } else if (value == '') {
                modalQuantity.value = 1;
            }
        }
        // modalQuantity.addEventListener('change', function(e) {
        //     console.log(modalQuantity.value);
        //     modalQuantity.setAttribute('value', modalQuantity.value);
        // });
    </script>
    @yield('add-script')
</body>

</html>
