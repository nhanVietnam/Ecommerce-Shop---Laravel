@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row"> 

            <div class="col-4">

                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Brand List</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$brand->id}}">
                                <input type="hidden" name="oldimage" value="{{$brand->brand_image}}">

                                <div class="form-group">
                                    <h5>Brand Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_en" class="form-control" value="{{$brand->brand_name_en}}" ></div>
                                        @error('brand_name_en')
                                          <span class="text-danger">
                                            {{$message}}
                                          </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Brand Name Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_vn" value="{{$brand->brand_name_vn}}" class="form-control" ></div>
                                        @error('brand_name_vn')
                                          <span class="text-danger">
                                            {{$message}}
                                          </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="brand_image" class="form-control" ></div>
                                        @error('brand_image')
                                          <span class="text-danger">
                                            {{$message}}
                                          </span>
                                        @enderror
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update"></input>
                                </div>
                            </form>
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