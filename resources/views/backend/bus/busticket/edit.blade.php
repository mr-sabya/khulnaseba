@extends('backend.layouts.base')

@section('title', 'Edit Bus Ticket')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Bus Ticket</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.busticket.update', $busticket->id) }}" method="post">
						@csrf
                        @method('PUT')
                        <div class="form-group">
							<label for="route_id">Route</label>
							<select class="form-control single-select" id="route_id" name="route_id">
								<option value="" selected disabled>--select route--</option>
								@foreach($routes as $route)
								<option value="{{ $route->id }}" {{ $busticket->route_id == $route->id ? 'selected' : '' }}>{{ $route->name }}</option>
								@endforeach
							</select>
							@if($errors->has('route_id'))
							<small style="color: red">{{ $errors->first('route_id') }}</small>
							@endif
						</div>


                        <div class="form-group">
							<label for="bus_id">Bus</label>
							<select class="form-control single-select" id="bus_id" name="bus_id">
								<option value="" selected disabled>--select bus--</option>
								@foreach($buses as $bus)
								<option value="{{ $bus->id }}" {{ $busticket->bus_id == $bus->id ? 'selected' : '' }}>{{ $bus->name }}</option>
								@endforeach
							</select>
							@if($errors->has('bus_id'))
							<small style="color: red">{{ $errors->first('bus_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="type_id">Bus Type</label>
							<select class="form-control single-select" id="type_id" name="type_id">
								<option value="" selected disabled>--select bus type--</option>
								@foreach($types as $type)
								<option value="{{ $type->id }}" {{ $busticket->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
								@endforeach
							</select>
							@if($errors->has('type_id'))
							<small style="color: red">{{ $errors->first('type_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="counter_id">Bus Counter</label>
							<select class="form-control single-select" id="counter_id" name="counter_id">
								<option value="" selected disabled>--select bus type--</option>
								@foreach($counters as $counter)
								<option value="{{ $counter->id }}" {{ $busticket->counter_id == $counter->id ? 'selected' : '' }}>{{ $counter->counter }} - {{ $counter->address }}</option>
								@endforeach
							</select>
							@if($errors->has('counter_id'))
							<small style="color: red">{{ $errors->first('counter_id') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="price">Price</label>
							<input type="number" class="form-control" name="price" id="price" value="{{ $busticket->price }}">
							@if($errors->has('price'))
							<small style="color: red">{{ $errors->first('price') }}</small>
							@endif
						</div>

						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection

@section('scripts')

@endsection