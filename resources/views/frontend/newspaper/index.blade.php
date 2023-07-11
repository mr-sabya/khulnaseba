@extends('frontend.layouts.base')

@section('title', 'Newspapers')

@section('content')
<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>All Newspapers</h2>
	</div>
</div>
<!-- hero section end -->

<!-- newspaper section start -->
<div class="newspaper-section section-padding">
	<div class="container">
		<div class="newspaper-conatiner">

			@foreach($newspapers as $newspaper)
			<div class="newspaper">
				<div class="image">
					<a href="{{ route('newspaper.show', $newspaper->slug) }}">
						<img src="{{ url('images/newspaper', $newspaper->image)}}" alt="{{ $newspaper->name }}">
					</a>
				</div>
				<div class="action">
					<a href="{{ $newspaper->link }}" target="_blank">Go to Website <i class="fa-solid fa-arrow-right"></i></a>
				</div>
			</div>
			@endforeach



		</div>
	</div>
</div>
<!-- newspaper section end -->


@endsection