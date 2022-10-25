@extends('admin.admin_master')

@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Site Setting Page</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('update.sitesetting') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $setting->id }}" name="id">
                                <div class="row" style="display: flex; justify-content: center;">
                                    <div class="col-12">
                                        <div class="row" style="display: flex; justify-content: center;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Site Logo <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="hidden" name="oldlogo" value="{{ $setting->logo }}">
                                                        <img src="{{ asset($setting->logo) }}"
                                                            style="width:auto;margin-bottom: 8px;" alt="">
                                                        <input type="file" name="logo" id="logo" class="form-control"
                                                            data-validation-required-message="This field is required">
                                                        <br>
                                                        <img src="" id="logoImageShow" alt="">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Phone One <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_one"
                                                            value="{{ $setting->phone_one }}" class="form-control"
                                                            required=""
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Phone Two <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_two" class="form-control"
                                                            value="{{ $setting->phone_two }}" required=""
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" value="{{ $setting->email }}"
                                                            class="form-control" required=""
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Company Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="company_name" class="form-control"
                                                            value="{{ $setting->company_name }}" required=""
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Company Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="company_address" class="form-control"
                                                            value="{{ $setting->company_address }}"
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Facebook <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="facebook" class="form-control"
                                                            required="" value="{{ $setting->facebook }}"
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Twitter <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="twitter" class="form-control"
                                                            value="{{ $setting->twitter }}"
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Linkedin <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="linkedin" class="form-control"
                                                            value="{{ $setting->linkedin }}"
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Youtube <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="youtube" class="form-control"
                                                            value="{{ $setting->youtube }}"
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update"></input>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('add-script')
    <script>
        let logoImage = document.querySelector('#logo');
        if (logoImage) {
            logoImage.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let logoImageShow = document.querySelector('#logoImageShow');
                        logoImageShow.setAttribute('src', e.target.result);
                        logoImageShow.style.width = 'auto';
                        // logoImageShow.style.height = '80px';
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }
    </script>
@endsection
