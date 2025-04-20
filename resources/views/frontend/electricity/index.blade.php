@extends('frontend.layouts.base')

@section('title', 'Bidyut Office')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Bidyut Office</h2>
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

					<form action="{{ route('electricity.search')}}" method="post">
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
			@if($electricities->count() > 0)
			@foreach($electricities as $electricity)
			<div class="col-lg-3">
				<div class="h-100 card text-center">
					<div class="info">
						<h5>{{ $electricity->name }}</h5>
					</div>
					<div class="phone">
						<p>{{ $electricity->phone }}</p>
						<p>{{ $electricity->address }}</p>
						<p>
							@if($electricity->city)
							{{ $electricity->city['name'] }},
							@endif
							@if($electricity->district)
							{{ $electricity->district['name'] }}
							@endif
						</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $electricity->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Electricity Office Found!</h4>
				</div>
			</div>
			@endif
		</div>

		<div class="mt-30">
			{{ $electricities->links() }}
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