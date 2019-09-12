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
						<a href="{{ route('admin-our-team-list') }}" class="btn btn-primary btn-round ml-auto">
							<i class="fa fa-list"></i>&nbsp;
							 List Team
						</a>
					</div>	
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscriptionrequest">
							<h3>Create Team Member</h3>
							{{-- <p>( List of users who pay by bank for the subscription appear here. confirm the payment and approve users )</p> --}}
						</div>	
					</div>		
				</div>
			</div>
			<form method="post" enctype="multipart/form-data" class="submit-once">
				<div class="card-body">
					<div class="col-sm-10">
						<div class="form-group">
							<label for="name">Name</label>
							<input id="name" type="text" name="data[name]" class="form-control name" required value="{{ request()->old('data.name') }}">
							<span class="error-block">	@if($errors->has('name'))
								@foreach($errors->get('name') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="asset">Picture</label>
							<input type="file" name="data[asset]" accept="image/png, image/webp, image/jpeg" required>
							<span class="error-block">	@if($errors->has('asset'))
								@foreach($errors->get('asset') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="position">Position</label>
							<input id="position" type="text" name="data[position]" class="form-control position" required value="{{ request()->old('data.position') }}">
							<span class="error-block">	@if($errors->has('position'))
								@foreach($errors->get('position') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="data[description]" class="form-control" rows="5" required>{{ request()->old('data.description') }}</textarea>
							
							<span class="error-block">	@if($errors->has('description'))
								@foreach($errors->get('description') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="ordering">Ordering</label>
							<input id="ordering" type="number" name="data[ordering]" step=1 min=0 class="form-control ordering" value="{{ \App\Http\Controllers\HelperController::getOrdering('\App\Http\Controllers\CoreModules\OurTeam\OurTeamModel', 'ordering') }}" required>
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