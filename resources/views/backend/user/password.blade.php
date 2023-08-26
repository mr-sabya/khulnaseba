@extends('backend.layouts.base')

@section('title', 'Change Password')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Change Password - {{ $user->name }}</h4>

			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.password.update', $user->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="c_password">Current Password</label>
							<input type="password" class="form-control" name="c_password" id="c_password" value="{{ old('c_password') }}">
							@if($errors->has('c_password'))
							<small style="color: red">{{ $errors->first('c_password') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
							@if($errors->has('password'))
							<small style="color: red">{{ $errors->first('password') }}</small>
							@endif
						</div>
                        <div class="form-group">
							<label for="password_confirmation">Confirmed Password</label>
							<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}">
							@if($errors->has('password'))
							<small style="color: red">{{ $errors->first('password_confirmation') }}</small>
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