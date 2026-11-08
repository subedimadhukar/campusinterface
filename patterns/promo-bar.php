<?php
/**
 * Title: Promo bar
 * Slug: campusinterface/promo-bar
 * Categories: campusinterface-cta, banner
 * Keywords: promo, announcement, top bar, notice, banner, launch
 * Viewport Width: 1400
 * Description: A slim dark bar with a one-line announcement and a link, for the top of the header or any page.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","className":"is-style-campusinterface-band-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-campusinterface-band-dark" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
	<p class="has-text-align-center has-sm-font-size"><?php esc_html_e( 'UX Design Essentials, cohort 3, starts 12 January.', 'campusinterface' ); ?> <a href="<?php echo esc_url( campusinterface_course_url( 'ux-design-essentials' ) ); ?>"><?php esc_html_e( 'Reserve your place', 'campusinterface' ); ?></a></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
