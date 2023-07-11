@extends('backend.layouts.base')

@section('title', 'Edit District')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit District</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.district.update', $district->id) }}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $district->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
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
