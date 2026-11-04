<?php
/**
 * Title: Call to action
 * Slug: campusinterface/call-to-action
 * Categories: campusinterface-cta, call-to-action
 * Keywords: cta, enrol, sign up, banner
 * Viewport Width: 1400
 * Description: A full-width band with a headline, a sentence and a button.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center","textColor":"base"} -->
	<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color"><?php esc_html_e( 'Start learning something new today', 'campusinterface' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Join a course at your own pace, with lessons, quizzes and a certificate when you finish.', 'campusinterface' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"base","textColor":"contrast"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background wp-element-button"><?php esc_html_e( 'Browse courses', 'campusinterface' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
