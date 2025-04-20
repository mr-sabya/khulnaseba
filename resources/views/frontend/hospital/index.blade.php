@extends('frontend.layouts.base')

@section('title', 'Hospitals')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Hospitals</h2>
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

					<form action="{{ route('hospital.search')}}" method="post">
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
			@if($hospitals->count()>0)
			@foreach($hospitals as $hospital)
			<div class="col-lg-4">
				<div class="hospital card text-center h-100">
					<div class="info">
						<h5>{{ $hospital->name }}</h5>
						@if($hospital->category)
						<h6 class="badge bg-primary">{{ $hospital->category['name'] }}</h6>
						@endif
					</div>
					<div class="phone">
						<p>{{ $hospital->phone }}</p>
						<p>{{ $hospital->address }}</p>
						<p>
							@if($hospital->city)
							{{ $hospital->city['name'] }},
							@endif
							@if($hospital->district)
							{{ $hospital->district['name'] }}
							@endif
						</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $hospital->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Hospitals Found!</h4>
				</div>
			</div>
			@endif

		</div>

		<div class="mt-30">
			{{ $hospitals->links() }}
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