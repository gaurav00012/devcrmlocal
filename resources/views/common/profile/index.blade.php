@extends('layouts.admin.main')

@section('content')
<form method="post" action="{{url('profile')}}" enctype="multipart/form-data">
	@csrf
	<div class="text-center">
	<?php 
		$profile = Auth::user()->profile_picture == '' ? 'images/user-profile/user-avatar.png' : 'user-profile/'. Auth::user()->profile_picture ;
	?>
  <img src="{{url(Auth::user()->profile_picture == '' ? 'images/user-profile/user-avatar.png' : 'user-profile/'. Auth::user()->profile_picture)}}" class="rounded" alt="..." width="200" height="200">
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="user_name" name="user_name" value="{{ Auth::user()->name }}" disabled="disabled">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="user_email" name="user_email" aria-describedby="emailHelp" value="{{ Auth::user()->email }}" disabled="disabled">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="user_image">Upload Profile Image</label>
    <input type="file" class="form-control-file" name="user_image" id="user_image">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection