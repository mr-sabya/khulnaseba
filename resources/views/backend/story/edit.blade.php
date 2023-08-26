@extends('backend.layouts.base')

@section('title', 'Edit Story')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Story</h4>
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.story.update', $story->id) }}" method="post">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" name="title" id="title" value="{{ $story->title }}">
							@if($errors->has('title'))
							<small style="color: red">{{ $errors->first('title') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="slug">Slug</label>
							<input type="text" class="form-control" name="slug" id="slug" value="{{ $story->slug }}">
							@if($errors->has('slug'))
							<small style="color: red">{{ $errors->first('slug') }}</small>
							@endif
						</div>

						<div class="form-group">
                            <label for="details">Details</label>
                            <textarea class="form-control" name="details" id="details">{{ $story->details }}</textarea>
                            @if($errors->has('details'))
                            <small style="color: red">{{ $errors->first('details') }}</small>
                            @endif
                        </div>

						<div class="form-group">
							<label for="category_id">Category</label>
							<select class="form-control single-select" id="category_id" name="category_id">
								<option value="" selected disabled>--select district--</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}" {{ $story->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
								@endforeach
							</select>
							@if($errors->has('category_id'))
							<small style="color: red">{{ $errors->first('category_id') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="writer">Writer</label>
							<input type="text" class="form-control" name="writer" id="writer" value="{{ $story->writer }}">
							@if($errors->has('writer'))
							<small style="color: red">{{ $errors->first('writer') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="reference">Reference</label>
							<input type="text" class="form-control" name="reference" id="reference" value="{{ $story->reference }}">
							@if($errors->has('reference'))
							<small style="color: red">{{ $errors->first('reference') }}</small>
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