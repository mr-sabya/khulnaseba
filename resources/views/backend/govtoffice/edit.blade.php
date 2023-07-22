@extends('backend.layouts.base')

@section('title', 'Edit Govt. Office')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Govt. Office</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.govtoffice.update', $govt_office->id) }}" method="post">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $govt_office->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" name="phone" id="phone" value="{{ $govt_office->phone }}">
							@if($errors->has('phone'))
							<small style="color: red">{{ $errors->first('phone') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="address" id="address" value="{{ $govt_office->address }}">
							@if($errors->has('address'))
							<small style="color: red">{{ $errors->first('address') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="district_id">District</label>
							<select class="form-control single-select" id="district_id" name="district_id">
								<option value="" selected disabled>--select district--</option>
								@foreach($districts as $district)
								<option value="{{ $district->id }}" {{ $govt_office->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
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
								<option value="{{ $city->id }}" {{ $govt_office->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
								@endforeach
							</select>
							@if($errors->has('city_id'))
							<small style="color: red">{{ $errors->first('city_id') }}</small>
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