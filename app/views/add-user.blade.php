@extends('layouts.master')

@section('container')
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<h1>Add User</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				{{Form::open(array(
					'url' => 'user/add',
					'id' => 'add-user-form'
				))}}
					
					<!-- <div class="row">
						<div class="col-md-12">
							<h2>Profile</h2>
						</div>
					</div> -->
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label for="first-name">First Name</label>
								<input id="first-name" class="form-control" name="firstName">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label for="last-name">Last Name</label>
								<input id="last-name" class="form-control" name="lastName" type="text">
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="email">Email</label>
								<input id="email" class="form-control" name="email" type="email">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label for="phone1">Phone number 1</label>
								<input id="phone1" class="form-control" name="phone1" type="text">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label for="phone2">Phone number 2</label>
								<input id="phone2" class="form-control" name="phone2" type="text">
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="address-line-1">Address Line 1</label>
								<input id="address-line-1" class="form-control" name="addressLine1" type="text">
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="address-line-2">Address Line 2 (Optional)</label>
								<input id="address-line-2" class="form-control" name="addressLine2" type="text">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label for="city">City</label>
								<input id="city" class="form-control" name="city" type="text">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label for="postal-code">Postal Code</label>
								<input id="postal-code" class="form-control" name="postalCode" type="text">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="add-user-type">User Type</label>
								<select class="form-control" id="add-user-type" name="userType">
									<option val="def" selected disabled>Select User Type</option>
									<option val="1">Ref</option>
									<option val="2">Admin</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<h2>Divisions</h2>
								<table class="table">
									<thead>
										<tr>
											<th colspan="3">
												<label for="check-all-divisions">
													<input id="check-all-divisions" class="division-check" name="checkAllDivisions" type="checkbox"> Check All
												</label>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<label>
													<input class="division-check" name="divisions[]" value="1" type="checkbox"> U-15 Boys Gold
												</label>
											</td>
											<td>
												<label>
													<input class="division-check" name="divisions[]" value="2" type="checkbox"> U-14 Boys Gold
												</label>
											</td>
											<td>
												<label>
													<input class="division-check" name="divisions[]" value="3" type="checkbox"> U-13 Boys Gold
												</label>
											</td>
										</tr>
										<tr>
											<td>
												<label>
													<input class="division-check" name="divisions[]" value="4" type="checkbox"> U-15 Girls Gold
												</label>
											</td>
											<td>
												<label>
													<input class="division-check" name="divisions[]" value="5" type="checkbox"> U-14 Girls Gold
												</label>
											</td>
											<td>
												<label>
													<input class="division-check" name="divisions[]" value="6" type="checkbox"> U-13 Girls Gold
												</label>
											</td>
										</tr>
									</tbody>	
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button id="add-user-btn" class="btn btn-success form-submit-btn" type="submit">Add User</button>
						</div>
					</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
@stop