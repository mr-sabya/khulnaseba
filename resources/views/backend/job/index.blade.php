@extends('backend.layouts.base')

@section('title', 'All Job')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Job List</h4>
				<a href="{{ route('admin.job.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Job</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Details</th>
								<th>Link</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Details</th>
								<th>Link</th>
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
					<h3 class="text-center">Do you want to delete this Job?</h3>
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
	$('#example').DataTable({
		processing: true,
		serverSide: true,
		ajax:{
			url: "{{ route('admin.job.index') }}",
		},
		columns:[
		{ 
			data: 'DT_RowIndex',
			name: 'DT_RowIndex',
			orderable: false,
			searchable: false 
		},
		{
			data: 'name',
			name: 'name'
		},
		{
			data: 'details',
			name: 'details'
		},
		{
			data: 'link',
			name: 'link'
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