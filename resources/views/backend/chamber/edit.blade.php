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
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $chamber->name }}">
                        @if($errors->has('name'))
                        <small style="color: red">{{ $errors->first('name') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $chamber->phone }}">
                        @if($errors->has('phone'))
                        <small style="color: red">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ $chamber->address }}">
                        @if($errors->has('address'))
                        <small style="color: red">{{ $errors->first('address') }}</small>
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