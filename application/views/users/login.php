<?php echo form_open('users/login'); ?>

<div class="row">

	<div class="col-md-4 offset-md-4">
		<h1><?= $title ?></h1>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
		</div>

		<button type="submit" class="btn btn-primary btn-block">Login</button>

	</div>

</div>
