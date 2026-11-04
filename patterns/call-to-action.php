<?php
/**
 * Title: Call to action band
 * Slug: campusinterface/call-to-action
 * Categories: campusinterface-cta, call-to-action
 * Keywords: cta, enrol, sign up, banner, band
 * Viewport Width: 1400
 * Description: A full-width primary band with a centred headline, a sentence and a button to the course catalogue.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:group {"align":"full","className":"is-style-campusinterface-band-primary","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"40rem"}} -->
<div class="wp-block-group alignfull is-style-campusinterface-band-primary" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Start learning something new today', 'campusinterface' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"lg"} -->
	<p class="has-text-align-center has-lg-font-size"><?php esc_html_e( 'Join 4,800 learners on courses in data, code, design and communication. Your first three courses are free.', 'campusinterface' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( campusinterface_courses_url() ); ?>"><?php esc_html_e( 'Browse courses', 'campusinterface' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
