@extends('backend.layouts.base')

@section('title', 'Add Doctor')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Doctor</h4>

            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('admin.doctor.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <small style="color: red">{{ $errors->first('name') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="degree">Degree</label>
                            <input type="text" class="form-control" name="degree" id="degree" value="{{ old('degree') }}">
                            @if($errors->has('degree'))
                            <small style="color: red">{{ $errors->first('degree') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" name="designation" id="designation" value="{{ old('designation') }}">
                            @if($errors->has('designation'))
                            <small style="color: red">{{ $errors->first('designation') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="hospital">Hospital</label>
                            <input type="text" class="form-control" name="hospital" id="hospital" value="{{ old('hospital') }}">
                            @if($errors->has('hospital'))
                            <small style="color: red">{{ $errors->first('hospital') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="bmdc_no">BMDC No</label>
                            <input type="text" class="form-control" name="bmdc_no" id="bmdc_no" value="{{ old('bmdc_no') }}">
                            @if($errors->has('bmdc_no'))
                            <small style="color: red">{{ $errors->first('bmdc_no') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea class="form-control" name="details" id="details"></textarea>
                            @if($errors->has('details'))
                            <small style="color: red">{{ $errors->first('details') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="type_id">Doctor Type</label>
                            <select class="form-control single-select" id="type_id" name="type_id">
                                <option value="" selected disabled>--select doctor type--</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
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
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
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
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('city_id'))
                            <small style="color: red">{{ $errors->first('city_id') }}</small>
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
<script>
    $(".multiple-select").select2({
        placeholder: "-- select hospitals --"
    });
</script>
@endsection