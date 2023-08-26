@extends('frontend.layouts.base')

@section('title', 'Police Station')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Police Station</h2>
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
						<button class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
					</div>
				</div>
			</form>
		</div>


		<div class="row g-3">
			@foreach($thanas as $thana)
			<div class="col-lg-3">
				<div class="hospital card text-center h-100">
					<div class="info">
						<h5>{{ $thana->name }}</h5>
					</div>
					<div class="phone">
						<p>{{ $thana->phone }}</p>
						<p>{{ $thana->address }}, @if($thana->district){{ $thana->district['name'] }}@endif</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="{{ route('thana.show', $thana->id) }}"><i class="fa-solid fa-handcuffs"></i> Police</a>
						<a class="call-btn" href="tel:{{ $thana->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="mt-30">
			{{ $thanas->links() }}
		</div>

	</div>
</div>
<!-- content section end -->

@endsection