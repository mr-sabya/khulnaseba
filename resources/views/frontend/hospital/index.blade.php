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

		<!-- filter form -->
		<div class="filter mb-4">
			<form action="">
				<div class="row g-2">
					<div class="col-lg-2">
						<select name="" id="" class="form-control">
							<option value="" selected disabled>Seclect District</option>
							@foreach($districts as $district)
							<option value="{{ $district->id }}">{{ $district->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="col-lg-2">
						<select name="" id="" class="form-control">
							<option value="" disabled selected>Select City</option>
						</select>
					</div>


					<div class="col-lg-2">
						<button class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
					</div>
				</div>
			</form>
		</div>

		<div class="row g-3">
			@foreach($hospitals as $hospital)
			<div class="col-lg-4">
				<div class="hospital card text-center">
					<div class="info">
						<h5>{{ $hospital->name }}</h5>
					</div>
					<div class="phone">
						<p>{{ $hospital->phone }}</p>
						<p>{{ $hospital->address }}</p>
						<p>{{ $hospital->city['name'] }}, {{ $hospital->district['name'] }}</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $hospital->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach

		</div>

		<div class="mt-30">
			{{ $hospitals->links() }}
		</div>
	</div>
</div>
<!-- newspaper section end -->

@endsection