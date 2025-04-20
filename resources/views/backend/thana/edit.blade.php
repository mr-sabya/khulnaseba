@extends('backend.layouts.base')

@section('title', 'Edit Thana')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Thana</h4>
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.thana.update', $thana->id) }}" method="post">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $thana->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="category_id">Categories</label>
							<select name="category_id" id="category_id" class="form-control">
								<option value="" selected disabled>--select category--</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}" {{ $thana->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
								@endforeach
							</select>
							@if($errors->has('category_id'))
							<small style="color: red">{{ $errors->first('category_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" name="phone" id="phone" value="{{ $thana->phone }}">
							@if($errors->has('phone'))
							<small style="color: red">{{ $errors->first('phone') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="address" id="address" value="{{ $thana->address }}">
							@if($errors->has('address'))
							<small style="color: red">{{ $errors->first('address') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="district_id">District</label>
							<select class="form-control single-select" id="district_id" name="district_id">
								<option value="" selected disabled>--select district--</option>
								@foreach($districts as $district)
								<option value="{{ $district->id }}" {{ $thana->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
								@endforeach
							</select>
							@if($errors->has('district_id'))
							<small style="color: red">{{ $errors->first('district_id') }}</small>
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