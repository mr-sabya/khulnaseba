@extends('backend.layouts.base')

@section('title', 'Edit Doctor')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Doctor</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('admin.doctor.update', $doctor->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $doctor->name }}">
                            @if($errors->has('name'))
                            <small style="color: red">{{ $errors->first('name') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="degree">Degree</label>
                            <input type="text" class="form-control" name="degree" id="degree" value="{{ $doctor->degree }}">
                            @if($errors->has('degree'))
                            <small style="color: red">{{ $errors->first('degree') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" name="designation" id="designation" value="{{ $doctor->designation }}">
                            @if($errors->has('designation'))
                            <small style="color: red">{{ $errors->first('designation') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="hospital">Hospital</label>
                            <input type="text" class="form-control" name="hospital" id="hospital" value="{{ $doctor->hospital }}">
                            @if($errors->has('hospital'))
                            <small style="color: red">{{ $errors->first('hospital') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="bmdc_no">BMDC No</label>
                            <input type="text" class="form-control" name="bmdc_no" id="bmdc_no" value="{{ $doctor->bmdc_no }}">
                            @if($errors->has('bmdc_no'))
                            <small style="color: red">{{ $errors->first('bmdc_no') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea class="form-control" name="details" id="details">{{ $doctor->details }}</textarea>
                            @if($errors->has('details'))
                            <small style="color: red">{{ $errors->first('details') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="type_id">Doctor Type</label>
                            <select class="form-control single-select" id="type_id" name="type_id">
                                <option value="" selected disabled>--select doctor type--</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ $doctor->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
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
                                <option value="{{ $district->id }}" {{ $doctor->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
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
                                <option value="{{ $city->id }}" {{ $doctor->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('city_id'))
                            <small style="color: red">{{ $errors->first('city_id') }}</small>
                            @endif
                        </div>

                        <div class="form-group text-center">
                            @if($doctor->image == null)
                            <img src="{{ url('assets/backend/images/default_image.png')}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                            @else
                            <img src="{{ url('images/doctor', $doctor->image)}}" id="imgPreview" style="width: 300px;border: 1px solid #eaeaea;">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image">Image (300*300px)</label>
                            <input type="file" class="form-control" name="image" id="image">
                            @if($errors->has('image'))
                            <small style="color: red">{{ $errors->first('image') }}</small>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="hospitals">Hospitals</label>
                            <select class="form-control multiple-select" id="hospitals" name="hospitals[]" multiple>
                                @foreach($hospitals as $hospital)
                                <option value="{{ $hospital->id }}" {{ $doctor->get_hospital($hospital->id) ? 'selected' : ''}}>{{ $hospital->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hospitals'))
                            <small style="color: red">{{ $errors->first('hospitals') }}</small>
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
    $(".multiple-select").select2({
        placeholder: "-- select hospitals --"
    });
</script>
@endsection