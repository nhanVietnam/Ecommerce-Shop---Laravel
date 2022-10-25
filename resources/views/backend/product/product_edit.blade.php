@extends('admin.admin_master')

@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Product </h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('product-update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $products->id }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control" aria-invalid="false">
                                                            <option value="" disabled>Select Brand</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}"
                                                                    {{ $brand->id == $products->brand_id ? 'selected' : '' }}>
                                                                    {{ $brand->brand_name_vn }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" selected disabled>Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ $category->id == $products->category_id ? 'selected' : '' }}>
                                                                    {{ $category->category_name_vn }}</option>
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
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" selected disabled>Select SubCategory</option>
                                                            @foreach ($subcategories as $subcategory)
                                                                <option value="{{ $subcategory->id }}"
                                                                    {{ $subcategory->id == $products->subcategory_id ? 'selected' : '' }}>
                                                                    {{ $subcategory->subcategory_name_vn }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('subcategory_id')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- row 2 --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Sub-SubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" disabled>Select Sub-SubCategory</option>
                                                            @foreach ($subsubcategories as $subsubcategory)
                                                                <option value="{{ $subsubcategory->id }}"
                                                                    {{ $subsubcategory->id == $products->subsubcategory_id ? 'selected' : '' }}>
                                                                    {{ $subsubcategory->subsubcategory_name_vn }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('subsubsubcategory_id')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required type="text" name="product_name_en"
                                                            class="form-control"
                                                            value="{{ $products->product_name_en }}">
                                                        @error('product_name_en')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name Vn <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required type="text"
                                                            value="{{ $products->product_name_vn }}"
                                                            name="product_name_vn" class="form-control">
                                                        @error('product_name_vn')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- row 3 --}}

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required type="text" value="{{ $products->product_code }}"
                                                            name="product_code" class="form-control">
                                                        @error('product_code')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required type="text"
                                                            value="{{ $products->product_quantity }}"
                                                            name="product_quantity" class="form-control">
                                                        @error('product_quantity')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required type="text"
                                                            value="{{ $products->product_tag_en }}" name="product_tag_en"
                                                            value="Lorem,Ipsum,Amet" data-role="tagsinput" />
                                                        @error('product_tag_en')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end row 3 --}}
                                            {{-- row 4 --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags Vn <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required type="text"
                                                            value="{{ $products->product_tag_vn }}" name="product_tag_vn"
                                                            data-role="tagsinput" />
                                                        @error('product_tag_vn')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $products->product_size_en }}"
                                                            name="product_size_en" data-role="tagsinput" />
                                                        @error('product_size_en')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size Vn <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $products->product_size_vn }}"
                                                            name="product_size_vn" data-role="tagsinput" />
                                                        @error('product_size_vn')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end row 4 --}}
                                            {{-- row 5 --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Color En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required type="text" name="product_color_en"
                                                            value="{{ $products->product_color_en }}"
                                                            data-role="tagsinput" />
                                                        @error('product_color_en')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Color Vn <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required type="text" name="product_color_vn"
                                                            value="{{ $products->product_color_vn }}"
                                                            data-role="tagsinput" />
                                                        @error('product_color_vn')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end row 5 --}}
                                            {{-- row 6 --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input required value="{{ $products->selling_price }}"
                                                            type="text" pattern="\d*" name="selling_price"
                                                            class="form-control currency"
                                                            oninvalid="this.setCustomValidity('Vui lòng nhập số')">
                                                        @error('selling_price')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" pattern="\d*"
                                                            value="{{ $products->discount_price }}" name="discount_price"
                                                            class="form-control currency"
                                                            oninvalid="this.setCustomValidity('Vui lòng nhập số')" />
                                                        @error('discount_price')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                            {{-- end row 6 --}}
                                            {{-- row 7 --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description En<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_description_en" id="textarea" class="form-control" placeholder="Textarea text">
                                            {!! $products->short_description_en !!}
                                        </textarea>
                                                        @error('short_description_en')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description Vn<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_description_vn" id="textarea" class="form-control" placeholder="Textarea text">
                                            {!! $products->short_description_vn !!}
                                        </textarea>
                                                        @error('short_description_vn')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end row 7 --}}
                                            {{-- row 8 --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description En<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="long_description_en" rows="10" cols="80">
                                            {!! $products->long_description_en !!}
                                        </textarea>
                                                        @error('long_description_en')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description Vn<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" name="long_description_vn" rows="10" cols="80">
                                            {!! $products->short_description_vn !!}
                                        </textarea>
                                                        @error('long_description_vn')
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox"
                                                        {{ $products->hot_deals == 1 ? 'checked' : '' }} id="checkbox_2"
                                                        name="hot_deals" value="1" />
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox"
                                                        {{ $products->featured == 1 ? 'checked' : '' }} id="checkbox_3"
                                                        name="featured" value="1" />
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox"
                                                        {{ $products->special_offer == 1 ? 'checked' : '' }}
                                                        id="checkbox_4" name="special_offer" value="1" />
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox"
                                                        {{ $products->special_deal == 1 ? 'checked' : '' }}
                                                        id="checkbox_5" name="special_deal" value="1" />
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product" />
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
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                        </div>

                        <form action="{{ route('update-product-image') }}" method="post" enctype="multipart/form-data"
                            class="box-body">
                            @csrf
                            <div class="row row-sm">
                                @foreach ($multiImgs as $image)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{ asset($image->photo_name) }}" class="card-img-top"
                                                style="height: 130px; width: 280px" alt="">
                                            <div class="card-body">
                                                <h5 class="card-title"><a
                                                        href="{{ route('product.multilimage.delete', $image->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i
                                                            class="fa fa-trash"></i></a></h5>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-lable">Change Image <span
                                                            class="tx-danger">*</span></label>
                                                    <input class="form-control" type="file"
                                                        name="multi_image[{{ $image->id }}]">
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        {{-- start thumbnail update --}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
                        </div>

                        <form action="{{ route('update-product-thumbnail') }}" method="post"
                            enctype="multipart/form-data" class="box-body">
                            @csrf
                            <input type="hidden" name="id" value="{{ $products->id }}">
                            <input type="hidden" name="old_img" value="{{ $products->product_thumbnail }}">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset($products->product_thumbnail) }}" class="card-img-top"
                                            style="height: 130px; width: 280px" alt="">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-lable">Change Image <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="file" name="product_thumbnail"
                                                    id="thumbnailImage">
                                                <img src="" id="thumbnailImageShow">
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('add-script')
    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').empty();
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_vn + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


            $('select[name="subcategory_id"]').on('change', function() {
                let subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            let de = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subsubcategory_name_vn + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });

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

        let multipleImage = document.querySelector('#multipleImage');
        multipleImage.addEventListener('change', function(e) {

            if (window.File && window.FileReader && window.FileList && window.Blob) {
                let data = e.target.files;
                console.log(data);
                Array.prototype.forEach.call(data, function(file, index) {
                    let myfiles = file.name;
                    console.log(myfiles);
                    let ext = myfiles.split('.').pop();
                    console.log(ext);
                    if (ext == "jpeg" || ext == "jpg" || ext == "png" || ext == "gif" || ext == "webp") {
                        let reader1 = new FileReader();
                        reader1.onload = (function(file) {
                            return function(e) {
                                console.log(e.target.result);
                                let img = document.createElement("img");
                                img.classList.add("thumb");
                                img.setAttribute('src', e.target.result);
                                img.style.width = '80px';
                                img.style.height = '80px';
                                let multipleImageShow = document.querySelector(
                                    '#multipleImageShow');
                                multipleImageShow.appendChild(img);
                            };
                        })(file);
                        reader1.readAsDataURL(e.target.files[index]);
                    }
                });
            };
        });
    </script>
@endsection
