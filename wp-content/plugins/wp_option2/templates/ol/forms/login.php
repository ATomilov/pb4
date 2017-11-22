<form id="loginForm222" class="form-page loginForm">
	<input type="email" name="email" placeholder="<?php _e('Email address', 'Template'); ?>" class="form-control login" required>
	<input type="password" name="password" placeholder="<?php _e('Email password', 'Template'); ?>" class="form-control password" required>
	<button type="submit" id="submit" class="btn btn-primary btn-light"><?php _e('Log in', 'Template'); ?></button>
	<div class="form-caption">
		<div class="item">
			<a href="/forgot-password" class="form-link"><?php _e('Forgot Password?', 'Template'); ?></a>
		</div>
		<div class="item">
			<p><?php _e('Don\'t have an account yet?', 'Template'); ?>
				<a href="/register-an-account" class="form-link important"><?php _e('Register now', 'Template'); ?></a></p>
		</div>
	</div>
</form>