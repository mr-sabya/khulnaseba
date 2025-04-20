@extends('frontend.layouts.base')

@section('title', 'Training Centers')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Training Centers</h2>
	</div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
	<div class="container">

    <div class="filter mb-4">
            <a class="mb-3" href="{{ route('training_centers.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>


		<div class="row g-3">
			@if($training_centers->count() > 0)
			@foreach($training_centers as $training_center)
			<div class="col-lg-3">
				<div class="h-100 card text-center">
					<div class="info">
						<h5>{{ $training_center->name }}</h5>
					</div>
					<div class="phone">
						<p>{{ $training_center->phone }}</p>
						<p>
							@if($training_center->city)
							{{ $training_center->city['name'] }},
							@endif
							@if($training_center->district)
							{{ $training_center->district['name'] }}
							@endif
						</p>
						<p class="mt-3"><strong>Topics :</strong> <br>{{ $training_center->topic }}</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $training_center->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Training Center Found!</h4>
                </div>
            </div>
            @endif
		</div>

		<div class="mt-30">
			{{ $training_centers->links() }}
		</div>

	</div>
</div>
<!-- content section end -->

@endsection
