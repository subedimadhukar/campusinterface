<?php
/**
 * Title: Newsletter sign-up
 * Slug: campusinterface/newsletter
 * Categories: campusinterface-cta, call-to-action
 * Keywords: newsletter, email, subscribe, sign up, mailing list, form
 * Viewport Width: 1400
 * Description: A tinted band with a heading and a sentence, and a marked spot for the sign-up form block from your newsletter or forms plugin. The theme ships no form of its own.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","className":"is-style-campusinterface-band-tint","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"40rem"}} -->
<div class="wp-block-group alignfull is-style-campusinterface-band-tint" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Get new courses and events in your inbox', 'campusinterface' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'One email a month with new courses, free webinars and study tips. Unsubscribe any time.', 'campusinterface' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"is-style-campusinterface-placeholder","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-campusinterface-placeholder">
		<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
		<p class="has-text-align-center has-sm-font-size"><?php esc_html_e( 'Sign-up form goes here. Replace this paragraph with the form block from your newsletter or forms plugin.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
