@extends('frontend.main')

@section('content')

	<form method="post">
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" required="">
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" required="">
		</div>

		<input type="submit" class="btn btn-flat btn-success" value="Login">
		{{ csrf_field() }}
	</form>

@stop