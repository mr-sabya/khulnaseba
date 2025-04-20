@extends('backend.layouts.base')

@section('title', 'Edit Bus Route')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Bus Route</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.busroute.update', $busroute->id) }}" method="post">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $busroute->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>


						<div class="form-group">
							<label for="bus_id">Bus</label>
							<select class="form-control multiple-select" id="bus" name="bus[]" multiple>
								@foreach($buses as $bus)
								<option value="{{ $bus->id }}" {{ $busroute->get_bus($bus->id) ? 'selected' : '' }}>{{ $bus->name }}</option>
								@endforeach
							</select>
							@if($errors->has('bus_id'))
							<small style="color: red">{{ $errors->first('bus_id') }}</small>
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
<script>
    $(".multiple-select").select2({
        placeholder: "-- select bus --"
    });
</script>
@endsection