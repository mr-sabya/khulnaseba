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
							<label for="counter">Counter</label>
							<input type="text" class="form-control" name="counter" id="counter" value="{{ $busticket->counter }}">
							@if($errors->has('counter'))
							<small style="color: red">{{ $errors->first('counter') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="address" id="address" value="{{ $busticket->address }}">
							@if($errors->has('address'))
							<small style="color: red">{{ $errors->first('address') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" class="form-control" name="phone" id="phone" value="{{ $busticket->phone }}">
							@if($errors->has('phone'))
							<small style="color: red">{{ $errors->first('phone') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="price">Price</label>
							<input type="number" class="form-control" name="price" id="price" value="{{ $busticket->price }}">
							@if($errors->has('price'))
							<small style="color: red">{{ $errors->first('price') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="info">Additional Info</label>
							<textarea class="form-control" name="info" id="info">{{ $busticket->info }}</textarea>
							@if($errors->has('info'))
							<small style="color: red">{{ $errors->first('info') }}</small>
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