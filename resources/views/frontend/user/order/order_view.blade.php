@extends('frontend.main_master')

@section('content')
    <br>
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr style="background: #e2e2e2">
                                    <td class="col-md-1">
                                        <label for="">Date</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Total</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Invoice</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Order</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Status</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Action</label>
                                    </td>
                                </tr>
                                @foreach ($orders as $order)
                                    <tr style="background: #e2e2e2">
                                        <td class="col-md-1">
                                            <label for="">{{ $order->order_date }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label
                                                for="">{{ str_replace(',', '.', number_format($order->amount)) }}</label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="">{{ $order->payment_method }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $order->invoice_no }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">
                                                @if ($order->status == 'pending')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #800080">
                                                        Pending
                                                    </span>
                                                @elseif ($order->status == 'confirm')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #0000ff">
                                                        Confirm
                                                    </span>
                                                @elseif ($order->status == 'processing')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #ffa500">
                                                        Processing
                                                    </span>
                                                @elseif ($order->status == 'picked')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #808000">
                                                        Picked
                                                    </span>
                                                @elseif ($order->status == 'shipped')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #808080">
                                                        Shipped
                                                    </span>
                                                @elseif ($order->status == 'delivered')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #008000">
                                                        Delivered
                                                    </span>
                                                    @if ($order->return_order == 1)
                                                        <span class="badge badge-pill badge-warning"
                                                            style="background: #008000">
                                                            Return Requested
                                                        </span>
                                                    @endif
                                                @else
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background: #FF0000">
                                                        Cancel
                                                    </span>
                                                @endif
                                            </label>
                                        </td>
                                        <td class="col-md-2">
                                            <a href="{{ url('user/order-details/' . $order->id) }}"
                                                class="btn btn-sm btn-primary" style="margin-bottom: 8px;"><i
                                                    class="fa fa-eye">View</i></a>
                                            <a href="{{ url('user/invoice-download/' . $order->id) }}"
                                                class="btn btn-sm btn-danger"><i class="fa fa-download">Invoice</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
