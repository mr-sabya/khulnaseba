@extends('backend.layouts.base')

@section('title', 'All Plane Ticket Counters')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Plane Ticket Counters List</h4>
				<a href="{{ route('admin.plane-ticket.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Plane Ticket Counters</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Address</th>
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
								<th>Address</th>
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
			url: "{{ route('admin.plane-ticket.index') }}",
		},
		columns:[
		{ 
			data: 'DT_RowIndex',
			name: 'DT_RowIndex',
			orderable: false,
			searchable: false 
		},
		{
			data: 'route',
			name: 'route'
		},
		{
			data: 'airline',
			name: 'airline'
		},
		{
			data: 'business_price',
			name: 'business_price'
		},
		{
			data: 'economic_price',
			name: 'economic_price'
		},
		{
			data: 'air_time',
			name: 'air_time'
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