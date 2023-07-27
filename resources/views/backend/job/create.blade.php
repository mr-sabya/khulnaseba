@extends('backend.layouts.base')

@section('title', 'Add Job')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Job</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.job.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="details">Details</label>
							<textarea type="text" class="form-control details" name="details" id="details">{!! old('details') !!}</textarea>
							@if($errors->has('details'))
							<small style="color: red">{{ $errors->first('details') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="link">Link</label>
							<input type="text" class="form-control" name="link" id="link" value="{{ old('link') }}">
							@if($errors->has('link'))
							<small style="color: red">{{ $errors->first('link') }}</small>
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