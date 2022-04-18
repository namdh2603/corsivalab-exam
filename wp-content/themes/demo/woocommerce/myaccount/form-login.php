<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
do_action('woocommerce_before_customer_login_form'); ?>
<div class="page-setion">
	<div class="container pt-5 pb-5">
		<div class="row mx-0">
			<div class="col-12 col-lg-6">
				<?php
				if (isset($_GET['action']) && $_GET['action'] == 'register') {
					if ('yes' === get_option('woocommerce_enable_myaccount_registration')) { ?>
						<!-- 						<div class="page-inner default-template  m-auto">
							<div class="text-center">
								<h2 class="heading">Register</h2>
							</div>
						</div> -->
						<div class="page-inner register-inner m-auto">
							<form method="post" class="woocommerce-form woocommerce-form-register corsivalab-register" <?php do_action('woocommerce_register_form_tag'); ?>>
								<?php do_action('woocommerce_register_form_start'); ?>
								<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="reg_username">User Name&nbsp;<span class="required">*</span></label>
										<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																										?>
									</p>
								<?php endif; ?>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="reg_email">Email Address&nbsp;<span class="required">*</span></label>
									<input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																					?>
								</p>
								<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="reg_password">Password&nbsp;<span class="required">*</span></label>
										<input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="reg_password" autocomplete="new-password" />
									</p>
								<?php else : ?>
									<p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>
								<?php endif; ?>
								<?php do_action('woocommerce_register_form'); ?>
								<p class="woocommerce-form-row form-row">
									<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
									<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit btn btn-account-page" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
								</p>
								<?php do_action('woocommerce_register_form_end'); ?>
							</form>
							<p class="text-center mt-4 login-now">Have an account? <a href="<?php echo wc_get_page_permalink('myaccount'); ?>">Login here!</a></p>
						</div>
					<?php } ?>
				<?php } else { ?>
					<!-- 						<div class="page-inner default-template  m-auto">
							<div class="text-center">
								<h2 class="heading">login</h2>
							</div>
						</div> -->
					<div class="page-inner login-inner m-auto">
						<form class="woocommerce-form woocommerce-form-login corsivalab-login" method="post">
							<?php do_action('woocommerce_login_form_start'); ?>
							<div class="form-group">
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="username">Email Address&nbsp;<span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																								?>
								</p>
							</div>
							<div class="form-group">
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="password">Password&nbsp;<span class="required">*</span></label>
									<input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password" autocomplete="current-password" />
									<small id="passHelp" class="form-text text-muted"><a href="<?php echo esc_url(wp_lostpassword_url()); ?>">Forget password?</a></small>
								</p>
							</div>
							<?php do_action('woocommerce_login_form'); ?>
							<p class="form-row">
								<!-- <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
			<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
		</label> -->
								<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
								<button type="submit" class="woocommerce-button button woocommerce-form-login__submit btn btn-account-page" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
							</p>
							<!-- <p class="woocommerce-LostPassword lost_password">
		<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
	</p> -->
							<?php do_action('woocommerce_login_form_end'); ?>
							<p class="text-center mt-4 register-now">Don’t have an account? <a href="<?php echo wc_get_page_permalink('myaccount'); ?>?register=ok">Register now!</a></p>
						</form>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php do_action('woocommerce_after_customer_login_form'); ?>