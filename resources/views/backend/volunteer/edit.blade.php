@extends('backend.layouts.base')

@section('title', 'Edit Volunteer')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Volunteer</h4>

			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.volunteer.update', $volunteer->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $volunteer->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="father_name">Father's Name</label>
							<input type="text" class="form-control" name="father_name" id="father_name" value="{{ $volunteer->father_name }}">
							@if($errors->has('father_name'))
							<small style="color: red">{{ $errors->first('father_name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="mother_name">Mother's Name</label>
							<input type="text" class="form-control" name="mother_name" id="mother_name" value="{{ $volunteer->mother_name }}">
							@if($errors->has('mother_name'))
							<small style="color: red">{{ $errors->first('mother_name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="n_id">Nation ID number</label>
							<input type="text" class="form-control" name="n_id" id="n_id" value="{{ $volunteer->n_id }}">
							@if($errors->has('n_id'))
							<small style="color: red">{{ $errors->first('n_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="short_bio">Short Bio</label>
							<textarea class="form-control" name="short_bio" id="short_bio">{{ $volunteer->short_bio }}</textarea>
							@if($errors->has('short_bio'))
							<small style="color: red">{{ $errors->first('short_bio') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="address" id="address" value="{{ $volunteer->address }}">
							@if($errors->has('address'))
							<small style="color: red">{{ $errors->first('address') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="blood_id">Blood Group</label>
							<select class="form-control single-select" id="blood_id" name="blood_id">
								<option value="" selected disabled>--select blood group--</option>
								@foreach($bloods as $blood)
								<option value="{{ $blood->id }}" {{ $volunteer->blood_id == $blood->id ? 'selected' : ''}}>{{ $blood->name }}</option>
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
								<option value="{{ $district->id }}" {{ $volunteer->district_id == $district->id ? 'selected' : ''}}>{{ $district->name }}</option>
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
								<option value="{{ $city->id }}" {{ $volunteer->city_id == $city->id ? 'selected' : ''}}>{{ $city->name }}</option>
								@endforeach
							</select>
							@if($errors->has('city_id'))
							<small style="color: red">{{ $errors->first('city_id') }}</small>
							@endif
						</div>


						<div class="form-group text-center">
							@if($volunteer->image == null)
							<img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
							@else
							<img src="{{ url('images/volunteer', $volunteer->image)}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
							@endif
						</div>

						<div class="form-group">
							<label for="image">Image (300*300px)</label>
							<input type="file" class="form-control" name="image" id="image">
							@if($errors->has('image'))
							<small style="color: red">{{ $errors->first('image') }}</small>
							@endif
						</div>

						<div class="form-check form-group">
							<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" {{ $volunteer->is_active == 1 ? 'checked' : '' }}>
							<label class="form-check-label" for="is_active">
								Approved
							</label>
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