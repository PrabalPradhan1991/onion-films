@extends('backend.main')

@section('content')

<style type="text/css">
	.subscriptionrequest{text-align: center; margin-top: 20px; }
	.subscriptionrequest h1{color:#0E4F88; font-size:36px; border-bottom: 2px #0E4F88 solid; padding-bottom: 10px;}
		.subscriptionrequest p{font-size: 16px; font-weight: bold;}

</style>
<div class="row sierra-row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
					<div class="d-flex align-items-center">
						<a href="{{ route('admin-portfolio-create-get') }}" class="btn btn-primary btn-round ml-auto">
							<i class="fa fa-plus"></i>
							 Create Portfolio
						</a>
					</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="subscriptionrequest">
						<h1>Portfolio List</h1>
						{{-- <p>( List of users who pay by bank for the subscription appear here. confirm the payment and approve users )</p> --}}
					</div>	
				</div>		
			</div>

			<div class="card-body">
				@if(!empty($data))
				<div class="table-responsive">
					<table id="add-row" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 10px">Sn</th>
								<th>Title</th>
								<th>Client</th>
								<th>Date</th>
								<th>Featured</th>
								<th>Ordering</th>
								<th style="width: 100px">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $index => $d)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $d->title }}</td>
									<td>{{ $d->client }}</td>
									<td>{{ \App\Http\Controllers\HelperController::changeDateFormat($d->portfolio_date, 'Y-m-d') }}</td>
									<td>{{ $d->is_featured }}</td>
									<td>{{ $d->ordering }}</td>
									<td>
										<div class="form-button-action">

											<a href="{{ route('admin-portfolio-asset-list', $d->id) }}" title="View Assets" data-original-title="View Assets" class="btn btn-info"><i class="fa fa-eye"></i></a>

											<a href="#" title="Delete" class="a_submit_button btn btn-danger" data-original-title="Delete" related-id="delete-{{ $d->id }}">
												<i class="fa fa-trash"></i>
												<form method="post" action="{{ route('admin-portfolio-delete-post', $d->id) }}" class="prabal-confirm" id="delete-{{$d->id}}">
													{{ csrf_field() }}
												</form>
											</a>

											@if($d->is_featured == 'yes')
												<a href="#" title="Unfeature" class="a_submit_button btn btn-default" data-original-title="Unfeature" related-id="unfeature-{{ $d->id }}">
													<i class="far fa-star"></i>
													<form method="post" action="{{ route('admin-portfolio-unfeature-portfolio-post', $d->id) }}" class="prabal-confirm" id="unfeature-{{$d->id}}">
														{{ csrf_field() }}
													</form>
												</a>
											@else
												<a href="#" title="Feature" class="a_submit_button btn btn-success" data-original-title="Feature" related-id="feature-{{ $d->id }}">
													<i class="fas fa-star"></i>
													<form method="post" action="{{ route('admin-portfolio-feature-portfolio-post', $d->id) }}" class="prabal-confirm" id="feature-{{$d->id}}">
														{{ csrf_field() }}
													</form>
												</a>
											@endif

											<a href="{{ route('admin-portfolio-edit-get', $d->id) }}" title="Edit" data-original-title="Edit" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										</div>			
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@else
					<div class="row">
						<div class="col-md-12">
							No data found
						</div>
					</div>
				@endif

				{{-- {{ $data->appends($input)->links() }} --}}
			</div>
		</div>
	</div>
</div>			
@stop
@section('custom-js')

@stop