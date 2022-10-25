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
                     <h3 class="box-title">Edit SubCategory</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{route('subcategory.update',$subcategory->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$subcategory->id}}">
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control" aria-invalid="false">
                                            <option value="" selected disabled>Select Your City</option>
                                            @foreach ($categories as $category)
                                                <option 
                                                    {{$category->id == $subcategory->category_id ?
                                                        'selected' : ''}}
                                                value="{{$category->id}}">{{$category->category_name_vn}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    <div class="help-block"></div></div>
                                </div>
                                <div class="form-group">
                                    <h5>SubCategory Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_en" value="{{$subcategory->subcategory_name_en}}" class="form-control" ></div>
                                        @error('subcategory_name_en')
                                          <span class="text-danger">
                                            {{$message}}
                                          </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Category Name Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_vn" value="{{$subcategory->subcategory_name_vn}}" class="form-control" ></div>
                                        @error('subcategory_name_vn')
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