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
				  <h3 class="box-title">District List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Division Name</th>
								<th>District Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                @foreach ($districts as $district)
                    <tr>
                        <td>
                            {{$district->division->division_name}}
                        </td>   
                        <td>
                            {{$district->district_name}}
                        </td>   
                        <td width="40%">
                            <a href="{{route('district.edit',$district->id)}}" title="Edit District" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                            <a href="{{route('district.delete',['id' => $district->id])}}" title="Delete" class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
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
                     <h3 class="box-title">Add District</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{route('district.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <h5>Division Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="division_id" class="form-control" aria-invalid="false">
                                            <option value="" selected disabled>Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{$division->id}}">{{$division->division_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    <div class="help-block"></div></div>
                                </div>
                                <div class="form-group">
                                    <h5>District Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="district_name" class="form-control" />
                                    </div>
                                        @error('district_name')
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