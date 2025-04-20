@extends('frontend.layouts.base')

@section('title', 'Hospitals')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Hospitals - Search Result</h2>
	</div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
	<div class="container">

		<!-- filter form -->
		<div class="filter mb-4">
			<a class="mb-3" href="{{ route('hospital.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
		</div>

		<div class="row g-3">
			@if($hospitals->count()>0)
			@foreach($hospitals as $hospital)
			<div class="col-lg-4">
				<div class="hospital card text-center h-100">
					<div class="info">
						<h5>{{ $hospital->name }}</h5>
						@if($hospital->category)
						<h6 class="badge bg-primary">{{ $hospital->category['name'] }}</h6>
						@endif
					</div>
					<div class="phone">
						<p>{{ $hospital->phone }}</p>
						<p>{{ $hospital->address }}</p>
						<p>
							@if($hospital->city)
							{{ $hospital->city['name'] }},
							@endif
							@if($hospital->district)
							{{ $hospital->district['name'] }}
							@endif
						</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $hospital->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Hospitals Found!</h4>
				</div>
			</div>
			@endif

		</div>

		<div class="mt-30">
			{{ $hospitals->links() }}
		</div>
	</div>
</div>
<!-- newspaper section end -->

@endsection