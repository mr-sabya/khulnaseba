@extends('backend.layouts.base')

@section('title', 'Add Testimonial')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Testimonial</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.testimonial.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="company">Company</label>
							<input type="text" class="form-control" name="company" id="company" value="{{ old('company') }}">
							@if($errors->has('company'))
							<small style="color: red">{{ $errors->first('company') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="designation">Designation</label>
							<input type="text" class="form-control" name="designation" id="designation" value="{{ old('designation') }}">
							@if($errors->has('designation'))
							<small style="color: red">{{ $errors->first('designation') }}</small>
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

						<div class="form-group">
							<label for="star">Star</label>
							<input type="number" min="1" max="5" class="form-control" name="star" id="star" value="{{ old('star') }}">
							@if($errors->has('star'))
							<small style="color: red">{{ $errors->first('star') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="feedback">Feedback</label>
                            <textarea class="form-control" name="feedback" id="feedback"></textarea>
                            @if($errors->has('feedback'))
                            <small style="color: red">{{ $errors->first('feedback') }}</small>
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