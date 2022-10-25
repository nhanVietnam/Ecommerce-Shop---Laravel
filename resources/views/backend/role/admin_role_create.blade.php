@extends('admin.admin_master')

@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Create Admin User</h4>
             
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Admin User Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required="" data-validation-red-message="This field is required"> <div class="help-block"></div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Admin Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" required class="form-control" > <div class="help-block"></div></div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Admin User phone <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="phone" required class="form-control"> <div class="help-block"></div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Admin Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" required class="form-control"> <div class="help-block"></div></div>
                                        </div>
                                    </div>    

                                </div>						
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Admin Image<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" id="image" required class="form-control" name="profile_photo_path"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img id="showImage" src="{{asset('upload/no_image.jpg')}}" style="width:100px; height:100px;" alt="User Avatar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_2" name="brand" value="1">
                                            <label for="checkbox_2">Brand</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_3" name="category" value="1">
                                            <label for="checkbox_3">Category</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_4" name="product" value="1">
                                            <label for="checkbox_4">Product</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_5" name="slider" value="1">
                                            <label for="checkbox_5">Slider</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_6" name="coupons" value="1">
                                            <label for="checkbox_6">Coupons</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_11" name="setting" value="1">
                                                <label for="checkbox_11">Setting</label>
                                            </fieldset>
                                            <input type="checkbox" id="checkbox_7" name="shipping" value="1">
                                            <label for="checkbox_7">Shipping</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_8" name="blog" value="1">
                                            <label for="checkbox_8">Blog</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_9" name="returnorder" value="1">
                                            <label for="checkbox_9">Return Order</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_10" name="review" value="1">
                                            <label for="checkbox_10">Review</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_12" name="orders" value="1">
                                            <label for="checkbox_12">Orders</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_13" name="stock" value="1">
                                            <label for="checkbox_13">Stock</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_14" name="reports" value="1">
                                            <label for="checkbox_14">Reports</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_15" name="alluser" value="1">
                                            <label for="checkbox_15">All User</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_16" name="adminuserrole" value="1">
                                            <label for="checkbox_16">Admin User Role</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Admin User"></input>
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
      document.querySelector('#image').addEventListener('change',function(e){
        let reader = new FileReader();
        reader.onload = function(e){
            document.querySelector('#showImage').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
  </script>

  @endsection