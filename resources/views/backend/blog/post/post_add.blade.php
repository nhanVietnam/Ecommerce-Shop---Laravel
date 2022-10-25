@extends('admin.admin_master')

@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Product </h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('post-store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            {{-- row 2 --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Blog Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" selected disabled>Select Blog Category</option>
                                                            @foreach ($blogCategory as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->blog_category_name_vn }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Title Vn <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required type="text" name="post_title_vn"
                                                            class="form-control">
                                                        @error('post_title_vn')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Title En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required type="text" name="post_title_en"
                                                            class="form-control">
                                                        @error('post_title_en')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- row 6 --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Main Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required type="file" id="thumbnailImage" name="post_image"
                                                            class="form-control" />
                                                        @error('post_image')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                        <img src="" id='thumbnailImageShow' alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end row 6 --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Short Details En<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="post_short_detail_en" rows="4" cols="80">Short Details
                                                        </textarea>
                                                        @error('post_short_detail_en')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Short Details En<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="post_short_detail_vn" rows="4" cols="80" placeholder="">
                                                            Miêu tả ngắn
                                                        </textarea>
                                                        @error('post_short_detail_vn')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- row 8 --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Details En<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="post_detail_en" rows="10" cols="80">
                                            Long Details
                                                        </textarea>
                                                        @error('post_detail_en')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Details Vn<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" name="post_detail_vn" rows="10" cols="80">
                                            Chi tiết bài viết
                                        </textarea>
                                                        @error('post_detail_vn')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end row 8 --}}
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Post" />
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
        let thumbnailImage = document.querySelector('#thumbnailImage');
        thumbnailImage.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let thumbnailImageShow = document.querySelector('#thumbnailImageShow');
                    thumbnailImageShow.setAttribute('src', e.target.result);
                    thumbnailImageShow.style.width = '80px';
                    thumbnailImageShow.style.height = '80px';
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>
@endsection
