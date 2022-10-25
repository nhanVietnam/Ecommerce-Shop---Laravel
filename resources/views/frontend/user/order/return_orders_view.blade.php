@extends('frontend.main_master')

@section('content')

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
                                {{-- <td class="col-md-2"> 
                                    <label for="">Order Number</label>
                                </td> --}}
                                <td class="col-md-2"> 
                                    <label for="">Return Reason</label>
                                </td>
                                <td class="col-md-2"> 
                                <label for="">Order Status</label>
                                </td>
                            </tr>
                            @foreach ($orders as $order)
                            <tr style="background: #e2e2e2">
                                <td class="col-md-1"> 
                                    <label for="">{{$order->order_date}}</label>
                                </td>
                                <td class="col-md-2"> 
                                    <label for="">{{str_replace(',','.',number_format($order->amount))}}đ</label>
                                </td>
                                <td class="col-md-3"> 
                                    <label for="">{{$order->payment_method}}</label>
                                </td>
                                <td class="col-md-2"> 
                                    <label for="">{{$order->invoice_no}}</label>
                                </td>
                                <td class="col-md-2"> 
                                    <label for="">{{$order->return_reason}}</label>
                                </td>
                                <td class="col-md-2"> 
                                    <label for="">
                                        @if ($order->return_order == 0)
                                            <span class="badge badge-pill badge-primary" style="background: #418DB9">
                                                No Return Request
                                            </span>
                                        @elseif ($order->return_order == 1)
                                            <span class="badge badge-pill badge-warning" style="background: #800000;">
                                                Pending
                                            </span>
                                            <span class="badge badge-pill badge-warning" style="background: red;">
                                                Return Request
                                            </span>
                                        @elseif ($order->return_order == 2)
                                            <span class="badge badge-pill badge-warning" style="background: #008000;">
                                                Success
                                            </span>
                                        @endif
                                    </label>
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
