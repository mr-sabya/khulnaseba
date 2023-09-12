@extends('backend.layouts.base')

@section('title', 'Add Volunteer')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Volunteer</h4>

			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.volunteer.store') }}" method="post" enctype="multipart/form-data">
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
							<label for="email">Email Address</label>
							<input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
							@if($errors->has('email'))
							<small style="color: red">{{ $errors->first('email') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="father_name">Father's Name</label>
							<input type="text" class="form-control" name="father_name" id="father_name" value="{{ old('father_name') }}">
							@if($errors->has('father_name'))
							<small style="color: red">{{ $errors->first('father_name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="mother_name">Mother's Name</label>
							<input type="text" class="form-control" name="mother_name" id="mother_name" value="{{ old('mother_name') }}">
							@if($errors->has('mother_name'))
							<small style="color: red">{{ $errors->first('mother_name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="n_id">Nation ID number</label>
							<input type="text" class="form-control" name="n_id" id="n_id" value="{{ old('n_id') }}">
							@if($errors->has('n_id'))
							<small style="color: red">{{ $errors->first('n_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="short_bio">Short Bio</label>
							<textarea class="form-control" name="short_bio" id="short_bio">{{ old('short_bio') }}</textarea>
							@if($errors->has('short_bio'))
							<small style="color: red">{{ $errors->first('short_bio') }}</small>
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
							<label for="blood_id">Blood Group</label>
							<select class="form-control single-select" id="blood_id" name="blood_id">
								<option value="" selected disabled>--select blood group--</option>
								@foreach($bloods as $blood)
								<option value="{{ $blood->id }}">{{ $blood->name }}</option>
								@endforeach
							</select>
							@if($errors->has('blood_id'))
							<small style="color: red">{{ $errors->first('blood_id') }}</small>
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
							<label for="image">Image (300*300px)</label>
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

@endsection