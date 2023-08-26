@extends('backend.layouts.base')

@section('title', 'Edit banner')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit banner</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.banner.update', $banner->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Title</label>
							<input type="text" class="form-control" name="title" id="title" value="{{$banner->title }}">
							@if($errors->has('title'))
							<small style="color: red">{{ $errors->first('title') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="text">Text</label>
							<input type="text" class="form-control" name="text" id="text" value="{{ $banner->text }}">
							@if($errors->has('text'))
							<small style="color: red">{{ $errors->first('text') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="link">Link</label>
							<input type="text" class="form-control" name="link" id="link" value="{{ $banner->link }}">
							@if($errors->has('link'))
							<small style="color: red">{{ $errors->first('link') }}</small>
							@endif
						</div>

						<div class="form-group text-center">
							<img src="{{ url('images/banner')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
						</div>

						<div class="form-group">
							<label for="image">Image (900*844px)</label>
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
	$("#name").keyup(function() {
		var Text = $(this).val();
		Text = Text.toLowerCase();
		Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
		$("#slug").val(Text);        
	});
</script>
@endsection