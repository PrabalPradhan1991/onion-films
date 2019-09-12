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
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscriptionrequest">
							<h3>How We Work</h3>
							{{-- <p>( List of users who pay by bank for the subscription appear here. confirm the payment and approve users )</p> --}}
						</div>	
					</div>		
				</div>
			</div>
			<form method="post" enctype="multipart/form-data" class="submit-once">
				<div class="card-body">
					<div class="col-sm-10">
						</div>

						<div class="form-group">
							<label for="link">Video Embed Link</label>
							<input id="link" type="text" name="data[link]" class="form-control link" value="{{ $data->link }}" required>
							<span class="error-block">	@if($errors->has('link'))
								@foreach($errors->get('link') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="first">First Word</label>
							<input id="first" type="text" name="data[first]" class="form-control first" value="{{ $data->first }}" required>
							<span class="error-block">	@if($errors->has('first'))
								@foreach($errors->get('first') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="second">Second Word</label>
							<input id="second" type="text" name="data[second]" class="form-control second" value="{{ $data->second }}" required>
							<span class="error-block">	@if($errors->has('second'))
								@foreach($errors->get('second') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						@if($data->asset)
							<img src="{{ route('get-asset', ['how-we-work', $data->asset]) }}" height="150px">
						@endif

						<div class="form-group">
							<label for="asset">Background Image</label>
							<input id="asset" type="file" name="data[asset]" class="form-control asset" value="{{ $data->asset }}" accept="image/jpg, image/png, image/webp">
							<span class="error-block">	@if($errors->has('asset'))
								@foreach($errors->get('asset') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
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