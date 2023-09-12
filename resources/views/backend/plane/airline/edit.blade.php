@extends('backend.layouts.base')

@section('title', 'Edit Airline')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Airline</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.airline.update', $airline->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $airline->name }}">
							@if($errors->has('name'))
							<small style="color: red">{{ $errors->first('name') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="slug">Slug</label>
							<input type="text" class="form-control" name="slug" id="slug" value="{{ $airline->slug }}">
							@if($errors->has('slug'))
							<small style="color: red">{{ $errors->first('slug') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="link">Details</label>
							<textarea name="details" id="details" class="form-control details" cols="30" rows="10">{!! $airline->details !!}</textarea>
							@if($errors->has('details'))
							<small style="color: red">{{ $errors->first('details') }}</small>
							@endif
						</div>

						<div class="form-group text-center">
							<img src="{{ url('images/airline', $airline->image)}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
						</div>

						<div class="form-group">
							<label for="image">Image (400*300px)</label>
							<input type="file" class="form-control" name="image" id="image">
							@if($errors->has('image'))
							<small style="color: red">{{ $errors->first('image') }}</small>
							@endif
						</div>


						<div class="form-group">
							<label for="country">Countries</label>
							<select class="form-control multiple-select" id="country" name="country[]" multiple>
								@foreach($countries as $country)
								<option value="{{ $country->id }}" {{ $airline->get_country($country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
								@endforeach
							</select>
							@if($errors->has('country'))
							<small style="color: red">{{ $errors->first('country') }}</small>
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

	$(".multiple-select").select2({
        placeholder: "-- select country --"
    });
</script>
@endsection