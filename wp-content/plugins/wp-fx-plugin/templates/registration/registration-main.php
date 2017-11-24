<form method="post" class="registeringForm" action="#">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="fname" class="control-label">
					<?php echo _e("First name", 'ol_plugin'); ?>*
				</label>
				<input class="form-control" name="fname" type="text" id="fname" value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : ''; ?>">
			</div>

			<div class="form-group">
				<label for="lname" class="control-label">
					<?php echo _e("Last name", 'ol_plugin'); ?>*
				</label>
				<input class="form-control" name="lname" type="text" id="lname" value="<?php echo isset($_GET['lname']) ? $_GET['lname'] : ''; ?>">
			</div>

			<div class="form-group">
				<label for="email" class="control-label">
					<?php echo _e("Email", 'ol_plugin'); ?>*
				</label>
				<input class="form-control" name="email" type="text" id="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
			</div>

			<div class="form-group">
				<label for="password" class="control-label">
					<?php echo _e("Password", 'ol_plugin'); ?>*
				</label>
				<input class="form-control" name="password" type="password" value="" id="password">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group phone-group-input">
				<label for="phone" class="control-label">
					<?php echo _e("Phone", 'ol_plugin'); ?>*
				</label>
				<input class="form-control" name="phone_prefix" type="text" id="phone-prefix" value="<?php echo isset($_GET['phone_prefix']) ? $_GET['phone_prefix'] : ''; ?>" style="width: 20%">
				<input class="form-control" name="phone" type="text" id="phone" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>" style="width: calc(80% - 5px);">
			</div>

			<input name="hidden_phone" type="hidden">

			<div class="form-group">
				<label for="country" class="control-label">
					<?php echo _e("Country", 'ol_plugin'); ?>*
				</label>
				<select class="form-control chosen" id="country" name="country">
					<?php echo isset($_GET['country']) ? '<option value="' . $_GET['country'] . '">' . $_GET['country'] . '</option>' : ''; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="language" class="control-label">
					<?php echo _e("Language", 'ol_plugin'); ?>*
				</label>
				<select class="form-control chosen" id="language" name="language"></select>
			</div>

			<div class="form-group">
				<label for="currency" class="control-label">
					<?php echo _e("Currency", 'ol_plugin'); ?>
				</label>
				<select class="form-control chosen" id="currency" name="currency"></select>
			</div>
			<input name="campaign" type="hidden" value="<?php echo isset($_GET['campaign_id']) ? $_GET['campaign_id'] : 0; ?>" id="campaign">
			<input name="affiliate" type="hidden" value="<?php echo isset($_GET['affiliate_id']) ? $_GET['affiliate_id'] : 0; ?>" id="affiliate">
			<input name="trading_group_id" type="hidden" value="<?php echo isset($_GET['trading_group_id']) ? $_GET['trading_group_id'] : 0; ?>" id="affiliate">
			<input name="a_aid" type="hidden" value="<?php echo isset($_GET['a_aid']) ? $_GET['a_aid'] : ''; ?>" id="a_aid">
			<input name="b_bid" type="hidden" value="<?php echo isset($_GET['b_bid']) ? $_GET['b_bid'] : ''; ?>" id="b_bid">
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="terms" value="1"><?php echo _e("Im over 18 years of age and I accept the terms & conditions", 'ol_plugin'); ?>*
					</label>
				</div>
			</div>
		</div>

	</div>

	<div class="clear"></div>

	<div class="errors alert alert-danger" style="display: none;"></div>

	<label for="submit" class="control-label required-fields">
		* <?php echo _e("Required fields", 'ol_plugin'); ?>
	</label>

	<div class="text-center">
		<button type="submit" class="btn btn-success btn-lg btn-circle">
			<?php _e('Register', 'Template'); ?>
		</button>
	</div>

</form>