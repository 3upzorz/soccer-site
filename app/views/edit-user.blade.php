@extends('layouts.master')

@section('container')
<!-- <?php echo Form::open(
	array(
		'id'   => 'edit-user-form',
		'url'  => 'user/edit',
		'role' => 'form'
	)
);?> -->
<?php echo Form::model(
	$user,
	array(
		'id'   => 'edit-user-form',
		'url'  => 'user/edit',
		'role' => 'form'
	)
); ?>
<input type="hidden" name="user_id" value="{{$user->id}}" />
<div class="col-md-12">
	<h1>Edit User</h1>
	<?php echo link_to_route('user_management_panel', '&laquo; Back to Panel'); ?>
	<?php 
		$flashSuccess = Session::get('flashSuccess');
		$flashError = Session::get('flashError');
	?>
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
	<h3>Profile</h3>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="edit-first-name">First Name</label>
				<!-- <input id="edit-first-name" class="form-control" type="text" name="first_name" placeholder="Enter First Name"> -->
				<?php echo Form::text(
					'first_name',
					null,
					array(
						'id' => 'edit-first-name',
						'class' => 'form-control',
						'placeholder' => 'Enter First Name'
					)
				); ?>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="edit-last-name">Last Name</label>
				<!-- <input id="edit-last-name" class="form-control" type="text" name="lastName" placeholder="Enter Last Name"> -->
				<?php echo Form::text(
					'last_name',
					null,
					array(
						'id' => 'edit-last-name',
						'class' => 'form-control',
						'placeholder' => 'Enter Last Name'
					)
				); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="edit-phone-number">Phone Number</label>
				<!-- <input id="edit-phone-number" class="form-control" type="text" name="phoneNumber" placeholder="Enter Phone Number"> -->
				<?php echo Form::text(
					'phone',
					null,
					array(
						'id' => 'edit-phone-number',
						'class' => 'form-control',
						'placeholder' => 'Enter Phone Number'
					)
				); ?>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="edit-phone-number-alt">Alt. Phone Number</label>
				<!-- <input id="edit-phone-number-alt" class="form-control" type="text" name="phoneNumberAlt" placeholder="Enter Phone Number"> -->
				<?php echo Form::text(
					'alt_phone',
					null,
					array(
						'id' => 'edit-phone-number-alt',
						'class' => 'form-control',
						'placeholder' => 'Enter Alt. Phone Number'
					)
				); ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="edit-email">Email</label>
		<!-- <input id="edit-email" class="form-control" type="email" name="email" placeholder="Enter email"> -->
		<?php echo Form::text(
					'email',
					null,
					array(
						'id' => 'edit-email',
						'class' => 'form-control',
						'placeholder' => 'Enter Email'
					)
				); ?>
	</div>
	<h3>Address</h3>
	<div class="form-group">
		<label for="edit-address-line-1">Address Line 1</label>
		<!-- <input id="edit-address-line-1" class="form-control" type="text" name="email" placeholder="Enter street address"> -->
		<?php echo Form::text(
					'address_line_1',
					null,
					array(
						'id' => 'edit-address-line-1',
						'class' => 'form-control',
						'placeholder' => 'Enter street address'
					)
				); ?>
	</div>
	<div class="form-group">
		<label for="edit-address-line-2">Address Line 2 (Optional)</label>
		<!-- <input id="edit-address-line-2" class="form-control" type="text" name="email" placeholder="Enter additional address info, e.g. apt number"> -->
		<?php echo Form::text(
					'address_line_2',
					null,
					array(
						'id' => 'edit-address-line-2',
						'class' => 'form-control',
						'placeholder' => 'Enter additional address info, e.g. apt number'
					)
				); ?>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="edit-city">City</label>
				<!-- <input id="edit-city" class="form-control" type="text" name="phoneNumberAlt" placeholder="Enter City"> -->
				<?php echo Form::text(
					'city',
					null,
					array(
						'id' => 'edit-city',
						'class' => 'form-control',
						'placeholder' => 'Enter City'
					)
				); ?>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="edit-postal-code">Postal Code</label>
				<!-- <input id="edit-postal-code" class="form-control" type="text" name="postalCode" placeholder="Enter Postal Code e.g. V3C2B3"> -->
				<?php echo Form::text(
					'postal_code',
					null,
					array(
						'id' => 'edit-postal-code',
						'class' => 'form-control',
						'placeholder' => 'Enter Postal Code'
					)
				); ?>
			</div>
		</div>
	</div>
	<h3>Permissions</h3>
	<div class="form-group">
		<ul class="permission-list">
			@foreach($permissions as $permission)
			<li>
				<label>
					<?php 
						$checked = false;
						foreach($user->permissions as $userPermission){
							if((int)$permission->id === (int) $userPermission->id){
								$checked = true;
							}
						}
					?>
					<!-- if user has this permission check the checkbox -->
					<?php if($checked): ?>
						<input class="edit-permission-check" name="permissions[]" value="{{$permission->id}}" type="checkbox" checked="checked"> {{$permission->name}}
					<?php else: ?>
						<input class="edit-permission-check" name="permissions[]" value="{{$permission->id}}" type="checkbox"> {{$permission->name}}
					<?php endif; ?>
				</label>
			</li>
			@endforeach
		</ul>
	</div>
	<button class="btn btn-success" form="edit-user-form" type="submit">Save User</button>
</div>
{{Form::close()}}
@stop