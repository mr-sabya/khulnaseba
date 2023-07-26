@extends('backend.layouts.base')

@section('title', 'Add Restaurant')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Restaurant</h4>

			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.restaurant.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
							@if($errors->has('phone'))
							<small style="color: red">{{ $errors->first('phone') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
							@if($errors->has('address'))
							<small style="color: red">{{ $errors->first('address') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="food">Food</label>
							<select class="form-control multiple-select" id="food[]" name="food[]" multiple>
								@foreach($foods as $food)
								<option value="{{ $food->id }}">{{ $food->name }}</option>
								@endforeach
							</select>
							@if($errors->has('food'))
							<small style="color: red">{{ $errors->first('food') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="district_id">District</label>
							<select class="form-control single-select" id="district_id" name="district_id">
								<option value="" selected disabled>--select district--</option>
								@foreach($districts as $district)
								<option value="{{ $district->id }}">{{ $district->name }}</option>
								@endforeach
							</select>
							@if($errors->has('district_id'))
							<small style="color: red">{{ $errors->first('district_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="city_id">City</label>
							<select class="form-control single-select" id="city_id" name="city_id">
								<option value="" selected disabled>--select city--</option>
								@foreach($cities as $city)
								<option value="{{ $city->id }}">{{ $city->name }}</option>
								@endforeach
							</select>
							@if($errors->has('city_id'))
							<small style="color: red">{{ $errors->first('city_id') }}</small>
							@endif
						</div>

                        <div class="form-group text-center">
                            <img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                        </div>

                        <div class="form-group">
                            <label for="image">Image (480*320px)</label>
                            <input type="file" class="form-control" name="image" id="image">
                            @if($errors->has('image'))
                            <small style="color: red">{{ $errors->first('image') }}</small>
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
        placeholder: "-- select food --"
    });
</script>
@endsection