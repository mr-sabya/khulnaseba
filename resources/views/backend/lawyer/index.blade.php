@extends('backend.layouts.base')

@section('title', 'All Lawyer')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Lawyer List</h4>
				<a href="{{ route('admin.lawyer.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Lawyer</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Department</th>
								<th>City</th>
								<th>District</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Department</th>
								<th>City</th>
								<th>District</th>
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
	$('#dataTable').DataTable({
		processing: true,
		serverSide: true,
		ajax:{
			url: "{{ route('admin.lawyer.index') }}",
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
			data: 'phone',
			name: 'phone'
		},
		{
			data: 'department',
			name: 'department'
		},
		{
			data: 'city',
			name: 'city'
		},
		{
			data: 'district',
			name: 'district'
		},
		{
			data: 'action',
			name: 'action',
			orderable: false
		}
		]
	});


</script>
@endsection