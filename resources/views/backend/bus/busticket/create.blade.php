@extends('backend.layouts.base')

@section('title', 'Add Bus Ticket')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Bus Ticket</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.busticket.store') }}" method="post">
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
							<label for="bus_id">Bus</label>
							<select class="form-control single-select" id="bus_id" name="bus_id">
								<option value="" selected disabled>--select bus--</option>
								@foreach($buses as $bus)
								<option value="{{ $bus->id }}">{{ $bus->name }}</option>
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
								<option value="{{ $type->id }}">{{ $type->name }}</option>
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
								<option value="{{ $counter->id }}">{{ $counter->counter }}</option>
								@endforeach
							</select>
							@if($errors->has('counter_id'))
							<small style="color: red">{{ $errors->first('counter_id') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="price">Price</label>
							<input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}">
							@if($errors->has('price'))
							<small style="color: red">{{ $errors->first('price') }}</small>
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