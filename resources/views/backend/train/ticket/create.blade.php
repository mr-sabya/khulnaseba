@extends('backend.layouts.base')

@section('title', 'Add Train Ticket')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Train Ticket</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.trainticket.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="route_id">Route</label>
							<select class="form-control single-select" id="route_id" name="route_id">
								<option value="" selected disabled>--select route--</option>
								@foreach($train_routes as $route)
								<option value="{{ $route->id }}">{{ $route->name }}</option>
								@endforeach
							</select>
							@if($errors->has('route_id'))
							<small style="color: red">{{ $errors->first('route_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="class_id">Class</label>
							<select class="form-control single-select" id="class_id" name="class_id">
								<option value="" selected disabled>--select class--</option>
								@foreach($train_classes as $class)
								<option value="{{ $class->id }}">{{ $class->name }}</option>
								@endforeach
							</select>
							@if($errors->has('class_id'))
							<small style="color: red">{{ $errors->first('class_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="train_id">Train</label>
							<select class="form-control single-select" id="train_id" name="train_id">
								<option value="" selected disabled>--select train--</option>
								@foreach($trains as $train)
								<option value="{{ $train->id }}">{{ $train->name }}</option>
								@endforeach
							</select>
							@if($errors->has('train_id'))
							<small style="color: red">{{ $errors->first('train_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="amount">Price</label>
							<input type="text" class="form-control" name="amount" id="amount" value="{{ old('amount') }}">
							@if($errors->has('amount'))
							<small style="color: red">{{ $errors->first('amount') }}</small>
							@endif
						</div>

						<button type="submit" class="btn btn-primary">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection

@section('scripts')

@endsection