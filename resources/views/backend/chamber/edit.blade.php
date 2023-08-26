@extends('backend.layouts.base')

@section('title', 'Edit Chamber')

@section('content')
<div class="row">
    
    <div class="col-lg-6">
        <div class="card">
        <div class="card-header">
                <h4 class="card-title">Edit Chamber</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.chamber.update', $chamber->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="hospital_id">Hospital</label>
                        <select class="form-control single-select" id="hospital_id" name="hospital_id">
                            <option value="" selected disabled>--select hospital--</option>
                            @foreach($hospitals as $hospital)
                            <option value="{{ $hospital->id }}" {{ $chamber->hospital_id == $hospital->id ? 'selected' : '' }}>{{ $hospital->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('hospital_id'))
                        <small style="color: red">{{ $errors->first('hospital_id') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" class="form-control" name="time" id="time" value="{{ $chamber->time }}">
                        @if($errors->has('time'))
                        <small style="color: red">{{ $errors->first('time') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone_1">Serial Phone Number</label>
                        <input type="text" class="form-control" name="phone_1" id="phone_1" value="{{ $chamber->phone_1 }}">
                        @if($errors->has('phone_1'))
                        <small style="color: red">{{ $errors->first('phone_1') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_2">Serial Phone Number</label>
                        <input type="text" class="form-control" name="phone_2" id="phone_2" value="{{ $chamber->phone_2 }}">
                        @if($errors->has('phone_2'))
                        <small style="color: red">{{ $errors->first('phone_2') }}</small>
                        @endif
                    </div>

                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

</div>



@endsection

@section('scripts')

@endsection