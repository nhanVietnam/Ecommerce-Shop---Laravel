@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp

<div class="col-md-2">
    <br />
    <img src="{{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" style="border-radius: 50%; height: 100%; width: 100%;" alt="" class="card-img-top">
    <div><br /></div>
    <ul class="list-group list-group-flush"> 
        <a class="btn btn-primary btn-sm btn-block" href="#">Home</a>
        <a class="btn btn-primary btn-sm btn-block" href="{{route('user.profile')}}">Profile Update</a>
        <a class="btn btn-primary btn-sm btn-block" href="{{ route('change.password')}}">Change Password</a>
        <a class="btn btn-primary btn-sm btn-block" href="{{ route('my.orders')}}">Orders</a>
        <a class="btn btn-primary btn-sm btn-block" href="{{ route('return.orders.list')}}">Return Orders</a>
        <a class="btn btn-primary btn-sm btn-block" href="{{ route('cancel.orders')}}">Cancel Orders</a>
        <a class="btn btn-danger btn-sm btn-block" href="{{ route('user.logout') }}">Logout</a>
    </ul>
</div>