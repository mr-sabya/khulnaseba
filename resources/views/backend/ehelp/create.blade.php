@extends('backend.layouts.base')

@section('title', 'Add E-Help')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add E-Help</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.ehelp.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="website">Website</label>
							<input type="text" class="form-control" name="website" id="website" value="{{ old('website') }}">
							@if($errors->has('website'))
							<small style="color: red">{{ $errors->first('website') }}</small>
							@endif
						</div>

						<div class="form-group text-center">
							<img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
						</div>

						<div class="form-group">
							<label for="logo">Logo (400*200px)</label>
							<input type="file" class="form-control" name="logo" id="logo">
							@if($errors->has('logo'))
							<small style="color: red">{{ $errors->first('logo') }}</small>
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