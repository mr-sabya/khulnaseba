@extends('frontend.layouts.base')

@section('title', 'Blood Donors')

@section('content')
<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Blood Donors - Result</h2>
	</div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
	<div class="container ">

		<div class="filter mb-4">
			<a class="mb-3" href="{{ route('blood-donor.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
		</div>
	

		<div class="row g-3">
			@if($donors->count()>0)
			@foreach($donors as $donor)
			<div class="col-lg-3">
				<div class="card text-center h-100">
					<div class="info">
						<h5>{{ $donor->name }}</h5>
						<p>Blood Group : <span class="badge bg-success">{{ $donor->bloodGroup['name'] }}</span></p>
					</div>
					<div class="phone" style="display: none">
						<p>{{ $donor->phone }}</p>
						<p>{{ $donor->address }}</p>
						<p>
							@if($donor->city)
							{{ $donor->city['name'] }},
							@endif
							@if($donor->district)
							{{ $donor->district['name'] }}
							@endif
						</p>
					</div>
					<hr>
					<div class="call-button" style="display: none">
						<a class="call-btn" href="tel:{{ $donor->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Donors Found!</h4>
				</div>
			</div>
			@endif
		</div>
		<div class="mt-30">
			{{ $donors->links() }}
		</div>

	</div>
</div>
<!-- newspaper section end -->




@endsection