@extends('backend.layouts.base')

@section('title', 'All E-Helps')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">E-Help List</h4>
				<a href="{{ route('admin.ehelp.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add E-Help</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Logo</th>
								<th>Name</th>
								<th>Website</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>#</th>
								<th>Logo</th>
								<th>Name</th>
								<th>Website</th>
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
	$('#example').DataTable({
		processing: true,
		serverSide: true,
		ajax:{
			url: "{{ route('admin.ehelp.index') }}",
		},
		columns:[
		{ 
			data: 'DT_RowIndex',
			name: 'DT_RowIndex',
			orderable: false,
			searchable: false 
		},
		{
			data: 'logo',
			name: 'logo',
			render: function(data, type, full, meta){
				return "<img src={{ URL::to('/') }}/images/ehelp/" + data + " width='120' class='img-thumbnail' />";
			},
			orderable: false
		},
		{
			data: 'name',
			name: 'name'
		},
		{
			data: 'website',
			name: 'website'
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