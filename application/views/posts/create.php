<h2><?= $title; ?></h2>

<?= validation_errors(); ?>
<?= form_open_multipart('posts/create'); ?>

<div class="form-group">
	<label>Title</label>
	<input type="text" class="form-control" name="title" placeholder="Add Title">
	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
	<label>Body</label>
	<textarea class="form-control" name="body" id="editor1" placeholder="Add Body"></textarea>
</div>

<div class="form-group">
	<label>Category</label>
	<select name="category_id" class="form-control">
		<?php foreach ($categories as $category) : ?>
			<option value="<?php echo $category['id']; ?>"><?= $category['name'] ?></option>
		<?php endforeach; ?>
	</select>
</div>

<div>
	<label>Upload Image</label>
	<input type="file" name="postImage" size="20">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>
