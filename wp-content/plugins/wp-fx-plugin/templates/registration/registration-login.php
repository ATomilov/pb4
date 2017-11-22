<form id="loginForm222" class="form-page loginForm">

	<div class="row">
		<div class="col-12 col-md-3"></div>
		<div class="col">
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label for="email"><?php _e('Email', 'ol_plugin'); ?></label>
						<input type="email" name="email" class="form-control login" required>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<label for="email"><?php _e('Password', 'ol_plugin'); ?></label>
						<input type="password" name="password" class="form-control password" required>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-3"></div>
	</div>

	<div class="text-center mt-3">
		<div class="form-group">
			<button type="submit" class="btn btn-success btn-lg btn-circle"><?php _e('Login', 'Template'); ?></button>
		</div>
		<div class="form-caption">
			<div class="item">
				<?php $current_lang = apply_filters( 'wpml_current_language', NULL );?>
				<?php if ( $current_lang == 'en' ) : ?>
				<a href="/en/forgot-password" class="form-link important"><?php _e('Forgot Password?', 'ol_plugin'); ?></a>
				<?php else : ?>
				<a href="/mot-de-passe-oublie" class="form-link important"><?php _e('Forgot Password?', 'ol_plugin'); ?></a>
				<?php endif; ?>
			</div>
			<div class="item">
				<?php _e('Don\'t have an account yet?', 'ol_plugin'); ?>
				<?php $current_lang = apply_filters( 'wpml_current_language', NULL );?>
				<?php if ( $current_lang == 'en' ) : ?>
				<a href="/en/register" class="form-link important"><?php _e('Register now.', 'ol_plugin'); ?></a>
				<?php else : ?>
				<a href="/register" class="form-link important"><?php _e('Register now.', 'ol_plugin'); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>

</form>
