@extends('backend.layouts.base')

@section('title', 'Add Plane Ticket Counter')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Plane Ticket Counter</h4>

			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.plane-ticket.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="route_id">Route</label>
							<select class="form-control single-select" id="route_id" name="route_id">
								<option value="" selected disabled>--select route--</option>
								@foreach($routes as $route)
								<option value="{{ $route->id }}">{{ $route->name }}</option>
								@endforeach
							</select>
							@if($errors->has('route_id'))
							<small style="color: red">{{ $errors->first('route_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="airplane_id">Airline</label>
							<select class="form-control single-select" id="airplane_id" name="airplane_id">
								<option value="" selected disabled>--select airline--</option>
								@foreach($airlines as $airline)
								<option value="{{ $airline->id }}">{{ $airline->name }}</option>
								@endforeach
							</select>
							@if($errors->has('airplane_id'))
							<small style="color: red">{{ $errors->first('airplane_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="business_price">Price (Business)</label>
							<input type="number" class="form-control" min="0" name="business_price" id="business_price" value="{{ old('business_price') }}">
							@if($errors->has('business_price'))
							<small style="color: red">{{ $errors->first('business_price') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="economic_price">Price (Ecomonic)</label>
							<input type="number" class="form-control" min="0" name="economic_price" id="economic_price" value="{{ old('economic_price') }}">
							@if($errors->has('economic_price'))
							<small style="color: red">{{ $errors->first('economic_price') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="air_time">Air Time </label>
							<input type="text" class="form-control" min="0" name="air_time" id="air_time" value="{{ old('air_time') }}">
							@if($errors->has('air_time'))
							<small style="color: red">{{ $errors->first('air_time') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="counter">Ticket Counters</label>
							<select class="form-control multiple-select" id="counter" name="counter[]" multiple>
								@foreach($counters as $counter)
								<option value="{{ $counter->id }}">{{ $counter->name }}</option>
								@endforeach
							</select>
							@if($errors->has('counter'))
							<small style="color: red">{{ $errors->first('counter') }}</small>
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
<script>
	$(".multiple-select").select2({
		placeholder: "-- select counters --"
	});
</script>
@endsection