@extends('frontend.layouts.base')

@section('title', 'E-Help')

@section('content')
<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>E-Help</h2>
	</div>
</div>
<!-- hero section end -->

<!-- newspaper section start -->
<div class="newspaper-section section-padding">
	<div class="container">
		<div class="newspaper-conatiner">
			@foreach($ehelps as $ehelp)
			<div class="newspaper">
				<div class="image">
					<a href="{{ route('ehelp.show', $ehelp->id) }}">
						<img src="{{ url('images/ehelp', $ehelp->logo)}}" alt="{{ $ehelp->name }}">
					</a>
				</div>
				<div class="action">
					<a href="{{ route('ehelp.show', $ehelp->id) }}">Open Website <i class="fa-solid fa-arrow-right"></i></a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- newspaper section end -->


@endsection