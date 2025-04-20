@extends('backend.layouts.base')

@section('title', 'Edit Journalist Category')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Journalist Category</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.journalist-category.update', $category->id) }}" method="post">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div> 

						<div class="form-group">
							<label for="slug">Slug</label>
							<input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }}">
							@if($errors->has('slug'))
							<small style="color: red">{{ $errors->first('slug') }}</small>
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