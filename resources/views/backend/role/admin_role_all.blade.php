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
				  <h3 class="box-title">Total Admin User</h3>
                  <a href="{{route('add.admin')}}" class="btn btn-success" style="float: right;">Add Admin User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image </th>
								<th>Name </th>
								<th>Email</th>
								<th>Access</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                @foreach ($adminuser as $user)
                    <tr>
                        <td>
                            <img src="{{asset($user->profile_photo_path)}}" style="width:50px; height:50px;" alt="">
                        </td>
                        <td>
                            {{$user->name}}
                        </td>   
                        <td>{{$user->email}}</td>
                        <td>
							@if ($user->brand == 1)
								<span class="badge btn-primary">Brand</span>
							@else

							@endif

							@if ($user->category == 1)
								<span class="badge btn-secondary">Category</span>
							@else

							@endif
							@if ($user->product == 1)
								<span class="badge btn-success">Product</span>
							@else

							@endif
							@if ($user->slider == 1)
								<span class="badge btn-danger">Slider</span>
							@else

							@endif
							@if ($user->coupons == 1)
								<span class="badge btn-warning">Coupons</span>
								
							@else

							@endif
							@if ($user->shipping == 1)
								<span class="badge btn-info">Coupons</span>
							@else

							@endif
							@if ($user->blog == 1)
								<span class="badge btn-light">Blog</span>
							@else

							@endif
							@if ($user->setting == 1)
								<span class="badge btn-dark">Setting</span>
							@else

							@endif
							@if ($user->returnorder == 1)
								<span class="badge btn-primary">Return Order</span>
							@else

							@endif
							@if ($user->review == 1)
								<span class="badge btn-secondary">Review</span>
							@else

							@endif
							@if ($user->orders == 1)
								<span class="badge btn-success">Orders</span>
							@else

							@endif
							@if ($user->stock == 1)
								<span class="badge btn-danger">Stock</span>
							@else

							@endif
							@if ($user->reports == 1)
								<span class="badge btn-warning">Reports</span>
							@else

							@endif
							@if ($user->alluser == 1)
								<span class="badge btn-info">Alluser</span>
							@else

							@endif
							@if ($user->adminuserrole == 1)
								<span class="badge btn-dark">Adminuserrole</span>
							@else

							@endif
						</td>
                        {{-- <td>{{str_replace(',','.',number_format($order->amount))}}đ</td> --}}
                        {{-- <td>
                            @if ($coupon->status == 1)
                                <span class="badge badge-pill badge-success">Valid</span>
                            @else
                                <span class="badge badge-pill badge-success">Invalid</span>
                            @endif
                        </td> --}}
                        {{-- <td>{{$order->payment_method}}</td> --}}
                        {{-- <td><span class="badge badge-pill badge-primary">{{$order->status}}</span></td> --}}
                        <td width="25%">
                            <a href="{{route('edit.admin.user', $user->id)}}" title="Edit orders" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                            <a href="{{route('delete.admin.user',$user->id)}}" title="Delete" class="btn btn-danger delete" id="delete"><i class="fa fa-trash"></i></a>
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