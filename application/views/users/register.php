<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>

<div class="row">
	<div class="col-md-4 offset-md-4">
		<h1 class="text-center"><?= $title; ?></h1>
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" placeholder="Name">
		</div>

		<div class="form-group">
			<label>Zipcode</label>
			<input type="text" class="form-control" name="zipcode" value="<?php echo set_value('zipcode'); ?>" placeholder="Zipcode">
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
		</div>

		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>

		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password">
		</div>

		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
</div>

<?php form_close(); ?>
