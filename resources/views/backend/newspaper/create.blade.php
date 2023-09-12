@extends('backend.layouts.base')

@section('title', 'Add Newspaper')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Newspaper</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.newspaper.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
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
							<label for="link">Link</label>
							<input type="text" class="form-control" name="link" id="link" value="{{ old('link') }}">
							@if($errors->has('link'))
							<small style="color: red">{{ $errors->first('link') }}</small>
							@endif
						</div>

						<div class="form-group text-center">
							<img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
						</div>

						<div class="form-group">
							<label for="image">Image (400*200px)</label>
							<input type="file" class="form-control" name="image" id="image">
							@if($errors->has('image'))
							<small style="color: red">{{ $errors->first('image') }}</small>
							@endif
						</div>

						<div class="form-check mb-4">
							<input type="checkbox" class="form-check-input" name="open_website" id="open_website" value="1">
							<label class="form-check-label" for="open_website">Is open Out of Website/App</label>
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
	$("#name").keyup(function() {
		var Text = $(this).val();
		Text = Text.toLowerCase();
		Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
		$("#slug").val(Text);        
	});
</script>
@endsection