@extends('backend.layouts.base')

@section('title', 'All Business Idea')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Business Idea List</h4>
				<a href="{{ route('admin.businessidea.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Business Idea</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Type</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Type</th>
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
			url: "{{ route('admin.businessidea.index') }}",
		},
		columns:[
		{ 
			data: 'DT_RowIndex',
			name: 'DT_RowIndex',
			orderable: false,
			searchable: false 
		},
		{
			data: 'title',
			name: 'title'
		},
		{
			data: 'type',
			name: 'type'
		},
		{
			data: 'image',
			name: 'image',
			render: function(data, type, full, meta){
				return "<img src='{{ URL::to('/') }}/images/business-idea/" + data + "' width='120' class='img-thumbnail' />";
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