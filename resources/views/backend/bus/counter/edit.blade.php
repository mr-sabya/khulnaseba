@extends('backend.layouts.base')

@section('title', 'Edit Bus Counter')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Bus Counter</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.buscounter.update', $counter->id) }}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="counter">Counter</label>
							<input type="text" class="form-control" name="counter" id="counter" value="{{ $counter->counter }}">
							@if($errors->has('counter'))
							<small style="color: red">{{ $errors->first('counter') }}</small>
							@endif
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" class="form-control" name="phone" id="phone" value="{{ $counter->phone }}">
							@if($errors->has('phone'))
							<small style="color: red">{{ $errors->first('phone') }}</small>
							@endif
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="address" id="address" value="{{ $counter->address }}">
							@if($errors->has('address'))
							<small style="color: red">{{ $errors->first('address') }}</small>
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