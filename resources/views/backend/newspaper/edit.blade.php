@extends('backend.layouts.base')

@section('title', 'Edit Newspaper')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Newspaper</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.newspaper.update', $newspaper->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name"  value="{{ $newspaper->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="slug">Slug</label>
							<input type="text" class="form-control" name="slug" id="slug" value="{{ $newspaper->slug }}">
							@if($errors->has('slug'))
							<small style="color: red">{{ $errors->first('slug') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="link">Link</label>
							<input type="text" class="form-control" name="link" id="link" value="{{ $newspaper->link }}">
							@if($errors->has('link'))
							<small style="color: red">{{ $errors->first('link') }}</small>
							@endif
						</div>

						<div class="form-group text-center">
							@if($newspaper->image == null)
							<img src="{{ url('assets/backend/images/default_image.png') }}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
							@else
							<img src="{{ url('images/newspaper', $newspaper->image) }}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
							@endif
						</div>

						<div class="form-group">
							<label for="image">Image (400*200px)</label>
							<input type="file" class="form-control" name="image" id="image">
							@if($errors->has('image'))
							<small style="color: red">{{ $errors->first('image') }}</small>
							@endif
						</div>

						<div class="form-check mb-4">
							<input type="checkbox" class="form-check-input" name="open_website" id="open_website" value="1" {{ $newspaper->open_website == 1 ? 'checked' : '' }}>
							<label class="form-check-label" for="open_website">Is open Out of Website/App</label>
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
	$("#name").keyup(function() {
		var Text = $(this).val();
		Text = Text.toLowerCase();
		Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
		$("#slug").val(Text);        
	});
</script>
@endsection