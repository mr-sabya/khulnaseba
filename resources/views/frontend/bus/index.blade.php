@extends('frontend.layouts.base')

@section('title', 'Bus Tickets')

@section('content')
<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Bus Tickets</h2>
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
						<form action="{{ route('bus.search') }}" method="post">
							@csrf
							<div class="row g-3">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="route_id">Select Route</label>
										<select name="route_id" id="route_id" class="form-control" required>
											<option value="">-- All route --</option>
											@foreach($routes as $route)
											<option value="{{ $route->id }}">{{ $route->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="bus_id">Select Bus</label>
										<select name="bus_id" id="bus_id" class="form-control" required>
											<option value="" selected disabled>-- pic a bus --</option>
											
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
				<h5>Available Bus Routes</h5>
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
				<h5>Available Bus Providers</h5>
				<hr>
				<div class="row g-3">
					@foreach($buses as $bus)
					<div class="col-lg-3">
						<div class="card p-3">
							<img src="{{ url('images/bus', $bus->image) }}" alt="">
							<h5 class="text-center mt-2">{{ $bus->name }}</h5>
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

@section('scripts')
<script>
	$('#route_id').change(function() {
	    $('#bus_id').html('');
		var id = $(this).val();
		$.ajax({
			url: "/get-bus/" + id,
			dataType: "json",
			success: function(data) {
			    $('#bus_id').append('<option value="" selected disabled>-- Select Bus -- </option>');
				$('#bus_id').append(data.data);
			}
		})
	})
</script>
@endsection