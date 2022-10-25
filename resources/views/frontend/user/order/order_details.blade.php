@extends('frontend.main_master')

@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-5">
                    <div class="card">
                        @php
                            // dd($order);
                        @endphp
                        <div class="card_header">
                            <h4>Shipping Details</h4>
                        </div>
                        <div class="card-body" style="background: #E9EBEC">
                            <table class="table">
                                <tr>
                                    <th>Shipping Name:</th>
                                    <th>{{ $order->name }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Phone:</th>
                                    <th>{{ $order->phone }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Email:</th>
                                    <th>{{ $order->email }}</th>
                                </tr>
                                <tr>
                                    <th>Division: </th>
                                    <th>{{ $order->division->division_name }}</th>
                                </tr>
                                <tr>
                                    <th>District: </th>
                                    <th>{{ $order->district->district_name }}</th>
                                </tr>
                                <tr>
                                    <th>State: </th>
                                    <th>{{ $order->state->state_name }}</th>
                                </tr>
                                <tr>
                                    <th>Post Code: </th>
                                    <th>{{ $order->post_code }}</th>
                                </tr>
                                <tr>
                                    <th>Order Date: </th>
                                    <th>{{ $order->created_at }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card_header">
                            <h4>Order Details</h4>
                        </div>
                        <div class="card-body" style="background: #E9EBEC">
                            <table class="table">
                                <tr>
                                    <th>Image:</th>
                                    <th>{{ $order->user->name }}</th>
                                </tr>
                                <tr>
                                    <th>Product Name:</th>
                                    <th>{{ $order->user->phone }}</th>
                                </tr>
                                <tr>
                                    <th>Payment Type: </th>
                                    <th>{{ $order->payment_method }}</th>
                                </tr>
                                <tr>
                                    <th>Transaction Id: </th>
                                    <th>{{ $order->transaction_id }}</th>
                                </tr>
                                <tr>
                                    <th>Invoice: </th>
                                    <th class="text-danger">{{ $order->invoice_no }}</th>
                                </tr>
                                <tr>
                                    <th>Order Total: </th>
                                    <th>{{ str_replace(',', '.', number_format($order->amount)) }}đ</th>
                                </tr>
                                <tr>
                                    <th>Status: </th>
                                    <th>
                                        <span class="badge badge-pill badge-warning" style="background: #418DB9">
                                            {{ $order->status }}
                                        </span>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr style="background: #e2e2e2">
                                    <td class="col-md-1">
                                        <label for="">Image</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Product Name</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Product Code</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Color</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Size</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Quantity</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Price</label>
                                    </td>
                                </tr>
                                @foreach ($orderItem as $product)
                                    <tr style="background: #e2e2e2">
                                        <td class="col-md-1">
                                            <label for="">
                                                <img src="{{ asset($product->product->product_thumbnail) }}"
                                                    style="height: 50px; width: 50px" alt="">
                                            </label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="">{{ $product->product->product_name_vn }}</label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="">{{ $product->product->product_code }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $product->color }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $product->size }}</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="">{{ $product->qty }}</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="">{{ str_replace(',', '.', number_format($product->price)) }}
                                                ({{ $product->price * $product->qty }})
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @php
                $checkReason = App\Models\Order::where('id', $order->id)
                    ->where('return_reason', null)
                    ->first();
            @endphp
            @if ($checkReason)
                <form action="{{ route('return.orders', $order->id) }}" method="POST" style="padding-bottom: 8px;">
                    @csrf
                    <div class="form-group">
                        <label for="">Order Return Reason</label>
                        <textarea name="return_reason" id="" class="form-control" cols="30" rows="5">Return Reason</textarea>
                    </div>

                    <button type="submit" class="btn btn-danger">Order Return</button>
                </form>
            @else
                <span class="badge badge-pill badge-warning"
                    style="background: red; margin-bottom: 16px; text-align:center">
                    You have send return request for this product
                </span>
            @endif
        </div>
    </div>
@endsection
