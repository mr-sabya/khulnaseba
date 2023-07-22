@extends('backend.layouts.base')

@section('title', 'Edit E-Help')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit E-Help</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.ehelp.update', $ehelp->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name"  value="{{ $ehelp->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="website">Link</label>
							<input type="text" class="form-control" name="website" id="website" value="{{ $ehelp->website }}">
							@if($errors->has('website'))
							<small style="color: red">{{ $errors->first('website') }}</small>
							@endif
						</div>

						<div class="form-group text-center">
							@if($ehelp->logo == null)
							<img src="{{ url('assets/backend/images/default_image.png') }}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
							@else
							<img src="{{ url('images/ehelp', $ehelp->logo) }}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
							@endif
						</div>

						<div class="form-group">
							<label for="logo">Image (400*200px)</label>
							<input type="file" class="form-control" name="logo" id="logo">
							@if($errors->has('logo'))
							<small style="color: red">{{ $errors->first('logo') }}</small>
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