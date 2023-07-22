@extends('backend.layouts.base')

@section('title', 'Edit Bus')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Bus</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.bus.update', $bus->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $bus->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

					
						<div class="form-group text-center">
                            @if($bus->image == null)
							<img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                            @else
							<img src="{{ url('images/bus', $bus->image)}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                            @endif
						</div>

						<div class="form-group">
							<label for="image">Image (400*200px)</label>
							<input type="file" class="form-control" name="image" id="image">
							@if($errors->has('image'))
							<small style="color: red">{{ $errors->first('image') }}</small>
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