@extends('frontend.layouts.base')

@section('title', 'Train Tickets')

@section('content')
<!-- hero section start -->

<div class="header">
	<div class="container">
		<!-- <a href="{{ url()->previous() }}" ><i class="fa-solid fa-arrow-left"></i> Go Back</a> -->
		<h2>Train Tickets</h2>
	</div>
</div>


<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
	<div class="container ">


		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="card">
					<!-- filter form -->
					<div class="filter">
						<form action="{{ route('train.search') }}" method="post">
							@csrf
							<div class="row g-3">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="route_id">Select Route</label>
										<select name="route_id" id="route_id" class="form-control">
											<option value="" selected disabled>-- pic a route --</option>
											@foreach($routes as $route)
											<option value="{{ $route->id }}">{{ $route->name }}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for="class_id">Select Class</label>
										<select name="class_id" id="class_id" class="form-control">
											<option value="" selected disabled>-- pic a class --</option>
											@foreach($train_classes as $type)
											<option value="{{ $type->id }}">{{ $type->name }}</option>
											@endforeach
										</select>
									</div>
								</div>

							</div>
							<button class="btn form-btn custom-btn mt-4"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
						</form>
					</div>
				</div>
			</div>
		</div>


		<div class="row mt-5">
			<div class="col-lg-12">
				<h5>Available Train Routes</h5>
				<hr>
				<div class="row g-3">
					@foreach($routes as $route)
					<div class="col-lg-3">
						<p> <i class="fa-solid fa-location-dot"></i> {{ $route->name }}</p>
					</div>
					@endforeach
				</div>
			</div>
		</div>


		<div class="row mt-5">
			<div class="col-lg-12">
				<h5>Available Trains</h5>
				<hr>
				<div class="row g-3">
					@foreach($trains as $train)
					<div class="col-lg-3">
						<div class="card p-3">
							<h5 class="text-center mt-2">{{ $train->name }}</h5>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>


	</div>
</div>
<!-- newspaper section end -->

@endsection