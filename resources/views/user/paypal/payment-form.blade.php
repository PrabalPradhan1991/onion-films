@include('user.include.header')

<div class="container">
	<form method="post" action="{{ route('paypal', $user_id) }}">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Packages</label>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>SN</th>
								<th>Package Name</th>
								<th>Details</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="radio" name="package_price" value="10">1</td>
								<td>1 year Membership</td>
								<td>
									<ul>
										<li>1 year membership</li>
										<li>Unlimited Access to videos</li>
									</ul>
								</td>
								<td>AUD $10</td>
							</tr>
						</tbody>
					</table>
				</div>
			{{ csrf_field() }}
			<input type="submit" class="btn btn-success btn-flat" value="Pay">
		</div>
	</form>

</div>
@include('user.include.footer')
  <script type="text/javascript">
  	/*$('#inlineRadio1').on('click', function(){
  $(this).parent().find('a').trigger('click')
})*/

$('#inlineRadio2').on('click', function(){
  $('#inlineRadio1').click()
  $(this).prop('checked', true)
})

  </script>

</body>