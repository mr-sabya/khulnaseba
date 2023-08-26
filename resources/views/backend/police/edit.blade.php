@extends('backend.layouts.base')

@section('title', 'Edit Police')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Police</h4>
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.police.update', $police->id) }}" method="post">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $police->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="designation">Designation</label>
							<input type="text" class="form-control" name="designation" id="designation" value="{{ $police->designation }}">
							@if($errors->has('designation'))
							<small style="color: red">{{ $errors->first('designation') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" name="phone" id="phone" value="{{ $police->phone }}">
							@if($errors->has('phone'))
							<small style="color: red">{{ $errors->first('phone') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="thana_id">Thana</label>
							<select class="form-control single-select" id="thana_id" name="thana_id">
								<option value="" selected disabled>--select thana--</option>
								@foreach($thanas as $thana)
								<option value="{{ $thana->id }}" {{ $police->thana_id == $thana->id ? 'selected' : '' }}>{{ $thana->name }}</option>
								@endforeach
							</select>
							@if($errors->has('thana_id'))
							<small style="color: red">{{ $errors->first('thana_id') }}</small>
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