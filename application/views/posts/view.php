<h2><?= $post['title'] ?></h2>
<small class="post-date">Post on: <?= $post['created_at'] ?> </small>

<div class="post-body">
	<?= $post['body'] ?>
</div>

<br>

<?= form_open('posts/delete/' . $post['id']); ?>
<a class="btn btn-info pull-left" href="edit/<?= $post['slug'] ?>">Edit</a>
<input type="submit" value="Delete" class="btn btn-danger">
</form>
