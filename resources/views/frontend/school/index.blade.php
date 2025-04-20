@extends('frontend.layouts.base')

@section('title', 'Educational Institute')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Educational Institute - Search Result</h2>
	</div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
	<div class="container">

		<div class="row justify-content-center mb-5">
			<div class="col-lg-10">

				<div class="filter">
					<form action="{{ route('school.search')}}" method="post">
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
								<select name="category_id" id="category_id" class="form-control">
									<option value="">All Types</option>
									@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
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


		<div class="row g-3">
			@if($schools->count() > 0)
			@foreach($schools as $school)
			<div class="col-lg-3">
				<div class="h-100 card text-center">
					<div class="info">
						<h5 class="m-0">{{ $school->name }}</h5>
						<p class="badge bg-primary">{{ $school->category['name'] }}</p>
					</div>
					<div class="phone">
						<p class="mt-3"><strong>Contact :</strong> {{ $school->phone }}</p>
						<p><strong>Address :</strong> <br>{{ $school->address }}</p>
						<p>
							@if($school->city)
							{{ $school->city['name'] }},
							@endif
							@if($school->district)
							{{ $school->district['name'] }}
							@endif
						</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $school->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Institute Found!</h4>
				</div>
			</div>
			@endif
		</div>

		<div class="mt-30">
			{{ $schools->links() }}
		</div>

	</div>
</div>
<!-- content section end -->

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