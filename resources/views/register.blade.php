@extends("layout")
@section("content")
<br>
<h4>Please register your account</h4>
<br>

@if(Session::get("status"))
<div class="alert alert-{{Session::get('type')}} alert-dismissible fade show" role="alert">
  {{Session::get("status")}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{Session::forget("status")}}
  {{Session::forget("type")}}
</div>
@endif

<form method="POST" action="/register">
	@csrf
  <div class="form-group">
    <label>User Name</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Username"
    name="name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
    name="email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
    name="password" required>
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" class="form-control"placeholder="Confirm Password"
    name="confirm_password" required>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection