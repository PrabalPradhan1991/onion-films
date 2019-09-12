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
						<a href="{{ route('admin-slider-create-get') }}" class="btn btn-primary btn-round ml-auto">
							<i class="fa fa-plus"></i>
							 Create Slider
						</a>
					</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="subscriptionrequest">
						<h1>Slider List</h1>
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
								<th>Asset</th>
								<th>Type</th>
								<th>Link</th>
								<th>Intro Text</th>
								<th>Is Active</th>
								<th style="width: 100px">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $index => $d)
								<tr>
									<td>{{ $index + 1 }}</td>
									@if(strpos($d->mime, 'video') !== false)
										<td>
											<video width="320" height="240" controls>
  												<source src="{{ route('get-asset', ['slider', $d->asset]) }}" type="video/mp4">
  											</video>
										</td>
									@else
										<td><img src="{{ route('get-asset', ['slider', $d->asset]) }}" height=150px width="auto"></td>
									@endif
									<td>{{ $d->mime }}</td>
									<td>{{ $d->link }}</td>
									<td>{{ $d->intro_text }}</td>
									<td>{{ $d->is_active }}</td>
									<td>
										<div class="form-button-action">
											
											<a href="#" title="Delete" class="a_submit_button btn btn-danger" data-original-title="Delete" related-id="delete-{{ $d->id }}">
												<i class="fa fa-trash"></i>
											</a>
											<a href="{{ route('admin-slider-edit-get', $d->id) }}" title="Edit" data-original-title="Edit" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
											<form method="post" action="{{ route('admin-slider-delete-post', $d->id) }}" class="prabal-confirm" id="delete-{{$d->id}}">
												{{ csrf_field() }}
											</form>
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