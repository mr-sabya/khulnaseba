@extends('backend.layouts.base')

@section('title', 'All Bus Counter')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Bus Counter List</h4>
				<a href="{{ route('admin.buscounter.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Bus Counter</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Counter</th>
								<th>Phone</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>#</th>
								<th>Counter</th>
								<th>Phone</th>
								<th>Address</th>
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
			url: "{{ route('admin.buscounter.index') }}",
		},
		columns:[
		{ 
			data: 'DT_RowIndex',
			name: 'DT_RowIndex',
			orderable: false,
			searchable: false 
		},
		{
			data: 'counter',
			name: 'counter'
		},
		{
			data: 'phone',
			name: 'phone'
		},
		{
			data: 'address',
			name: 'address'
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