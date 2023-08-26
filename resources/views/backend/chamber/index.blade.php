@extends('backend.layouts.base')

@section('title', 'Chamber List')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-0">Chamber List of {{ $doctor->name }}</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.chamber.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div class="form-group">
                        <label for="hospital_id">Hospital</label>
                        <select class="form-control single-select" id="hospital_id" name="hospital_id">
                            <option value="" selected disabled>--select hospital--</option>
                            @foreach($hospitals as $hospital)
                            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('hospital_id'))
                        <small style="color: red">{{ $errors->first('hospital_id') }}</small>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" class="form-control" name="time" id="time" value="{{ old('time') }}">
                        @if($errors->has('time'))
                        <small style="color: red">{{ $errors->first('time') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone_1">Serial Phone Number</label>
                        <input type="text" class="form-control" name="phone_1" id="phone_1" value="{{ old('phone_1') }}">
                        @if($errors->has('phone_1'))
                        <small style="color: red">{{ $errors->first('phone_1') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_2">Serial Phone Number</label>
                        <input type="text" class="form-control" name="phone_2" id="phone_2" value="{{ old('phone_2') }}">
                        @if($errors->has('phone_2'))
                        <small style="color: red">{{ $errors->first('phone_2') }}</small>
                        @endif
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="display w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hospital</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($chambers as $chamber)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $chamber->hospital['name'] }}</td>
                                <td>{{ $chamber->time }}</td>
                                <td>
                                    <a href="{{ route('admin.chamber.edit', $chamber->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>
                                    <button type="button" data-route="" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Hospital</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $('#dataTable').DataTable();
</script>
@endsection