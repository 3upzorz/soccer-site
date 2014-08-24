@extends('layouts.master')

@section('container')
<div class="col-md-12">
	<h1>Manage Users</h1>
	<div class="row">
		<div class="col-md-12">
			<button id="add-user-btn" class="btn btn-primary">+ Add User</button>
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
						<option value="def">Choose Permission</option>
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