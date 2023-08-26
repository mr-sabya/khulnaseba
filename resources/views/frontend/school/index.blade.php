@extends('frontend.layouts.base')

@section('title', 'Educational Institute')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Educational Institute</h2>
	</div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
	<div class="container">

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
			@foreach($schools as $school)
			<div class="col-lg-3">
				<div class="h-100 card text-center">
					<div class="info">
						<h5>{{ $school->name }}</h5>
					</div>
					<div class="phone">
						<p>{{ $school->phone }}</p>
						<p class="mt-3"><strong>Address :</strong> <br>{{ $school->address }}</p>
						<p>
							@if($school->city)
							{{ $school->city['name'] }},
							@endif
							@if($school->district)
							{{ $school->district['name'] }}
							@endif
						</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $school->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="mt-30">
			{{ $schools->links() }}
		</div>

	</div>
</div>
<!-- content section end -->

@endsection