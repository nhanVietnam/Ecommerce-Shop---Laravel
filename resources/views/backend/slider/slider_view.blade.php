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
                            <h3 class="box-title">Slider List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Slider Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($slider->slider_image) }}" alt="" width="70px"
                                                        height="40px">
                                                </td>
                                                <td>
                                                    @if ($slider->title == '' || $slider->title == null)
                                                        <span class="badge badge-pill badge-danger">No Title</span>
                                                    @else
                                                        <span
                                                            class="badge badge-pill badge-success">{{ $slider->title }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($slider->description == '' || $slider->description == null)
                                                        <span class="badge badge-pill badge-danger">No Description</span>
                                                    @else
                                                        {{ $slider->description }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($slider->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td width="30%">
                                                    <a href="{{ route('slider.edit', $slider->id) }}" title="Edit Brand"
                                                        class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('slider.delete', $slider->id) }}" title="Delete"
                                                        class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
                                                    @if ($slider->status == 1)
                                                        <a href="{{ route('slider.inactive', $slider->id) }}"
                                                            class="btn btn-danger" title="Inactive Now"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ route('slider.active', $slider->id) }}"
                                                            class="btn btn-success" title="Active Now"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
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
                            <h3 class="box-title">Add Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Slider Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                        @error('title')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Slider Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" class="form-control">
                                        </div>
                                        @error('description')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Slider Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" id="sliderImage" name="slider_image" class="form-control">
                                        </div>
                                        @error('slider_image')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        <img src="" id="sliderImageShow" alt="">
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="add New"></input>
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
        let sliderImage = document.querySelector('#sliderImage');
        if (sliderImage) {
            sliderImage.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let sliderImageShow = document.querySelector('#sliderImageShow');
                        sliderImageShow.setAttribute('src', e.target.result);
                        sliderImageShow.style.width = '100%';
                        sliderImageShow.style.height = 'auto';
                        sliderImageShow.style.marginTop = '16px';
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }
        z
    </script>
@endsection
