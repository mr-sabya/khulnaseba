@extends('backend.layouts.base')

@section('title', 'Add Course')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Course</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.course.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
							@if($errors->has('title'))
							<small style="color: red">{{ $errors->first('title') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="slug">Slug</label>
							<input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}">
							@if($errors->has('slug'))
							<small style="color: red">{{ $errors->first('slug') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="duration">Duration (Months)</label>
							<input type="text" class="form-control" name="duration" id="duration" value="{{ old('duration') }}">
							@if($errors->has('duration'))
							<small style="color: red">{{ $errors->first('duration') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="lecture">Classes/Lectures</label>
							<input type="text" class="form-control" name="lecture" id="lecture" value="{{ old('lecture') }}">
							@if($errors->has('lecture'))
							<small style="color: red">{{ $errors->first('lecture') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="projects">Projects/Work</label>
							<input type="text" class="form-control" name="projects" id="projects" value="{{ old('projects') }}">
							@if($errors->has('projects'))
							<small style="color: red">{{ $errors->first('projects') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="category_id">Category</label>
							<select class="form-control single-select" id="category_id" name="category_id">
								<option value="" selected disabled>--select category--</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
							@if($errors->has('category_id'))
							<small style="color: red">{{ $errors->first('category_id') }}</small>
							@endif
						</div>


						<div class="form-group text-center">
                            <img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                        </div>

                        <div class="form-group">
                            <label for="image">Image (1280*720px)</label>
                            <input type="file" class="form-control" name="image" id="image">
                            @if($errors->has('image'))
                            <small style="color: red">{{ $errors->first('image') }}</small>
                            @endif
                        </div>

						<div class="form-group">
							<label for="details">Details</label>
                            <textarea class="form-control details" name="details" id="details">{!! old('details') !!}</textarea>
                            @if($errors->has('details'))
                            <small style="color: red">{{ $errors->first('details') }}</small>
                            @endif
						</div>

                        <div class="form-group">
							<label for="short_desc">Short Description</label>
							<textarea class="form-control" name="short_desc" id="short_desc" rows="10" cols="50">{{ old('short_desc') }}</textarea>
							@if($errors->has('short_desc'))
							<small style="color: red">{{ $errors->first('short_desc') }}</small>
							@endif
						</div>

						<div class="form-group form-check">
							<input type="checkbox" class="form-check-input" name="is_free" id="is_free" value="1">
							<label for="is_free" class="form-check-label">Is Free</label>
							@if($errors->has('is_free'))
							<small style="color: red">{{ $errors->first('is_free') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="price">Price</label>
							<input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}">
							@if($errors->has('price'))
							<small style="color: red">{{ $errors->first('price') }}</small>
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
	$("#title").keyup(function() {
		var Text = $(this).val();
		Text = Text.toLowerCase();
		Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
		$("#slug").val(Text);        
	});
</script>
@endsection