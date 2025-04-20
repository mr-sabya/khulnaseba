@extends('frontend.layouts.base')

@section('title', 'Lawyer')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Lawyer</h2>
	</div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
	<div class="container">

    <div class="filter mb-4">
            <a class="mb-3" href="{{ route('lawyer.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>

		<div class="row g-3">
			@if($lawyers->count()>0)
			@foreach($lawyers as $lawyer)
			<div class="col-lg-3">
				<div class="hospital card text-center">
					<div class="info">
						<h5>{{ $lawyer->name }}</h5>
					</div>
					<div class="phone">
						<p>{{ $lawyer->phone }}</p>
						<p>
							@if($lawyer->city)
							{{ $lawyer->city['name'] }},
							@endif
							@if($lawyer->district)
							{{ $lawyer->district['name'] }}
							@endif
						</p>
						<p><strong>Department :</strong> {{ $lawyer->department['name'] }}</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $lawyer->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Lawyer Found!</h4>
				</div>
			</div>
			@endif
		</div>

		<div class="mt-30">
			{{ $lawyers->links() }}
		</div>

	</div>
</div>
<!-- newspaper section end -->

@endsection
