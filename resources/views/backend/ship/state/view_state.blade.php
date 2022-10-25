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
                            <h3 class="box-title">States List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Division Name</th>
                                            <th>District Name</th>
                                            <th>State Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($states as $state)
                                            <tr>
                                                <td>
                                                    {{ $state->division->division_name }}
                                                </td>
                                                <td>
                                                    {{ $state->district->district_name }}
                                                </td>
                                                <td>
                                                    {{ $state->state_name }}
                                                </td>
                                                <td width="40%">
                                                    <a href="{{ route('state.edit', $state->id) }}" title="Edit State"
                                                        class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('state.delete', $state->id) }}" title="Delete"
                                                        class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
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
                            <h3 class="box-title">Add State</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{ route('state.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Division Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" class="form-control" aria-invalid="false">
                                                <option value="" selected disabled>Select Division</option>
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}">{{ $division->division_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>District Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="district_id" class="form-control" aria-invalid="false">
                                                {{-- <option value="" selected disabled>Select District</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->district_name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            @error('district_id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>State Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="state_name" class="form-control" />
                                        </div>
                                        @error('state_name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="Add New"></input>
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
    <script>
        $(document).ready(function() {
            if ($('select[name="division_id"]')) {
                $('select[name="division_id"]').on('change', function() {
                    var division_id = $(this).val();
                    if (division_id) {
                        $.ajax({
                            url: "{{ url('/shipping/ajax/district') }}/" + division_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                var d = $('select[name="district_id"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="district_id"]').append(
                                        '<option value="' + value.id + '">' + value
                                        .district_name + '</option>');
                                });
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });
            } else {
                console.log('division_id NOT FOUND');
            }
        });
    </script>
@endsection
