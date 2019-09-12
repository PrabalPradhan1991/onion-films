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
						<a href="{{ route('admin-portfolio-list') }}" class="btn btn-primary btn-round ml-auto">
							<i class="fa fa-list"></i>&nbsp;
							 List Portfolios
						</a>
					</div>	
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscriptionrequest">
							<h3>Edit {{ $data->title }}</h3>
							{{-- <p>( List of users who pay by bank for the subscription appear here. confirm the payment and approve users )</p> --}}
						</div>	
					</div>		
				</div>
			</div>
			<form method="post" enctype="multipart/form-data" class="submit-once">
				<div class="card-body">
					<div class="col-sm-10">
						<div class="form-group">
							<label for="title">Title</label>
							<input id="title" type="text" name="data[title]" class="form-control title" required value="{{ $data->title }}">
							<span class="error-block">	@if($errors->has('title'))
								@foreach($errors->get('title') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="client">Client</label>
							<input id="client" type="text" name="data[client]" class="form-control client" required value="{{ $data->client }}">
							<span class="error-block">	@if($errors->has('client'))
								@foreach($errors->get('client') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="service_id">Service</label><br/>
							<div class="row" >
							@foreach(\App\Http\Controllers\CoreModules\Service\ServiceModel::orderby('service', 'ASC')->get() as $s)
								<div class="col-md-6">
									<input type="checkbox" name="service_id[]" value="{{ $s->id }}" @if(in_array($s->id, $services)) checked @endif>{{ $s->service }}
								</div>
							@endforeach
							<div class="col-md-12 note">If none is selected, the project will be categorized as Uncategorized</div>
							</div>
						</div>

						<div class="form-group">
							<label for="portfolio_date">Date</label>
							<input id="portfolio_date" type="text" name="data[portfolio_date]" class="date form-control portfolio_date" required value="{{ $data->portfolio_date }}">
							<span class="error-block">	@if($errors->has('portfolio_date'))
								@foreach($errors->get('portfolio_date') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="website">Website</label>
							<input id="website" type="text" name="data[website]" class="form-control website" value="{{ $data->website }}">
							<span class="error-block">	@if($errors->has('website'))
								@foreach($errors->get('website') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="short_description">Short Description</label>
							<textarea name="data[short_description]" class="form-control" rows="5">{{ $data->short_description }}</textarea>
							
							<span class="error-block">	@if($errors->has('short_description'))
								@foreach($errors->get('short_description') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="long_description">Long Description</label>
							<textarea name="data[long_description]" class="form-control" rows="5">{{ $data->long_description }}</textarea>
							
							<span class="error-block">	@if($errors->has('long_description'))
								@foreach($errors->get('long_description') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="ordering">Ordering</label>
							<input id="ordering" type="number" name="data[ordering]" step=1 min=0 class="form-control ordering" value="{{ $data->ordering }}" required>
							@if($errors->has('ordering'))
								@foreach($errors->get('ordering') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
						</div>


					</div>	
				</div>
			{{ csrf_field() }}
				<div class="card-action">
					<div class="col-sm-5">				
						<button type="submit" class="btn btn-success">Submit</button>
					</div>	
				</div>
			</form>
		</div>
	</div>
</div>	
@stop

@section('custom-js')
	
@stop