@extends('backend.layouts.base')

@section('title', 'Add Blog')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Blog</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
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
                            <label for="image">Image (900*600px)</label>
                            <input type="file" class="form-control" name="image" id="image">
                            @if($errors->has('image'))
                            <small style="color: red">{{ $errors->first('image') }}</small>
                            @endif
                        </div>

						<div class="form-group">
							<label for="blog">Blog</label>
                            <textarea class="form-control details" name="blog" id="blog">{!! old('blog') !!}</textarea>
                            @if($errors->has('blog'))
                            <small style="color: red">{{ $errors->first('blog') }}</small>
                            @endif
						</div>

						<div class="form-group">
                            <label for="tags">Tags</label>
                            <textarea class="form-control" name="tags" id="tags"></textarea>
                            @if($errors->has('tags'))
                            <small style="color: red">{{ $errors->first('tags') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
							<label for="meta_description">Meta Description</label>
							<input type="text" class="form-control" name="meta_description" id="meta_description" value="{{ old('meta_description') }}">
							@if($errors->has('meta_description'))
							<small style="color: red">{{ $errors->first('meta_description') }}</small>
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