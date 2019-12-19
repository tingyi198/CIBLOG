<h2><?= $title; ?></h2>

<?= validation_errors(); ?>
<?= form_open('posts/update'); ?>

<div class="form-group">

	<input type="hidden" name="id" value="<?= $post['id'] ?>">

	<label>Title</label>
	<input type="text" class="form-control" name="title" placeholder="Add Title" value="<?= $post['title'] ?>">
</div>

<div class="form-group">
	<label>Body</label>
	<textarea class="form-control" name="body" id="editor1" placeholder="Add Body"><?= $post['body'] ?></textarea>
</div>

<div class="form-group">
	<label>Category</label>
	<select name="category_id" class="form-control">
		<?php foreach ($categories as $category) : ?>
			<option value="<?php echo $category['id']; ?>"><?= $category['name'] ?></option>
		<?php endforeach; ?>
	</select>
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
