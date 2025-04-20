@extends('frontend.layouts.base')

@section('title', 'Govt. Office')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Govt. Office</h2>
	</div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
	<div class="container">

		<div class="row justify-content-center mb-5">
			<div class="col-lg-10">
				<!-- filter form -->
				<div class="filter mb-4">

					<form action="{{ route('govt_office.search')}}" method="post">
						@csrf
						@method('GET')
						<div class="row g-2">
							<div class="col-lg-2">
								<select name="district_id" id="district_id" class="form-control">
									<option value="">All Bangladesh</option>
									@foreach($districts as $district)
									<option value="{{ $district->id }}">{{ $district->name }}</option>
									@endforeach
								</select>
							</div>

							<div class="col-lg-2">
								<select name="city_id" id="city_id" class="form-control">
									<option value="" disabled selected>Select City</option>
								</select>
							</div>

							<div class="col-lg-6">
								<input type="text" name="search" class="form-control" placeholder="search here....">
							</div>

							<div class="col-lg-2">
								<button class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


		<div class="row g-3">
			@if($govt_offices->count() > 0)
			@foreach($govt_offices as $govt_office)
			<div class="col-lg-3">
				<div class="h-100 card text-center">
					<div class="info">
						<h5>{{ $govt_office->name }}</h5>
					</div>
					<div class="phone">
						<p>{{ $govt_office->phone }}</p>
						<p>{{ $govt_office->address }}</p>
						<p>
							@if($govt_office->city)
							{{ $govt_office->city['name'] }},
							@endif
							@if($govt_office->district)
							{{ $govt_office->district['name'] }}
							@endif
						</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $govt_office->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Govt Office Found!</h4>
				</div>
			</div>
			@endif
		</div>

		<div class="mt-30">
			{{ $govt_offices->links() }}
		</div>

	</div>
</div>
<!-- newspaper section end -->

@endsection


@section('scripts')
<script>
	$('#district_id').change(function() {
		$('#city_id').html('');
		var id = $(this).val();
		$.ajax({
			url: "/get-city-option/" + id,
			dataType: "json",
			success: function(data) {
				$('#city_id').append(data.data);
			}
		})
	})
</script>
@endsection