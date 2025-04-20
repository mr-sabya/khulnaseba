@extends('frontend.layouts.base')

@section('title', 'Volunteer')

@section('content')
<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Volunteer - Result</h2>
	</div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
	<div class="container ">

		<div class="filter mb-4">
			<a class="mb-3" href="{{ route('volunteer.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
		</div>
	

		<div class="row g-3">
			@if($volunteers->count()>0)
			@foreach($volunteers as $volunteer)
			<div class="col-lg-3">
				<div class="card text-center h-100">
					<div class="info">
						<div class="image mb-3">
							<img src="{{ url('images/volunteer', $volunteer->image)}}" alt="" style="border-radius: 50%; overflow: hidden; border: 1px solid #000; width: 150px;">
						</div>
						<h5>{{ $volunteer->name }}</h5>
						<p>Blood Group : <span class="badge bg-success">{{ $volunteer->bloodGroup['name'] }}</span></p>
					</div>
					<div class="phone">
						<p>{{ $volunteer->phone }}</p>
						<p>{{ $volunteer->address }}</p>
						<p>
							@if($volunteer->city)
							{{ $volunteer->city['name'] }},
							@endif
							@if($volunteer->district)
							{{ $volunteer->district['name'] }}
							@endif
						</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $volunteer->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Volunteers Found!</h4>
				</div>
			</div>
			@endif
		</div>

		<div class="mt-30">
			{{ $volunteers->links() }}
		</div>

	</div>
</div>
<!-- newspaper section end -->




@endsection