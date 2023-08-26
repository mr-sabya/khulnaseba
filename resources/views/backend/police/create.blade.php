@extends('backend.layouts.base')

@section('title', 'Add Police')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Police</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.police.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="designation">Designation</label>
							<input type="text" class="form-control" name="designation" id="designation" value="{{ old('designation') }}">
							@if($errors->has('designation'))
							<small style="color: red">{{ $errors->first('designation') }}</small>
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
							<label for="thana_id">Thana</label>
							<select class="form-control single-select" id="thana_id" name="thana_id">
								<option value="" selected disabled>--select thana--</option>
								@foreach($thanas as $thana)
								<option value="{{ $thana->id }}">{{ $thana->name }}</option>
								@endforeach
							</select>
							@if($errors->has('thana_id'))
							<small style="color: red">{{ $errors->first('thana_id') }}</small>
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