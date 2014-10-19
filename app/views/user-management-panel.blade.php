@extends('layouts.master')

@section('container')
<!-- START ADD USER MODAL -->
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
			<?php $addPopulate = Session::get('addPopulate') ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="username">Username</label>
					<input id="username" class="form-control" type="text" name="username" placeholder="Enter Username" value="<?php if(isset($addPopulate)) echo Input::old('username') ?>">
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="first-name">First Name</label>
							<input id="first-name" class="form-control" type="text" name="firstName" placeholder="Enter First Name" value="<?php if(isset($addPopulate)) echo Input::old('firstName')?>">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="last-name">Last Name</label>
							<input id="last-name" class="form-control" type="text" name="lastName" placeholder="Enter Last Name" value="<?php if(isset($addPopulate)) echo Input::old('lastName') ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="password">Temporary Password</label>
							<input id="password" class="form-control" type="password" name="password" placeholder="Enter a password">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="confirm-password">Confirm Temporary Password</label>
							<input id="confirm-password" class="form-control" type="password" name="confirmPassword" placeholder="Confirm password">
						</div>
					</div>
				</div>
				<div class="form-group">
					<h3>Permissions</h3>
					<p>Please check all of the permissions that apply to the user being created</p>
					<label for="check-all-permissions">
						<input id="check-all-permissions" name="checkAllPermissions" type="checkbox"> Check All
					</label>
					<ul class="permission-list">
						@foreach($permissions as $permission)
						<li>
							<label>
								<input class="permission-check" name="permissions[]" value="{{$permission->id}}" type="checkbox"> {{$permission->name}}
							</label>
						</li>
						@endforeach
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
<!-- END ADD USER MODAL -->

<!-- START EDIT USER MODAL -->
<div id="edit-user-modal" class="modal fade" tab-index="-1" role="dialog" aria-labelledby="editUserModal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h2 class="modal-title" id="edit-user-modal-title">Edit User</h2>
			</div>
			{{Form::open(
				array(
					'id'   => 'edit-user-form',
					'url'  => 'user/edit',
					'role' => 'form'
				)
			)}}
			<div class="modal-body">
				<h3>Profile</h3>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="edit-first-name">First Name</label>
							<input id="edit-first-name" class="form-control" type="text" name="firstName" placeholder="Enter First Name">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="edit-last-name">Last Name</label>
							<input id="edit-last-name" class="form-control" type="text" name="lastName" placeholder="Enter Last Name">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="edit-phone-number">Phone Number</label>
							<input id="edit-phone-number" class="form-control" type="text" name="phoneNumber" placeholder="Enter Phone Number">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="edit-phone-number-alt">Alt. Phone Number</label>
							<input id="edit-phone-number-alt" class="form-control" type="text" name="phoneNumberAlt" placeholder="Enter Phone Number">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="edit-email">Email</label>
					<input id="edit-email" class="form-control" type="email" name="email" placeholder="Enter email">
				</div>
				<h3>Address</h3>
				<div class="form-group">
					<label for="edit-address-line-1">Address Line 1</label>
					<input id="edit-address-line-1" class="form-control" type="text" name="email" placeholder="Enter street address">
				</div>
				<div class="form-group">
					<label for="edit-address-line-2">Address Line 2 (Optional)</label>
					<input id="edit-address-line-2" class="form-control" type="text" name="email" placeholder="Enter additional address info, e.g. apt number">
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="edit-phone-number-alt">Alt. Phone Number</label>
							<input id="edit-phone-number-alt" class="form-control" type="text" name="phoneNumberAlt" placeholder="Enter Phone Number">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="edit-postal-code">Postal Code</label>
							<input id="edit-postal-code" class="form-control" type="text" name="postalCode" placeholder="Enter Postal Code e.g. V3C2B3">
						</div>
					</div>
				</div>
				<h3>Permissions</h3>
				<div class="form-group">
					<ul class="permission-list">
						@foreach($permissions as $permission)
						<li>
							<label>
								<input class="edit-permission-check" name="permissions[]" value="{{$permission->id}}" type="checkbox"> {{$permission->name}}
							</label>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button class="btn btn-success" form="edit-user-form" type="submit">Save User</button>
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
<!-- END EDIT USER MODAL -->

