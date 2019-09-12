@extends('frontend.main')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Client List</h1>
			</div>
		</div>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>SN</th>
					<th>Client</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				@foreach($clients as $index => $c)
				<tr id="client-{{ $c->id }}">
					<td>{{ $index + 1 }}</td>
					<td><b>{{ $c->client }}</b></td>
					<td>{!! nl2br($c->description) !!}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@stop