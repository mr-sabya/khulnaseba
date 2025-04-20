@extends('backend.layouts.base')

@section('title', 'Edit Tourist Place')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Tourist Place</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('admin.touristplace.update', $touristplace->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $touristplace->name }}">
                            @if($errors->has('name'))
                            <small style="color: red">{{ $errors->first('name') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ $touristplace->address }}">
                            @if($errors->has('address'))
                            <small style="color: red">{{ $errors->first('address') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $touristplace->phone }}">
                            @if($errors->has('phone'))
                            <small style="color: red">{{ $errors->first('phone') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="type_id">place Type</label>
                            <select class="form-control single-select" id="type_id" name="type_id">
                                <option value="" selected disabled>--select place type--</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ $touristplace->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type_id'))
                            <small style="color: red">{{ $errors->first('type_id') }}</small>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="district_id">District</label>
                            <select class="form-control single-select" id="district_id" name="district_id">
                                <option value="" selected disabled>--select district--</option>
                                @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ $touristplace->district_id = $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('district_id'))
                            <small style="color: red">{{ $errors->first('district_id') }}</small>
                            @endif
                        </div>


                        <div class="form-group text-center">
                            @if($touristplace->image == null)
                            <img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                            @else
                            <img src="{{ url('images/tourist-place', $touristplace->image)}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image">Image (400*300px)</label>
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

@endsection