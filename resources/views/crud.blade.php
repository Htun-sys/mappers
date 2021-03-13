@extends("layout")
@section("content")
<br>
<h4>List of victims of military regime in Myanmar 2021 Feb-Mar</h4>

<section>
	<p>ကျဆုံးလေပြီးသော သူရဲကောင်း စုစုပေါင်း အရေအတွက် {{$count}} ဦး ရှိပြီဖြစ်ပါသည်</p>
<a href="/add" class="btn btn-primary">Add a new entry</a>
</section>

@if(Session::get("status"))
<br>
<div class="alert alert-{{Session::get('type')}} alert-dismissible fade show" role="alert">
  {{Session::get("status")}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{Session::forget("status")}}
  {{Session::forget("type")}}
</div>
@endif
<br>
<div class="d-flex justify-content-center">
       {!! $data->links() !!}
</div>
<br>
<div class="row">
@foreach($data as $index =>$item)
<div class="col-md-6 crud_table_wrapper">
<table class="table crud_table">
	<tr class="bg-dark text-white">
		<td>({{ (($data->currentpage()-1) * $data->perpage()) + $index + 1 }}) Name</td>
		<td>{{$item->name}}</td>
	</tr>
	<tr>
		<td>Location</td>
		<td>{{$item->location}}</td>
	</tr>
	<tr>
		<td>Division</td>
		<td>{{$item->division_code}}</td>
	</tr>
	<tr>
		<td>Date</td>
		<td>{{$item->date}}</td>
	</tr>
	<tr>
		<td>Age</td>
		<td>{{$item->age}}</td>
	</tr>
	<tr>
		<td>Cause of Death</td>
		<td>{{$item->cod}}</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>{{$item->desc}}</td>
	</tr>
	<tr>
		<td>Image Name</td>
		@if($item->image!=="images/default.png")
		<td class="image_name">Image Present</td>
		@else
		<td class="image_name">{{$item->image}}</td>
		@endif
	</tr>
	<tr>
		<td></td>
		<td><a href="/edit/{{$item->id}}" class="btn btn-primary">Edit</a>
			<a href="/delete/{{$item->id}}" class="btn btn-warning" onclick=
				"return confirm('Are you sure?')">Delete</a></td>
	</tr>
</table>
</div>
@endforeach
</div>
<div class="d-flex justify-content-center">
       {!! $data->links() !!}
</div>
@endsection