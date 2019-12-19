<html>

<head>
	<title>CI_Blog</title>
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/minty/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/sketchy/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="<?= base_url() ?>">CiBlog</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">

			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="<?php echo base_url(); ?>">Home <span class="sr-only"></span></a>
				<a class="nav-item nav-link" href="<?php echo base_url(); ?>about">About</a>
				<a class="nav-item nav-link" href="<?php echo base_url(); ?>posts">Blogs</a>
				<a class="nav-item nav-link navbar-right" href="<?php echo base_url(); ?>/posts/create">Create Post</a>
			</div>

		</div>
	</nav>

	<div class="container">
