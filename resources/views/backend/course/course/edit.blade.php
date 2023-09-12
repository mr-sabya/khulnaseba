@extends('backend.layouts.base')

@section('title', 'Edit Course')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Course</h4>
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.course.update', $course->id) }}" method="post" enctype="multipart/form-data">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" name="title" id="title" value="{{ $course->title }}">
							@if($errors->has('title'))
							<small style="color: red">{{ $errors->first('title') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="slug">Slug</label>
							<input type="text" class="form-control" name="slug" id="slug" value="{{ $course->slug }}">
							@if($errors->has('slug'))
							<small style="color: red">{{ $errors->first('slug') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="category_id">Category</label>
							<select class="form-control single-select" id="category_id" name="category_id">
								<option value="" selected disabled>--select district--</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
								@endforeach
							</select>
							@if($errors->has('category_id'))
							<small style="color: red">{{ $errors->first('category_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="type">Type</label>
							<select class="form-control single-select" id="type" name="type">
								<option value="" selected disabled>--select type--</option>
								<option value="1" {{ $course->type == 1 ? 'selected' : ''}}>Offline</option>
								<option value="2" {{ $course->type == 2 ? 'selected' : ''}}>Online</option>
								
							</select>
							@if($errors->has('type'))
							<small style="color: red">{{ $errors->first('type') }}</small>
							@endif
						</div>

						<div class="form-group text-center">
                            @if($course->image == null)
                            <img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                            @else
                            <img src="{{ url('images/course', $course->image)}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image">Image (900*600px)</label>
                            <input type="file" class="form-control" name="image" id="image">
                            @if($errors->has('image'))
                            <small style="color: red">{{ $errors->first('image') }}</small>
                            @endif
                        </div>

						<div class="form-group">
                            <label for="details">Details</label>
                            <textarea class="form-control details" name="details" id="details">{!! $course->details !!}</textarea>
                            @if($errors->has('details'))
                            <small style="color: red">{{ $errors->first('details') }}</small>
                            @endif
                        </div>

						<div class="form-group">
							<label for="short_desc">Short Description</label>
							<textarea class="form-control" name="short_desc" id="short_desc">{{ $course->short_desc }}</textarea>
							@if($errors->has('short_desc'))
							<small style="color: red">{{ $errors->first('short_desc') }}</small>
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
<script>
	$("#title").keyup(function() {
		var Text = $(this).val();
		Text = Text.toLowerCase();
		Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
		$("#slug").val(Text);        
	});
</script>
@endsection