@extends('frontend.layouts.base')

@section('title', 'Newspapers')

@section('content')
<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Blood Donors</h2>
	</div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
	<div class="container filter">
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

				<select name="" id="" class="form-input">
					<option value="" disabled selected>Blood Group</option>
					@foreach($bloods as $blood)
					<option value="{{ $blood->id }}">{{ $blood->name }}</option>
					@endforeach
				</select>

				<button class="form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
			</div>
		</form>

		<div class="blood-container">

			@foreach($donors as $donor)
			<div class="person card">
				<div class="info">
					<h4>{{ $donor->name }}</h4>
				</div>
				<div class="phone">
					<p>{{ $donor->phone }}</p>
					<p>{{ $donor->address }}</p>
					<p>{{ $donor->city['name'] }}, {{ $donor->district['name'] }}</p>
				</div>
				<div class="call-button">
					<a class="call-btn" href="tel:{{ $donor->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
				</div>
			</div>
			@endforeach

		</div>

		<div class="mt-30">
			{{ $donors->links() }}
		</div>
	</div>
</div>
<!-- newspaper section end -->

@endsection