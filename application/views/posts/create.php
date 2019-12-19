<h2><?= $title; ?></h2>

<?= validation_errors(); ?>
<?= form_open('posts/create'); ?>

<div class="form-group">
	<label>Title</label>
	<input type="text" class="form-control" name="title" placeholder="Add Title">
	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
	<label>Body</label>
	<textarea class="form-control" name="body" placeholder="Add Body"></textarea>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>
