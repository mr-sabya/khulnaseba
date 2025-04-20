@extends('frontend.layouts.base')

@section('title', 'Blood Donors')

@section('content')
<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Blood Donors</h2>
	</div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
	<div class="container ">

		<div class="row justify-content-center mb-5">
			<div class="col-lg-10">
				
				<div class="filter">
					<form action="{{ route('blood-donor.search')}}" method="post">
						@csrf
						@method('GET')
						<div class="row g-2">
							<div class="col-lg-2 d-flex align-items-center">
								<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#locationModal" class="btn btn-primary w-100">
									<i class="fa-solid fa-location-dot"></i>
									<span id="location">All Bangladesh</span>
								</a>
								<input type="hidden" name="city_id" id="city_id">
							</div>
							<div class="col-lg-2">
								<select name="blood_id" id="blood_id" class="form-control">
									<option value="">All Blood Groups</option>
									@foreach($bloods as $blood)
									<option value="{{ $blood->id }}">{{ $blood->name }}</option>
									@endforeach
								</select>
							</div>


							<div class="col-lg-6">
								<input type="text" name="search" class="form-control" placeholder="search here....">
							</div>
							<div class="col-lg-2">
								<button class="btn w-100 form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
		<!-- filter form -->


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
					<h4>No Dobors Found!</h4>
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


<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Select Location</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row g-4">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="Select District"></label>
							<select name="" id="district" class="form-control">
								<option value="0" selected>All District</option>
								@foreach($districts as $district)
								<option value="{{ $district->id }}">{{ $district->name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-lg-12">
						<h5>Cities: </h5>
						<div class="row" id="city_div">


						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>

@endsection

@section('scripts')
<script>
	$('#district').change(function() {
		var id = $(this).val();

		if (id == 0) {
			$('#location').html("All Bangladesh");
			$('#locationModal').modal('hide');
		} else {
			$.ajax({
				url: "/get-city/" + id,
				dataType: "json",
				success: function(data) {
					$('#city_div').html(data.data);
				}
			})
		}


	})


	$(document).on('click', '.city', function() {
		var name = $(this).attr('data-value');
		var id = $(this).attr('data-id');

		$('#location').html(name);
		$('#city_id').val(id);

		$('#locationModal').modal('hide');
	});
</script>
@endsection