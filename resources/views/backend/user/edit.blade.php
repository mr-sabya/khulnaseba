@extends('backend.layouts.base')

@section('title', 'Add User')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add User</h4>

			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="email">Email (Not changable)</label>
							<input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" readonly>
							@if($errors->has('email'))
							<small style="color: red">{{ $errors->first('email') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone }}">
							@if($errors->has('phone'))
							<small style="color: red">{{ $errors->first('phone') }}</small>
							@endif
						</div>
						

                        
                        <div class="form-group text-center">
							@if($user->image == null)
                            <img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
							@else
                            <img src="{{ url('images/user', $user->image)}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
							@endif
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
<script>
    $(".multiple-select").select2({
        placeholder: "-- select food --"
    });
</script>
@endsection