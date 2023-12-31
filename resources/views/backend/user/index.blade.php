@extends('backend.layouts.base')

@section('title', 'All Users')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Users List</h4>
				<a href="{{ route('admin.user.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Users</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Role</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Role</th>
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
					<h3 class="text-center">Do you want to delete this Newspaper?</h3>
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
	$('#dataTable').DataTable({
		processing: true,
		serverSide: true,
		ajax:{
			url: "{{ route('admin.user.index') }}",
		},
		columns:[
		{ 
			data: 'DT_RowIndex',
			name: 'DT_RowIndex',
			orderable: false,
			searchable: false 
		},
        {
			data: 'image',
			name: 'image',
			render: function(data, type, full, meta){
				return "<img src={{ URL::to('/') }}/images/newspaper/" + data + " width='120' class='img-thumbnail' />";
			},
			orderable: false
		},
		{
			data: 'name',
			name: 'name'
		},
		{
			data: 'email',
			name: 'email'
		},
		{
			data: 'phone',
			name: 'phone'
		},
		{
			data: 'role',
			name: 'role'
		},
		{
			data: 'action',
			name: 'action',
			orderable: false
		}
		]
	});



	$(document).on('click', '.delete', function () {
		var route = $(this).attr('data-route');
		$('#deleteForm').attr('action', route);
		$('#deleteModal').modal('show');
	});
</script>
@endsection