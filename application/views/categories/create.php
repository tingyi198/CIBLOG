<h2><?= $title; ?></h2>

<?= validation_errors(); ?>

<?= form_open_multipart(); ?>

<div class="form_group">
	<label>Name</label>
	<input type="text" class="form-control" name="name" placeholder="name">
</div>

<button type="submit" class="btn btn-info">Submit</button>

</form>
