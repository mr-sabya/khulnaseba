@extends('backend.layouts.base')

@section('title', 'All Train Ticket')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Train Ticket List</h4>
				<a href="{{ route('admin.trainticket.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Train Ticket</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Route</th>
								<th>Train</th>
								<th>Class</th>
								<th>Amount</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>#</th>
								<th>Route</th>
								<th>Train</th>
								<th>Class</th>
								<th>Amount</th>
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
			url: "{{ route('admin.trainticket.index') }}",
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
			data: 'train',
			name: 'train'
		},
		{
			data: 'class',
			name: 'class'
		},
		{
			data: 'amount',
			name: 'amount'
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