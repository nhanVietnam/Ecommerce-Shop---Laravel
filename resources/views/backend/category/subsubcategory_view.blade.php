@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row"> 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">SubCategory List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category</th>
								<th>SubCategory Name</th>
								<th>Sub->SubCategory Name En</th>
								<th>Sub->SubCategory Name Vn</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach ($subsubcategories as $subsubcategory)
                            <tr>
                                <td>{{$subsubcategory->category->category_name_vn}}</td>
                                <td>{{$subsubcategory->subcategory->subcategory_name_vn}}</td>
                                <td>{{$subsubcategory->subsubcategory_name_en}}</td>
                                <td>{{$subsubcategory->subsubcategory_name_vn}}</td>
                                <td style="white-space: nowrap;">
                                    <a href="{{route('subsubcategory.edit', $subsubcategory->id)}}" title="Edit Sub->SubCategory" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('subsubcategory.delete', $subsubcategory->id)}}" title="Delete" class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
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
            <div class="col-4">

                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Add Sub->SubCategory</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{route('subsubcategory.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control" aria-invalid="false">
                                            <option value="" selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name_vn}}</option>
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
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control" aria-invalid="false">
                                            <option value="" selected disabled>Select SubCategory</option>
                                            
                                            
                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    <div class="help-block"></div></div>
                                </div>
                                
                                <div class="form-group">
                                    <h5>Sub->SubCategory Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subsubcategory_name_en" class="form-control" ></div>
                                        @error('subsubcategory_name_en')
                                          <span class="text-danger">
                                            {{$message}}
                                          </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Sub->SubCategory Name Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subsubcategory_name_vn" class="form-control" ></div>
                                        @error('subsubcategory_name_vn')
                                          <span class="text-danger">
                                            {{$message}}
                                          </span>
                                        @enderror
                                </div>
                                
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New"></input>
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
@section('add-script')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection