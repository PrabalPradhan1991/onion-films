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
							<h3>Contact Us</h3>
							{{-- <p>( List of users who pay by bank for the subscription appear here. confirm the payment and approve users )</p> --}}
						</div>	
					</div>		
				</div>
			</div>
			<form method="post" enctype="multipart/form-data" class="submit-once">
				<div class="card-body">
					<div class="col-sm-10">
						<div class="form-group">
							<label for="more_info">More Info</label>
							<textarea id="more_info" name="data[more_info]" class="form-control more_info">{{ str_replace("<br />", "\n", $data->more_info) }}</textarea>
							<span class="error-block">	@if($errors->has('more_info'))
								@foreach($errors->get('more_info') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="email">Email</label>
							<input id="email" type="email" name="data[email]" class="form-control email" value="{{ $data->email }}" required>
							<span class="error-block">	@if($errors->has('email'))
								@foreach($errors->get('email') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="address">Address</label>
							<textarea id="address" type="text" name="data[address]" class="form-control address">{{ str_replace("<br />", "\n", $data->address) }}</textarea>
							<span class="error-block">	@if($errors->has('address'))
								@foreach($errors->get('address') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="landline">Landline</label>
							<input id="landline" type="text" name="data[landline]" class="form-control landline" value="{{ $data->landline }}">
							<span class="error-block">	@if($errors->has('landline'))
								@foreach($errors->get('landline') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="mobile">Mobile</label>
							<input id="mobile" type="text" name="data[mobile]" class="form-control mobile" value="{{ $data->mobile }}">
							<span class="error-block">	@if($errors->has('mobile'))
								@foreach($errors->get('mobile') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="business_hours">Business Hours</label>
							<textarea id="business_hours" type="text" name="data[business_hours]" class="form-control business_hours">{{ str_replace("<br />", "\n", $data->business_hours) }}</textarea>
							<span class="error-block">	@if($errors->has('business_hours'))
								@foreach($errors->get('business_hours') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="fax">Fax</label>
							<input id="fax" type="text" name="data[fax]" class="form-control fax" value="{{ $data->fax }}">
							<span class="error-block">	@if($errors->has('fax'))
								@foreach($errors->get('fax') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="google_map">Google Map</label>
							<input id="google_map" type="text" name="data[google_map]" class="form-control google_map" value="{{ $data->google_map }}" required>
							<span class="error-block">	@if($errors->has('google_map'))
								@foreach($errors->get('google_map') as $e)
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