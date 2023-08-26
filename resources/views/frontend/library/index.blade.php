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
					<form action="">
						<div class="row g-2">
							<div class="col-lg-3">
								<select name="" id="" class="form-control">
									<option value="" selected disabled>Seclect District</option>
									@foreach($districts as $district)
									<option value="{{ $district->id }}">{{ $district->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-lg-3">
								<select name="" id="" class="form-control">
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
		</div>

		<div class="mt-30">
			{{ $libraries->links() }}
		</div>

	</div>
</div>
<!-- content section end -->

@endsection