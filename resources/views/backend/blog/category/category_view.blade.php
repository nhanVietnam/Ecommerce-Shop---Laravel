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
				  <h3 class="box-title">Blog Category List: <span class="badge badge-pill badge-danger">{{count($blogCategory)}}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Blog Category En</th>
								<th>Blog Category Vn</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                @foreach ($blogCategory as $item)
                    <tr>
                        <td>
                            {{$item->blog_category_name_en}}
                        </td>
                        <td>
                           {{ $item->blog_category_name_vn }}
                        </td>
                        <td>
                            <a href="{{route('blog.category.edit', $item->id)}}" title="Edit Blog Category" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                            <a href="{{route('category.delete', $item->id)}}" title="Delete" class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
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
                     <h3 class="box-title">Add Blog Category</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{route('blog.category.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <h5>Blog Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_en" class="form-control" ></div>
                                        @error('blog_category_name_en')
                                          <span class="text-danger">
                                            {{$message}}
                                          </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Blog Category Name Vietnamese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_vn" class="form-control" ></div>
                                        @error('blog_category_name_vn')
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