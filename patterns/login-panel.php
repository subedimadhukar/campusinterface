<?php
/**
 * Title: Log-in panel
 * Slug: campusinterface/login-panel
 * Categories: campusinterface-cta
 * Keywords: login, log in, sign in, account, members, students
 * Viewport Width: 1400
 * Description: A welcome message and a link to create an account beside a card with the core Login/out block shown as a form.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Welcome back', 'campusinterface' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"lg"} -->
			<p class="has-lg-font-size"><?php esc_html_e( 'Log in to continue your courses, check your progress and download your certificates.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'New here?', 'campusinterface' ); ?> <a href="<?php echo esc_url( wp_registration_url() ); ?>"><?php esc_html_e( 'Create a free account', 'campusinterface' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","className":"is-style-campusinterface-card"} -->
		<div class="wp-block-column is-vertically-aligned-center is-style-campusinterface-card">
			<!-- wp:loginout {"displayLoginAsForm":true} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
