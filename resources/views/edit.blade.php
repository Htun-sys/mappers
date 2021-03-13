@extends("layout")
@section("content")
<br>
<h4>Edit an entry from the database</h4>
<br>

<form method="POST" action="/update" enctype="multipart/form-data">
	@csrf
  <div class="form-group">
    <label>Name</label>
    <input type="hidden"
    name="id" value="{{$data->id}}">

    <input type="text" class="form-control"placeholder="Enter Name"
    name="name" value="{{$data->name}}" required>
    <small class="form-text text-muted">Rest in peace, heroes of our nation, we will never forget them</small>
  </div>

  <div class="form-group">
    <label>Location</label>
    <input type="text" class="form-control"placeholder="Enter Location"
    name="location" value="{{$data->location}}" required>
  </div>

  <div class="form-group">
    <label>Division Code</label>
    <br>
    <select name="division_code" class="division_code" id="{{$data->division_code}}">
      <!-- <option value="YGN">Yangon</option>
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
      <option value="CHN">Chin</option> -->
    </select>
  </div>

  <div class="form-group">
    <label>Date</label>
    <input type="date" class="form-control"
    name="date" value="{{$data->date}}" required>
  </div>

  <div class="form-group">
    <label>Age</label>
    <input type="string" class="form-control"
    name="age" value="{{$data->age}}" required>
  </div>

  <div class="form-group">
    <label>Cause of death (Optional)</label>
    <input type="text" value="{{$data->cod}}" class="form-control"
    name="cod">
  </div>

  <div class="form-group">
    <label>Description (Optional)</label>
    <input type="text" class="form-control"
    name="desc" value="{{$data->desc}}">
  </div>

  <div class="form-group">
    <label>Image, grayscale preferred 
    (Optional)</label><br>
    <input type="file" name="image">
    <input type="hidden" name="orig_image_name" value="{{$data->image}}"><br>
    @if($data->image !== "image/default.png")
    <small>Custom Image Already Present</small>
    @endif
  </div>


  <hr>
  <button type="submit" class="btn btn-primary">Edit entry</button>
</form>
<br>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function() {
    addSelectOnEdit();
  });
  function addSelectOnEdit() {
        var division_code = $(".division_code").attr('id');
        division_code = division_code.trim();
        console.log(division_code);
        const division = {
         "YGN":"Yangon",
        "MDY":"Mandalay",
      "SHN":"Shan State",
      "SGG":"Sagaing",
      "AYY":"Ayeyarwady",
      "BGO":"Bago",
      "NPW":"Naypyidaw",
      "TNI":"Tanintharyi",
      "MON":"Mon",
      "RKE":"Rakhine",
      "KCN":"Kachin",
      "KYH":"Kayah",
      "KYN":"Kayin",
      "MGY":"Magway",
      "CHN":"Chin"
        };

        for (const prop in division) {
          if (prop == division_code) {
            $("select.division_code").append($("<option>", 
            {"selected":"selected", 
            "value":division_code
            }).text(division[prop]));
          } else {
            $("select.division_code").append($("<option>", 
            {"value":prop}).text(division[prop]));
          }

        }
      }
</script>
@endsection