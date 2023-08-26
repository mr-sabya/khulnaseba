@extends('backend.layouts.base')

@section('title', 'Add Tourist Place')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Tourist Place</h4>

            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('admin.touristplace.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <small style="color: red">{{ $errors->first('name') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
                            @if($errors->has('address'))
                            <small style="color: red">{{ $errors->first('address') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                            @if($errors->has('phone'))
                            <small style="color: red">{{ $errors->first('phone') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="type_id">Place Type</label>
                            <select class="form-control single-select" id="type_id" name="type_id">
                                <option value="" selected disabled>--select place type--</option>
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
                            <label for="image">Image (300*300px)</label>
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

@endsection