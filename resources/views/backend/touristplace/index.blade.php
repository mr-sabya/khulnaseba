@extends('backend.layouts.base')

@section('title', 'All Tourist Place')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Tourist Place List</h4>
				<a href="{{ route('admin.touristplace.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Tourist Place</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Type</th>
								<th>District</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Type</th>
								<th>District</th>
								<th>Image</th>
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
			url: "{{ route('admin.touristplace.index') }}",
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
			data: 'address',
			name: 'address'
		},
		{
			data: 'phone',
			name: 'phone'
		},
		{
			data: 'type',
			name: 'type'
		},
		{
			data: 'district',
			name: 'district'
		},
		{
			data: 'image',
			name: 'image',
			render: function(data, type, full, meta){
				return "<img src='{{ URL::to('/') }}/images/tourist-place/" + data + "' width='120' class='img-thumbnail' />";
			},
			orderable: false
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