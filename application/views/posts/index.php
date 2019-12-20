<h2><?= $title ?></h2>

<?php foreach ($posts as $post) : ?>
	<h3> <?= $post['title'] ?> </h3>

	<div class="row">

		<div class="col-md-3">
			<img class="img-fluid img-thumbnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
		</div>

		<div class="col-md-9">
			<small class="post-date">Post on: <?= $post['created_at'] ?> in <strong><?= $post['name'] ?></strong> </small>
			<p><?= word_limiter($post['body'], 30) ?></p>
			<p><a class="btn btn-outline-secondary" href="<?= site_url('/posts/' . $post['slug']); ?>">Read More...</a></p>
		</div>

	</div>


<?php endforeach; ?>
