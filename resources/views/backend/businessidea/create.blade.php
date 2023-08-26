@extends('backend.layouts.base')

@section('title', 'Add Business Idea')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Business Idea</h4>

            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('admin.businessidea.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                            @if($errors->has('title'))
                            <small style="color: red">{{ $errors->first('title') }}</small>
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
                            <label for="details">Details</label>
                            <textarea class="form-control details" name="details" id="details">{!! old('details') !!}</textarea>
                            @if($errors->has('details'))
                            <small style="color: red">{{ $errors->first('details') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="slug">Short Description</label>
                            <textarea name="short_description" id="short_description" class="form-control" cols="30" rows="10">{{ old('short_description') }}</textarea>
                            @if($errors->has('short_description'))
                            <small style="color: red">{{ $errors->first('short_description') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="type_id">Business Type</label>
                            <select class="form-control single-select" id="type_id" name="type_id">
                                <option value="" selected disabled>--select business type--</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type_id'))
                            <small style="color: red">{{ $errors->first('type_id') }}</small>
                            @endif
                        </div>

                        <div class="form-group text-center">
                            <img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                        </div>

                        <div class="form-group">
                            <label for="image">Image (900*600px)</label>
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
    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#slug").val(Text);
    });
</script>
@endsection