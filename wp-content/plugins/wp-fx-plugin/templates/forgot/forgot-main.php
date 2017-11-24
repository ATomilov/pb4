<form method="post" class="forgotForm" action="#">
	<div class="form-group">
		<label for="email" class="control-label">
			<?php echo _e("Email", 'ol_plugin'); ?>*
		</label>
		<input class="form-control" name="email" type="text" id="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
	</div>

	<div class="clear"></div>

	<div class="errors alert alert-danger" style="display: none;"></div>
	<div class="success alert alert-success" style="display: none;"></div>

	<label for="submit" class="control-label required-fields">
		* <?php echo _e("Required fields", 'ol_plugin'); ?>
	</label>
	<div class="clear"></div>
	<div class="text-center">
		<button type="submit" class="btn btn-success btn-lg btn-circle">
			<?php _e('Forgot Password', 'Template');?>
		</button>
	</div>
</form>