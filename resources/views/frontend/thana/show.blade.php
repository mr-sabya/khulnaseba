@extends('frontend.layouts.base')

@section('title', 'Police')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Police</h2>
	</div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
	<div class="container">

		<div class="row g-3">
			@foreach($polices as $police)
			<div class="col-lg-3">
				<div class="hospital card text-center">
					<div class="info">
						<h5>{{ $police->name }}</h5>
					</div>
					<div class="phone">
						<p>{{ $police->phone }}</p>
						<p>Designation: {{ $police->designation }}</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $police->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="mt-30">
			{{ $polices->links() }}
		</div>

	</div>
</div>
<!-- content section end -->

@endsection