@extends('backend.layouts.base')

@section('title', 'All Story')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Story List</h4>
				<a href="{{ route('admin.story.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Story</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Category</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>#</th>
								<th>Title</th>
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
			url: "{{ route('admin.story.index') }}",
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