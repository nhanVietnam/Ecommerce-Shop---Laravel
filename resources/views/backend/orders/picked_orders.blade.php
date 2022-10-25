@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row"> 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Picked Orders List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Date</th>
								<th>Invoice</th>
								<th>Amount</th>
								<th>Payment</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            {{$order->order_date}}
                        </td>   
                        <td>{{$order->invoice_no}}</td>
                        <td>{{str_replace(',','.',number_format($order->amount))}}đ</td>
                        {{-- <td>
                            @if ($coupon->status == 1)
                                <span class="badge badge-pill badge-success">Valid</span>
                            @else
                                <span class="badge badge-pill badge-success">Invalid</span>
                            @endif
                        </td> --}}
                        <td>{{$order->payment_method}}</td>
                        <td><span class="badge badge-pill badge-primary">{{$order->status}}</span></td>
                        <td width="25%">
                            <a href="{{route('pending.orders.details', $order->id)}}" title="Edit orders" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                            <a href="{{route('coupon.delete', $order->id)}}" title="Delete" class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->      
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
@endsection