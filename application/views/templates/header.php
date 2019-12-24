<html>

<head>
	<title>CI_Blog</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/minty/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/sketchy/bootstrap.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="navbar-brand" href="<?= base_url() ?>">CiBlog</a>
				</li>

				<li class="nav-item">
					<a class="nav-item nav-link active" href="<?php echo base_url(); ?>">Home <span class="sr-only"></span></a>
				</li>

				<li class="nav-item">
					<a class="nav-item nav-link" href="<?php echo base_url(); ?>about">About</a>
				</li>

				<?php if ($this->session->userdata('logged_in')) : ?>
					<li class="nav-item">
						<a class="nav-item nav-link" href="<?php echo base_url(); ?>posts">Blogs</a>
					</li>

					<li class="nav-item">
						<a class="nav-item nav-link" href="<?php echo base_url(); ?>categories">Categories</a>
					</li>

					<li class="nav-item">
						<a class="nav-item nav-link" href="<?php echo base_url(); ?>posts/create">Create Post</a>
					</li>

					<li class="nav-item">
						<a class="nav-item nav-link" href="<?php echo base_url(); ?>categories/create">Create Category</a>
					</li>
				<?php endif; ?>
			</ul>

			<ul class="navbar-nav ml-auto">

				<?php if ($this->session->userdata('logged_in')) : ?>
					<li class="nav-item">
						<a class="nav-item nav-link navbar-nav ml-auto" href="<?php echo base_url(); ?>users/logout">Logout</a>
					</li>
				<?php endif; ?>

				<?php if (!$this->session->userdata('logged_in')) : ?>
					<li class="nav-item">
						<a class="nav-item nav-link navbar-nav ml-auto" href="<?php echo base_url(); ?>users/login">Login</a>
					</li>

					<li class="nav-item">
						<a class="nav-item nav-link navbar-nav ml-auto" href="<?php echo base_url(); ?>users/register">Register</a>
					</li>
				<?php endif ?>

			</ul>

		</div>
	</nav>

	<div class="container">

		<br>

		<!-- Flash message -->
		<?php if ($this->session->flashdata('user_registered')) : ?>
			<p class="alert alert-success"> <?php echo $this->session->flashdata('user_registered'); ?> </p>
		<?php endif; ?>

		<?php if ($this->session->flashdata('post_created')) : ?>
			<p class="alert alert-success"> <?php echo $this->session->flashdata('post_created'); ?> </p>
		<?php endif; ?>

		<?php if ($this->session->flashdata('post_updated')) : ?>
			<p class="alert alert-success"> <?php echo $this->session->flashdata('post_updated'); ?> </p>
		<?php endif; ?>

		<?php if ($this->session->flashdata('category_created')) : ?>
			<p class="alert alert-success"> <?php echo $this->session->flashdata('category_created'); ?> </p>
		<?php endif; ?>

		<?php if ($this->session->flashdata('post_deleted')) : ?>
			<p class="alert alert-success"> <?php echo $this->session->flashdata('post_deleted'); ?> </p>
		<?php endif; ?>

		<?php if ($this->session->flashdata('user_login')) : ?>
			<p class="alert alert-success"><?php echo $this->session->flashdata('user_login'); ?></p>
		<?php endif; ?>

		<?php if ($this->session->flashdata('login_failed')) : ?>
			<p class="alert alert-danger"><?php echo $this->session->flashdata('login_failed'); ?></p>
		<?php endif; ?>

		<?php if ($this->session->flashdata('set_flashdata')) : ?>
			<p class="alert alert-success"><?php echo $this->session->flashdata('set_flashdata') ?></p>
		<?php endif; ?>
