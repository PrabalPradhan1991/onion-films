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
						<a href="{{ route('admin-events-list') }}" class="btn btn-primary btn-round ml-auto">
							<i class="fa fa-list"></i>&nbsp;
							 List Events
						</a>
					</div>	
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscriptionrequest">
							<h3>Create Event</h3>
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
							<input id="title" type="text" name="data[title]" class="form-control title" required value="{{ request()->old('data.title') }}">
							<span class="error-block">	@if($errors->has('title'))
								@foreach($errors->get('title') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="asset">Image</label>
							<input type="file" name="data[asset]" accept="image/png, image/webp, image/jpeg" required>
							<span class="error-block">	@if($errors->has('asset'))
								@foreach($errors->get('asset') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="short_description">Short Description</label>
							<textarea name="data[short_description]" class="form-control" rows="5">{{ request()->old('data.short_description') }}</textarea>
							
							<span class="error-block">	@if($errors->has('short_description'))
								@foreach($errors->get('short_description') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="long_description">Long Description</label>
							<textarea name="data[long_description]" class="form-control" rows="5" required>{{ request()->old('data.long_description') }}</textarea>
							
							<span class="error-block">	@if($errors->has('long_description'))
								@foreach($errors->get('long_description') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="start_date">Start Date</label>
							<input id="start_date" type="text" name="data[start_date]" class="date form-control start_date" required value="{{ request()->old('data.start_date') }}">
							<span class="error-block">	@if($errors->has('start_date'))
								@foreach($errors->get('start_date') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="end_date">End Date</label>
							<input id="end_date" type="text" name="data[end_date]" class="date form-control end_date" required value="{{ request()->old('data.end_date') }}">
							<span class="error-block">	@if($errors->has('end_date'))
								@foreach($errors->get('end_date') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="deadline">Deadline</label>
							<input id="deadline" type="text" name="data[deadline]" class="date form-control deadline" required value="{{ request()->old('data.deadline') }}">
							<span class="error-block">	@if($errors->has('deadline'))
								@foreach($errors->get('deadline') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="event_time">Event Time</label>
							<input id="event_time" type="text" name="data[event_time]" class="form-control event_time" value="{{ request()->old('data.event_time') }}">
							<span class="error-block">	@if($errors->has('event_time'))
								@foreach($errors->get('event_time') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="location">Location</label>
							<input id="location" type="text" name="data[location]" class="form-control location" required value="{{ request()->old('data.location') }}">
							<span class="error-block">	@if($errors->has('location'))
								@foreach($errors->get('location') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="ordering">Ordering</label>
							<input id="ordering" type="number" name="data[ordering]" step=1 min=0 class="form-control ordering" value="{{ \App\Http\Controllers\HelperController::getOrdering('\App\Http\Controllers\CoreModules\Events\EventsModel', 'ordering') }}" required>
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