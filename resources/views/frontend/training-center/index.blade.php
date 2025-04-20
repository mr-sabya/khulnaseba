@extends('frontend.layouts.base')

@section('title', 'Training Centers')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Training Centers</h2>
	</div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
	<div class="container">

		<div class="row justify-content-center mb-5">
			<div class="col-lg-10">
				<!-- filter form -->
				<div class="filter mb-4">

					<form action="{{ route('training_centers.search')}}" method="post">
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
			@if($training_centers->count() > 0)
			@foreach($training_centers as $training_center)
			<div class="col-lg-3">
				<div class="h-100 card text-center">
					<div class="info">
						<h5>{{ $training_center->name }}</h5>
					</div>
					<div class="phone">
						<p>{{ $training_center->phone }}</p>
						<p>
							@if($training_center->city)
							{{ $training_center->city['name'] }},
							@endif
							@if($training_center->district)
							{{ $training_center->district['name'] }}
							@endif
						</p>
						<p class="mt-3"><strong>Topics :</strong> <br>{{ $training_center->topic }}</p>
					</div>
					<hr>
					<div class="call-button">
						<a class="call-btn" href="tel:{{ $training_center->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Training Center Found!</h4>
                </div>
            </div>
            @endif
		</div>

		<div class="mt-30">
			{{ $training_centers->links() }}
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