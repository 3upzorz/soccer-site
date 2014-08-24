@extends('layouts.master')

@section('container')
<div id="add-user-modal" class="modal fade" tab-index="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h2 class="modal-title" id="add-user-modal-title">Add User</h2>
			</div>
			{{Form::open(
				array(
					'id'   => 'add-user-form',
					'url'  => 'user/add',
					'role' => 'form'
				)
			)}}
			<div class="modal-body">
				<div class="form-group">
					<label for="username">Username</label>
					<input id="username" class="form-control" type="text" name="username" placeholder="Enter Username"></input>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="first-name">First Name</label>
							<input id="first-name" class="form-control" type="text" name="firstName" placeholder="Enter First Name"></input>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="last-name">Last Name</label>
							<input id="last-name" class="form-control" type="text" name="lastName" placeholder="Enter Last Name"></input>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="password">Temporary Password</label>
							<input id="password" class="form-control" type="password" name="password" placeholder="Enter a password"></input>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="confirm-password">Confirm Temporary Password</label>
							<input id="confirm-password" class="form-control" type="password" name="confirmPassword" placeholder="Confirm password"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<h2>Permissions</h2>
					<p>Please check all of the permissions that apply to the user being created</p>
					<label for="check-all-permissions">
						<input id="check-all-permissions" name="checkAllPermissions" type="checkbox"> Check All
					</label>
					<ul class="permission-list">
						<li>
							<label>
								<input class="permission-check" name="permissions[]" value="1" type="checkbox"> Admin
							</label>
						</li>
						<li>
							<label>
								<input class="permission-check" name="permissions[]" value="2" type="checkbox"> Referee
							</label>
						</li>
						<li>
							<label>
								<input class="permission-check" name="permissions[]" value="3" type="checkbox"> Head Referee
							</label>
						</li>
						<li>
							<label>
								<input class="permission-check" name="permissions[]" value="4" type="checkbox"> Mentor
							</label>
						</li>
						<li>
							<label>
								<input class="permission-check" name="permissions[]" value="5" type="checkbox"> Scheduler
							</label>
						</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button class="btn btn-primary" form="add-user-form" type="submit">Add User</button>
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
<div class="col-md-12">
	<h1>Manage Users</h1>
	<div class="row">
		<div class="col-md-12">
			<button id="add-user-btn" class="btn btn-primary" data-toggle="modal" data-target="#add-user-modal">+ Add User</button>
		</div>
		<div class="col-md-12">
			<h4>Quick Search</h4>
			<form id="user-search-form" class="form-inline" action="" role="form" method="POST">
				<div class="form-group">
					<label class="sr-only" for="userName">Username</label>
					<input type="text" class="form-control" id="search-user-name" name="userName" placeholder="Enter username">
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">@</div>
						<label class="sr-only" for="email">Email</label>
						<input id="search-email" class="form-control" name="email" type="email" placeholder="Enter email">
					</div>
				</div>
				<div class="form-group">
					<label class="sr-only" for="userPermission">Permission</label>
					<select id="search-user-permission" class="form-control" name="userPermission">
						<option value="def" selected disabled>Choose Permission</option>
						<option value="1">Admin</option>
						<option value="2">Referee</option>
						<option value="3">Head Referee</option>
					</select>
				</div>
				<button type="submit" form="user-search-form" class="btn btn-default">Search</button>
			</form>
		</div>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Permissions</th>
				<!-- <th>Age</th> -->
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>thall</td>
				<td>Hall, Trevor</td>
				<td>trevdog55@hotmail.com</td>
				<td>
					<ul class="table-list">
						<li><span class="pre-phone" title="Phone">P:</span> 604-233-9221</li>
						<li><span class="pre-phone" title="Cell">C:</span> 778-327-8694</li>
					</ul>
				</td>
				<td>
					<ul class="table-list">
						<li>Admin</li>
						<li>Referee</li>
					</ul>
				</td>
				<td><a href="#" class="clickable">View</a></td>
				<td>
					<ul class="icon-list">
						<li><span class="glyphicon glyphicon-pencil edit-btn"></span></li>
						<li><span class="glyphicon glyphicon-remove del-btn"></span></li>
					</ul>
				</td>
			</tr>
			<tr>
				<td>thall</td>
				<td>Hall, Trevor</td>
				<td>trevdog55@hotmail.com</td>
				<td>
					<ul class="table-list">
						<li><span class="pre-phone" title="Phone">P:</span> 604-233-9221</li>
						<li><span class="pre-phone" title="Cell">C:</span> 778-327-8694</li>
					</ul>
				</td>
				<td>
					<ul class="table-list">
						<li>Admin</li>
						<li>Referee</li>
					</ul>
				</td>
				<td><a href="#" class="clickable">View</a></td>
				<td>
					<ul class="icon-list">
						<li><span class="glyphicon glyphicon-pencil edit-btn"></span></li>
						<li><span class="glyphicon glyphicon-remove del-btn"></span></li>
					</ul>
				</td>
			</tr>
			<tr>
				<td>thall</td>
				<td>Hall, Trevor</td>
				<td>trevdog55@hotmail.com</td>
				<td>
					<ul class="table-list">
						<li><span class="pre-phone" title="Phone">P:</span> 604-233-9221</li>
						<li><span class="pre-phone" title="Cell">C:</span> 778-327-8694</li>
					</ul>
				</td>
				<td>
					<ul class="table-list">
						<li>Admin</li>
						<li>Referee</li>
					</ul>
				</td>
				<td><a href="#" class="clickable">View</a></td>
				<td>
					<ul class="icon-list">
						<li><span class="glyphicon glyphicon-pencil edit-btn"></span></li>
						<li><span class="glyphicon glyphicon-remove del-btn"></span></li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@stop