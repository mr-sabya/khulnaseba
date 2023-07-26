@extends('frontend.layouts.base')

@section('title', 'Blood Donors')

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
	<div class="container ">

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
						<select name="" id="" class="form-control">
							<option value="" disabled selected>Blood Group</option>
							@foreach($bloods as $blood)
							<option value="{{ $blood->id }}">{{ $blood->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="col-lg-2">
						<button class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
					</div>
				</div>
			</form>
		</div>

		<div class="row g-3">
			@foreach($donors as $donor)
			<div class="col-lg-3">
				<div class="card text-center">
					<div class="info">
						<h5>{{ $donor->name }}</h5>
						<p>Blood Group : <span class="badge bg-success">{{ $donor->bloodGroup['name'] }}</span></p>
					</div>
					<div class="phone">
						<p>{{ $donor->phone }}</p>
						<p>{{ $donor->address }}</p>
						<p>{{ $donor->city['name'] }}, {{ $donor->district['name'] }}</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $donor->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
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