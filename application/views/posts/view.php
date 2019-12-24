<h2><?= $post['title'] ?></h2>
<small class="post-date">Post on: <?= $post['created_at'] ?> </small>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">

<div class="post-body">
	<?= $post['body'] ?>
</div>

<br>

<?php if ($this->session->userdata('user_id') === $post['user_id']) : ?>
	<?= form_open('posts/delete/' . $post['id']); ?>
	<a class="btn btn-info pull-left" href="edit/<?= $post['slug'] ?>">Edit</a>
	<input type="submit" value="Delete" class="btn btn-danger">
	</form>
<?php endif; ?>

<hr>
<h3>Comments</h3>
<?php if ($comments ?? array()) : ?>
	<?php foreach ($comments as $comment) : ?>
		<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name'] ?></strong> ] </h5>
	<?php endforeach; ?>
<?php else : ?>
	<p>No Comments</p>
<?php endif; ?>

<hr>
<h3>Add Comment</h3>

<?= form_open('comments/create/' . $post['id']); ?>
<?= validation_errors(); ?>

<div class="form_group">
	<label>Name</label>
	<input type="text" name="name" class="form-control">
</div>

<div class="form_group">
	<label>Email</label>
	<input type="email" name="email" class="form-control">
</div>

<div class="form_group">
	<label>Comment</label>
	<textarea name="body" class="form-control" rows="10"></textarea>
</div>

<br>
<input type="hidden" name="slug" value="<?= $post['slug'] ?>">
<button type="submit" class="btn btn-success">Submit</button>
</form>
