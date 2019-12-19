<h2><?= $title ?></h2>

<?php foreach ($posts as $post) : ?>
	<h3> <?= $post['title'] ?> </h3>
	<small class="post-date">Post on: <?= $post['created_at'] ?> </small>
	<p><?= $post['body'] ?></p>

	<p><a class="btn btn-outline-secondary" href="<?= site_url('/posts/' . $post['slug']); ?>">Read More...</a></p>

<?php endforeach; ?>
