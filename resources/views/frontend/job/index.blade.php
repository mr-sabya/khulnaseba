@extends('frontend.layouts.base')

@section('title', 'Jobs')

@section('content')

<!-- hero section start -->
<div class="header">
	<div class="container">
		<h2>Jobs</h2>
	</div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
	<div class="container">




		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Job</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach($jobs as $job)
					<tr>
						<td>{{ $job->name }}</td>
						<td>
							<div class="call-button">
								<a class="call-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#details_{{ $job->id }}"><i class="fa-solid fa-eye"></i> Details</a>
								<a class="call-btn" href="{{ $job->link}}"><i class="fa-solid fa-link"></i> Apply</a>
							</div>

							<div class="modal fade" id="details_{{ $job->id }}" tabindex="-1">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">{{ $job->name }}</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											{!! $job->details !!}
										</div>

									</div>
								</div>
							</div>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
			{{ $jobs->links() }}

		</div>


	</div>
</div>
<!-- content section end -->

@endsection