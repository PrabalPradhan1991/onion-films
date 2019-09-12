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
						<a href="{{ route('admin-slider-list') }}" class="btn btn-primary btn-round ml-auto">
							<i class="fa fa-list"></i>&nbsp;
							 List Slider
						</a>
					</div>	
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscriptionrequest">
							<h3>Edit Asset</h3>
						</div>	
					</div>		
				</div>
			</div>
			<form method="post" enctype="multipart/form-data" class="submit-once">
				<div class="card-body">
					<div class="col-sm-10">
						<div class="form-group">
							<label for="asset">Asset</label>
							@if(strpos($data->mime, 'video') !== false)
								<a href="{{ route('get-asset', ['slider', $data->asset]) }}" target="_blank">{{ $data->asset }}</a>
							@else
								<img src="{{ route('get-asset', ['slider', $data->asset]) }}" height=150px width="auto">
							@endif
							<br/>
							<input id="asset" type="file" name="data[asset]" class="form-control asset" accept="image/jpg, image/png, image/webp, video/webm, video/mp4">
							<span class="error-block">	@if($errors->has('asset'))
								@foreach($errors->get('asset') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="intro_text">Intro Text</label>
							<textarea name="data[intro_text]" class="form-control" rows="5">{{ $data->intro_text }}</textarea>
							
							<span class="error-block">	@if($errors->has('intro_text'))
								@foreach($errors->get('intro_text') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="link">Link</label>
							<input id="link" type="text" name="data[link]" class="form-control link" value="{{ $data->link }}">
							@if($errors->has('link'))
								@foreach($errors->get('link') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
						</div>

						<div class="form-group">
							<label for="is_active">Is Active</label>
							<select class="form-control" name="data[is_active]" required="">
								<option value="">-- Select --</option>
								<option value="yes" @if($data->is_active) == 'yes') selected @endif>Yes</option>
								<option value="no" @if($data->is_active) == 'no') selected @endif>No</option>
							</select>
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