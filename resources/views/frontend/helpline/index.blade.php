@extends('frontend.layouts.base')

@section('title', 'Help Lines')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Help Lines</h2>
	</div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
	<div class="container">

		<div class="row g-3">
			@foreach($helplines as $helpline)
			<div class="col-lg-3">
				<div class="hospital card text-center">
					<div class="info">
						<h5>{{ $helpline->name }}</h5>
					</div>
					<div class="phone">
						<p>{{ $helpline->phone }}</p>
						
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $helpline->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="mt-30">
			{{ $helplines->links() }}
		</div>

	</div>
</div>
<!-- content section end -->

@endsection