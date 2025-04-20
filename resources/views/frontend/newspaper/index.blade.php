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
		@foreach($categories as $category)
		<div class="bg-primary text-white text-center p-2 mb-3">
			<h4 class="m-0">{{ $category->name }}</h4>
		</div>
		<div class="newspaper-conatiner mb-5">


			@foreach($category->newspapers as $newspaper)
			<div class="newspaper">
				<div class="image">
					<img src="{{ url('images/newspaper', $newspaper->image)}}" alt="{{ $newspaper->name }}">
				</div>
				<div class="action">
					@if($newspaper->open_website == 1)
					<a href="{{ $newspaper->link }}" target="_blank">Go to Website <i class="fa-solid fa-arrow-right"></i></a>
					@else
					<a href="{{ route('newspaper.show',$newspaper->slug) }}">Open Newspaper <i class="fa-solid fa-arrow-right"></i></a>
					@endif
				</div>
			</div>
			@endforeach
		</div>
		@endforeach
	</div>
</div>
<!-- newspaper section end -->


@endsection