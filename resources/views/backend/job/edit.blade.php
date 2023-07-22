@extends('backend.layouts.base')

@section('title', 'Edit Job')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Job</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.job.update', $job->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name"  value="{{ $job->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="details">Ddetails</label>
							<input type="text" class="form-control" name="details" id="details" value="{{ $job->details }}">
							@if($errors->has('details'))
							<small style="color: red">{{ $errors->first('details') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="link">Link</label>
							<input type="text" class="form-control" name="link" id="link" value="{{ $job->link }}">
							@if($errors->has('link'))
							<small style="color: red">{{ $errors->first('link') }}</small>
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
	$("#name").keyup(function() {
		var Text = $(this).val();
		Text = Text.toLowerCase();
		Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
		$("#slug").val(Text);        
	});
</script>
@endsection