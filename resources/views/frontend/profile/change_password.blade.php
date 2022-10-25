@extends('frontend.main_master')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br />
                <img src="{{(!empty($user->profile_photo_path) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg'))}}" style="border-radius: 50%; height: 100%; width: 100%;" alt="" class="card-img-top">
                <div><br /></div>
                <ul class="list-group list-group-flush">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('dashboard')}}">Home</a>
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('user.profile')}}">Profile Update</a>
                    <a class="btn btn-primary btn-sm btn-block" href="#">Change Password</a>
                    <a class="btn btn-danger btn-sm btn-block" href="{{ route('user.logout') }}">Logout</a>
                </ul>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">Change Password</span>
                        <strong></strong>
                    </h3>
                    <div class="card-body">
                        <form action="{{ route('user.password.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="oldpassword">Current Password <span>*</span></label>
                                <input type="password" class="form-control" name="oldpassword">
                                @error('oldpassword')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label class="info-title" for="password">New Password <span>*</span></label>
                                <input type="password" class="form-control" id="password" name="password">
                                @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update </button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
