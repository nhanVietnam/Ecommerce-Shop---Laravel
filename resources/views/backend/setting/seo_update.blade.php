@extends('admin.admin_master')

@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Seo Setting Page</h4>
             
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col-12">
                   <form action="{{route('update.seosetting')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$seo->id}}" name="id">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Meta Title <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_title" value="{{$seo->meta_title}}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Author <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_author" class="form-control" value="{{$seo->meta_author}}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Keyword <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_keyword" value="{{$seo->meta_keyword}}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Description <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="meta_description" cols="5" rows="10" class="form-control" required="" data-validation-required-message="This field is required">{{$seo->meta_description}}</textarea> <div class="help-block"></div></div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Google Analytics <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="google_analytics " class="form-control" value="{{$seo->google_analytics }}" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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