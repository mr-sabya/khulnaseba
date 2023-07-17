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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.chamber.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <small style="color: red">{{ $errors->first('name') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                        @if($errors->has('phone'))
                        <small style="color: red">{{ $errors->first('phone') }}</small>
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

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="display w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($chambers as $chamber)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $chamber->name }}</td>
                                <td>{{ $chamber->phone }}</td>
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form id="deleteForm" action="" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h3 class="text-center">Do you want to delete this Doctor?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $('#dataTable').DataTable();

    $(document).on('click', '.delete', function() {
        var route = $(this).attr('data-route');
        $('#deleteForm').attr('action', route);
        $('#deleteModal').modal('show');
    });
</script>
@endsection