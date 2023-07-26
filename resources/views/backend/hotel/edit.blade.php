@extends('backend.layouts.base')

@section('title', 'Edit Hotel')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Hotel</h4>

            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('admin.hotel.update', $hotel->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $hotel->name }}">
                            @if($errors->has('name'))
                            <small style="color: red">{{ $errors->first('name') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $hotel->phone }}">
                            @if($errors->has('phone'))
                            <small style="color: red">{{ $errors->first('phone') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ $hotel->address }}">
                            @if($errors->has('address'))
                            <small style="color: red">{{ $errors->first('address') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="star">Star</label>
                            <input type="number" class="form-control" name="star" id="star" value="{{ $hotel->star }}">
                            @if($errors->has('star'))
                            <small style="color: red">{{ $errors->first('star') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea class="form-control" name="details" id="details">{{ $hotel->details }}</textarea>
                            @if($errors->has('details'))
                            <small style="color: red">{{ $errors->first('details') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="district_id">District</label>
                            <select class="form-control single-select" id="district_id" name="district_id">
                                <option value="" selected disabled>--select district--</option>
                                @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ $hotel->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('district_id'))
                            <small style="color: red">{{ $errors->first('district_id') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="city_id">City</label>
                            <select class="form-control single-select" id="city_id" name="city_id">
                                <option value="" selected disabled>--select city--</option>
                                @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ $hotel->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('city_id'))
                            <small style="color: red">{{ $errors->first('city_id') }}</small>
                            @endif
                        </div>

                        <div class="form-group text-center">
                            @if($hotel->image == null)
                            <img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                            @else
                            <img src="{{ url('images/hotel', $hotel->image)}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image">Image (480*320px)</label>
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