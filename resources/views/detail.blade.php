@extends("layout")
@section("content")
<style type="text/css">
@media (min-width: 576px) {
	.card {
		width: 80%;
		line-height: 1rem;
	}
}
@media (min-width: 992px) {
	.card {
		width: 60%;
	}
}
</style>

<br>
<div class="card">
	  <img class="card-img-top" src="{{'https://nway-oo.s3-ap-southeast-1.amazonaws.com/'.$data->image}}" alt="Card image">
	  <div class="card-body bg-dark">
    	<table class="table text-white">
    		<tr>
    			<td>အမည်</td>
    			<td><h5 class="card-text text-white">{{$data->name}}</h5></td>
    		</tr>
    		<tr>
    			<td>ကျဆုံးသည့်နေရာ</td>
    			<td><p class="text-white">
	    	<span>
	    	<i class="fa fa-location-arrow" aria-hidden="true"></i></span> {{$data->location}}</p></td>
    		</tr>
    		<tr>
    			<td>ကျဆုံးသည့် ရက်စွဲ</td>
    			<td><p class="text-white">{{$data->date}}</p></td>
    		</tr>
    		<tr>
    			<td>တိုင်းဒေသကြီး</td>
    			<td><p class="text-white">{{$data->division_code}}</p></td>
    		</tr>
    		<tr>
    			<td>အသက်</td>
    			<td><p class="text-white">{{$data->age}}</p></td>
    		</tr>
    		<tr>
    			<td>ကျဆုံးရသည့် အကြောင်းအရင်း</td>
    			<td><p class="text-white">{{$data->cod}}</p></td>
    		</tr>
    		<tr>
    			<td>အခြားဖော်ပြချက်</td>
    			<td><p class="text-white">{{$data->desc}}</p></td>
    		</tr>
    	</table>
    	<a href="/"><button class="btn btn-light">
    		Back to Home
    	</button></a>
    	
	    
	    
	   	
	  
	   
	  </div>
</div>


@endsection