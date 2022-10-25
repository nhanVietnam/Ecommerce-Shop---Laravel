@extends('admin.admin_master')

@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Admin Profile Edit</h4>
             
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{route('admin.profile.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Admin User Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required="" data-validation-required-message="This field is required" value="{{$editData->name}}"> <div class="help-block"></div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Admin Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required="" data-validation-required-message="This field is required" value="{{$editData->email}}"> <div class="help-block"></div></div>
                                        </div>
                                    </div>    

                                </div>						
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Profile Image<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" id="image" class="form-control" name="profile_photo_path"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img id="showImage" src="{{(!empty($editData->profile_photo_path) ? url('upload/admin_images/'.$editData->profile_photo_path) : url('upload/no_image.jpg'))}}" style="width:100px; height:100px;" alt="User Avatar">
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
      document.querySelector('#image').addEventListener('change',function(e){
        let reader = new FileReader();
        reader.onload = function(e){
            document.querySelector('#showImage').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
  </script>

  @endsection