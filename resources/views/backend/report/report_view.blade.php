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
                            <h3 class="box-title">Search By Date</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                    <form action="{{route('search-by-date')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <h5>Select Date <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="date" class="form-control" ></div>
                                                @error('date')
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search"></input>
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->      
                </div>
			<!-- /.col -->
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Search By Month</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                    <form action="{{route('search-by-month')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <h5>Select Month <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="month" class="form-control" id="">
                                                    <option label="Choose One"></option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="Notober">Notober</option>
                                                    <option value="December">December</option>
                                                </select>
                                                @error('month')
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Select Year <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="year_name" class="form-control" id="">
                                                    <option label="Choose One"></option>
                                                    <option value="2022">2022</option>
                                                    <option value="2021 ">2021</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2019">2019</option>
                                                </select>
                                                @error('year_name')
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search"></input>
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->      
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Search By Year</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                    <form action="{{route('search-by-year')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <h5>Select Year <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="year" class="form-control" id="">
                                                    <option label="Choose One"></option>
                                                    <option value="2022">2022</option>
                                                    <option value="2021 ">2021</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2019">2019</option>
                                                </select>
                                                @error('year')
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search"></input>
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