@extends("layout")
@section("content")
<br>
<h4>Add an entry to the database</h4>
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

<form method="POST" action="/add" enctype="multipart/form-data">
	@csrf
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control"placeholder="Enter Name"
    name="name" required>
    <small class="form-text text-muted">Rest in peace, heroes of our nation, we will never forget them</small>
  </div>

  <div class="form-group">
    <label>Location</label>
    <input type="text" class="form-control"placeholder="Enter Location"
    name="location" required>
  </div>

  <div class="form-group">
    <label>Division Code</label>
    <br>
    <select name="division_code">
      <option value="YGN">Yangon</option>
      <option value="MDY">Mandalay</option>
      <option value="SHN">Shan State</option>
      <option value="SGG">Sagaing</option>
      <option value="AYY">Ayeyarwady</option>
      <option value="BGO">Bago</option>
      <option value="NPW">Naypyidaw</option>
      <option value="TNI">Tanintharyi</option>
      <option value="MON">Mon</option>
      <option value="RKE">Rakhine</option>
      <option value="KCN">Kachin</option>
      <option value="KYH">Kayah</option>
      <option value="KYN">Kayin</option>
      <option value="MGY">Magway</option>
      <option value="CHN">Chin</option>
    </select>
  </div>

  <div class="form-group">
    <label>Date</label>
    <input type="date" class="form-control"
    name="date" required>
  </div>

  <div class="form-group">
    <label>Age</label>
    <input type="string" class="form-control"
    name="age" required>
  </div>

  <div class="form-group">
    <label>Cause of death (Optional)</label>
    <input type="text" class="form-control"
    name="cod">
  </div>

  <div class="form-group">
    <label>Description (Optional)</label>
    <input type="text" class="form-control"
    name="desc">
  </div>

  <div class="form-group">
    <label>Image, grayscale preferred 
    (Optional)</label><br>
    <input type="file" name="image">
  </div>


  <hr>
  <button type="submit" class="btn btn-primary">Add an entry</button>
</form>
<br>
@endsection