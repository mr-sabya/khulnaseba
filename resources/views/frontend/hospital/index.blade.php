@extends('frontend.layouts.base')

@section('title', 'Hospitals')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Hospitals</h2>
	</div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
	<div class="container">
		<form action="">
			<div class="filter-form">
				<select name="" id="" class="form-input">
					<option value="" selected disabled>Seclect District</option>
					@foreach($districts as $district)
					<option value="{{ $district->id }}">{{ $district->name }}</option>
					@endforeach
				</select>

				<select name="" id="" class="form-input">
					<option value="" disabled selected>Select City</option>
				</select>

				<button class="form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
			</div>
		</form>

		<div class="hospital-container">

			@foreach($hospitals as $hospital)
			<div class="hospital card">
				<div class="info">
					<h4>{{ $hospital->name }}</h4>
				</div>
				<div class="phone">
					<p>{{ $hospital->phone }}</p>
					<p>{{ $hospital->address }}</p>
					<p>{{ $hospital->city['name'] }}, {{ $hospital->district['name'] }}</p>
				</div>
				<div class="call-button">
					<a class="call-btn" href="tel:{{ $hospital->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
				</div>
			</div>
			@endforeach

		</div>
	</div>
</div>
<!-- newspaper section end -->

@endsection