<div class="col-md-12">
	<h1>Manage Users</h1>
	@if(isset($flashSuccess) && $flashSuccess)
		<div class="bg-success">
			@if(isset($deletedUserId) && $deletedUserId)
			<p class="message-text">{{$flashSuccess}}</p>
			{{Form::open(
				array(
					'id'   => 'restore-user-form',
					'url'  => 'user/restore',
					'role' => 'form'
				)
			)}}
				<input type="hidden" name="userId" value="{{$deletedUserId}}"/>
				<button type="submit" for="restore-user-form" class="hidden-submit-btn link-style-btn">Undo</button>
			{{Form::close()}}
			@else
			<p class="message-text">{{$flashSuccess}}</p>
			@endif
		</div>
	@endif
	@if(isset($flashError) && $flashError)
		<div class="bg-danger">
			<p class="message-text">{{$flashError}}</p>
		</div>
	@endif
	@if(count($errors->getMessages()) > 0)
		<ul class="bg-danger">
		@foreach($errors->getMessages() as $messageGroup)
			@foreach($messageGroup as $message)
				<li>{{$message}}</li>
			@endforeach
		@endforeach
		</ul>
	@endif
	<div class="row">
		<div class="col-md-12">
			<button id="add-user-btn" class="btn btn-primary" data-toggle="modal" data-target="#add-user-modal">+ Add User</button>
		</div>
		<div class="col-md-12">
			<h4>Quick Search</h4>
			<form id="user-search-form" class="form-inline" action="" role="form" method="GET">
				<div class="form-group">
					<label class="sr-only" for="userName">Username</label>
					<input type="text" class="form-control" id="search-user-name" name="userName" placeholder="Enter username" value="{{$criteria['username']}}">
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">@</div>
						<label class="sr-only" for="email">Email</label>
						<input id="search-email" class="form-control" name="email" type="email" placeholder="Enter email" value="{{$criteria['email']}}">
					</div>
				</div>
				@if(isset($permissions) && count($permissions) > 0)
				<div class="form-group">
					<label class="sr-only" for="userPermission">Permission</label>
					<select id="search-user-permission" class="form-control" name="userPermission">
						@if(isset($criteria['permission']) && $criteria['permission'])
						<option value="">Choose Permission</option>
						@else
						<option value="" selected>Choose Permission</option>
						@endif

						@foreach($permissions as $permission)
							@if($criteria['permission'] == $permission->id)
							<option value="{{$permission->id}}" selected>{{{$permission->name}}}</option>
							@else
							<option value="{{$permission->id}}">{{{$permission->name}}}</option>
							@endif
						@endforeach
					</select>
				</div>
				@endif
				@if(isset($criteria['deleted']) && $criteria['deleted'])
				<input name="deleted" type="hidden" value="1">
				@endif
				<button type="submit" form="user-search-form" class="btn btn-default">Search</button>
			</form>
			@if(isset($criteria['deleted']) && $criteria['deleted'])
			{{link_to_route('user_management_panel', 'View active users', $parameters = array(), $attributes = array());}}
			@else
			{{link_to_route('user_management_panel', 'View deleted users', $parameters = array('deleted'=>1), $attributes = array());}}
			@endif
		</div>
	</div>
	<table id="users-table" class="table table-striped">
		<thead>
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Permissions</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if($users && count($users) > 0)
				@foreach($users as $user)
				<tr>
					<td>{{$user->username}}</td>
					<td>{{$user->last_name . ', ' . $user->first_name}}</td>
					<td>{{$user->email}}</td>
					<td>
						<ul class="table-list">
							@if(isset($user->phone))
							<li><span class="pre-phone" title="Phone">P:</span> $user->phone</li>
							@endif
							@if(isset($user->alt_phone))
							<li><span class="pre-phone" title="Phone">P:</span> $user->alt_phone</li>
							@endif
						</ul>
					</td>
					<td>
						<ul class="table-list">
						@foreach($user->permissions()->get() as $permission)
							<li>{{$permission->name}}</li>
						@endforeach
						</ul>
					</td>
					<td><a href="#" class="clickable">View</a></td>
					<td>
						<ul class="icon-list">
							<!-- if looking at deleted users, display a button to restore that user -->
							@if(isset($criteria['deleted']) && $criteria['deleted'])
							<li>
								{{Form::open(
									array(
										'class'   => 'restore-user-form',
										'url'  => 'user/restore',
										'role' => 'form'
									)
								)}}
									<input type="hidden" name="userId" value="{{$user->id}}"/>
									<input type="hidden" name="deleted" value="1"/>
									<button class="hidden-submit-btn"><span class="glyphicon glyphicon-ok restore click-icon"></span></button>
								{{Form::close()}}
							</li>
							@else
							<!-- <button id="add-user-btn" class="btn btn-primary" >+ Add User</button> -->
							<!-- <li><span class="glyphicon glyphicon-pencil edit click-icon" data-toggle="modal" data-target="#edit-user-modal"></span></li> -->
							<li><a href="{{url('user/edit',array($user->id))}}"><span class="glyphicon glyphicon-pencil edit click-icon"></span></a></li>
							<li>
								{{Form::open(
									array(
										'class'   => 'delete-user-form',
										'url'  => 'user/delete',
										'role' => 'form'
									)
								)}}
									<input type="hidden" name="userId" value="{{$user->id}}">
									<button class="hidden-submit-btn"><span class="glyphicon glyphicon-remove del click-icon"></span></button>
								{{Form::close()}}
							</li>
							@endif
							
						</ul>
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<td colspan="7">
						No users found!
					</td>
				</tr>
			@endif
		</tbody>
	</table>
</div>
@stop