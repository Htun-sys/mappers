@extends("layout")
@section("content")
<br>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>We are unable to handle registration at the moment</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<p>Back to login page? <a href="/login">Login</a></p>
<br>


<!-- add this in low-content pages to make footer stick to bottom -->
<style>
  footer {
    position: absolute;
    bottom: 0px;
    width: 100%;
  }
</style>
@endsection