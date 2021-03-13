@extends("layout")
@section("content")

<style type="text/css">
	.card {
		min-height: 100%;
	}
	a.link-item {
		text-decoration: none;
	}
	.card:hover {
		box-shadow: 3px 3px #7e7e7e;
	}


	@media (min-width: 576px) {
		img.card-img-top {
		max-width: 100%;
		height: 250px;
		}
	}

	@media (min-width: 768px) {
		img.card-img-top {
		max-width: 100%;
		height: 200px;
		}
	}

	@media (min-width: 992px) {
		img.card-img-top {
		max-width: 100%;
		height: 140px;
		}
	}

	@media (min-width: 1200px) {
		img.card-img-top {
		max-width: 100%;
		height: 160px;
		}
	}
</style>

<header>
	<br>
	<h3 class="text-center">ကမ္ဘာမကြေဘူး..</h3>
<p class="text-center"><small>အာဏာသိမ်း စစ်ကောင်စီ၏ အကြမ်းဖက်တိုက်ခိုက်မှုကြောင့် ကျဆုံးလေပြီးသော သူရဲကောင်း အရေအတွက် စုစုပေါင်း {{$count}} ဦး ရှိပြီဖြစ်ပါသည် (last updated: 11th March)</small></p>
<h1>
<img src="{{ asset('/images/thumbnail.png')
	}}" class="d-none">
</h1>
</header>

<div class="row m-2">
@foreach($data as $item)
<div class="col-md-6 col-lg-3 p-2">
	<a href="/detail/{{$item->id}}" class="link-item">
	<div class="card">

		<!-- <div class="image_wrapper"> -->
	  <img class="card-img-top" src="{{'https://nway-oo.s3-ap-southeast-1.amazonaws.com/'.$item->image}}" alt="Card image">
		<!-- </div> -->

	  <div class="card-body bg-dark">
    <h5 class="card-text text-white">{{$item->name}}</h5>
	    <p class="text-white">
	    	<span>
	    	<i class="fa fa-location-arrow" aria-hidden="true"></i></span> {{$item->location}}</p>
	  </div>
	</div>
	</a>
</div>

@endforeach
</div>

<div class="d-flex justify-content-center">
       {!! $data->links() !!}
</div>

<p class="text-center"><small>မှတ်ချက် - အချက်အလက် အတည်မပြုနိုင်သော ကျဆုံးသူများလည်း ရှိနေနိုင်ပါသည်။ စာရင်းအား DVB TV News မှကိုးကားဖော်ပြပါသည်။</small></p>

@endsection