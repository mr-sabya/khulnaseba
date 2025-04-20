@extends('frontend.layouts.base')

@section('title', 'Library')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Library</h2>
	</div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
	<div class="container">

		<div class="row">
			<div class="col-lg-8">
				<div class="filter mb-4">
					<form action="{{ route('library.search')}}" method="post">
						@csrf
						@method('GET')
						<div class="row g-2">
							<div class="col-lg-3">
								<select name="district_id" id="district_id" class="form-control">
									<option value="">All Bangladesh</option>
									@foreach($districts as $district)
									<option value="{{ $district->id }}">{{ $district->name }}</option>
									@endforeach
								</select>
							</div>

							<div class="col-lg-3">
								<select name="city_id" id="city_id" class="form-control">
									<option value="" disabled selected>Select City</option>
								</select>
							</div>

							<div class="col-lg-3">
								<button class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-4 text-end">
				<div class="d-flex align-items-center gap-3">
					<p>You can also read pdf online</p>
					<a href="#" class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Read PDF</a>
				</div>
			</div>
		</div>


		<div class="row g-3">
			@if($libraries->count() > 0)
			@foreach($libraries as $library)
			<div class="col-lg-3">
				<div class="h-100 card text-center">
					<div class="info">
						<h5>{{ $library->name }}</h5>
					</div>
					<div class="phone">
						<p>{{ $library->phone }}</p>
						<p class="mt-3"><strong>Address :</strong> <br>{{ $library->address }}</p>
						<p>
							@if($library->city)
							{{ $library->city['name'] }},
							@endif
							@if($library->district)
							{{ $library->district['name'] }}
							@endif
						</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $library->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Library Found!</h4>
				</div>
			</div>
			@endif
		</div>

		<div class="mt-30">
			{{ $libraries->links() }}
		</div>

	</div>
</div>
<!-- content section end -->

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