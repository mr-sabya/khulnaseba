@extends('frontend.layouts.base')

@section('title', 'Tourist Places')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Tourist Places</h2>
	</div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blogs section-padding">
	<div class="container">

		<div class="row justify-content-center mb-5">
			<div class="col-lg-10">
				<!-- filter form -->
				<div class="filter mb-4">

					<form action="{{ route('place.search')}}" method="post">
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
								<select name="type_id" id="type_id" class="form-control">
									<option value="" disabled selected>Select Category</option>
									@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
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
			@foreach($places as $place)
			<div class="col-lg-3">
				<div class="card border-0 h-100 p-0">
					<div class="card-header border-0 p-0">
						<img src="{{ url('images/tourist-place', $place->image) }}" alt="">
					</div>
					<div class="card-body">
						<span class="tag tag-teal">{{ $place->placeType['name'] }}</span>
						<div class="info">
							<h5 class="m-0"><a href="#">{{ $place->name }}</a></h5>
							<p><strong>District: {{ $place->district['name'] }}</strong></p>
						</div>
						<div class="phone">
							<p>{{ $place->phone }}</p>
							<p>{{ $place->address }}</p>


						</div>
					</div>
				</div>
			</div>
			@endforeach

		</div>
		<div class="mt-30">
			{{ $places->links() }}
		</div>


	</div>
</div>
<!-- newspaper section end -->

@endsection