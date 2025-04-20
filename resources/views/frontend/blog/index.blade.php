@extends('frontend.layouts.base')

@section('title', 'Blogs')

@section('content')
<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Blogs</h2>
	</div>
</div>
<!-- hero section end -->

<!-- blos section start -->
<div class="blogs section-padding">
	<div class="container">
		
		<div class="row g-3">

			@if($blogs->count() > 0)
			@foreach($blogs as $blog)
			<div class="col-lg-3 ">
				<div class="card p-0 border-0 h-100">
					<div class="card-header border-0 p-0">
						<img src="{{ url('images/blog', $blog->image) }}" alt="rover" />
					</div>
					<div class="card-body">
						<span class="tag tag-teal">{{ $blog->blogCategory['name'] }}</span>
						<a href="{{ route('blog.show', $blog->slug) }}">
							<h5>{{ $blog->title }}</h5>
						</a>

						{!! str_limit($blog->meta_description, 80) !!}

						<div class="user">

							<div class="user-info">
								<p>{{ date('d F, Y', strtotime($blog->created_at)) }}, {{ $blog->created_at->diffForHumans()}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

			@else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Blogs Found!</h4>
				</div>
			</div>
			@endif
		</div>

		<div class="mt-30">
			{{ $blogs->links() }}
		</div>
	</div>
</div>
<!-- blos section end -->

@endsection


@section('scripts')

@endsection