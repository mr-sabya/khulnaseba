@extends('backend.layouts.base')

@section('title', 'All Course')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Course List</h4>
				<a href="{{ route('admin.course.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Course</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>Name</th>
								<th>Category</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>Name</th>
								<th>Category</th>
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
			url: "{{ route('admin.course.index') }}",
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
				return "<img src='{{ URL::to('/') }}/images/course/" + data + "' width='120' class='img-thumbnail' />";
			},
			orderable: false
		},
		{
			data: 'title',
			name: 'title'
		},
		{
			data: 'category',
			name: 'category'
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