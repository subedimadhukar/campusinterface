<?php
/**
 * Title: Footer, minimal
 * Slug: campusinterface/footer-minimal
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: footer, minimal, slim, small print
 * Viewport Width: 1400
 * Description: One slim row with the site title and links to the accessibility statement, privacy policy and contact page. Used on the dashboard and lesson templates.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"className":"is-style-campusinterface-footer-bar","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-campusinterface-footer-bar" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-title {"level":0,"fontSize":"sm"} /-->

		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><a href="<?php echo esc_url( home_url( '/accessibility/' ) ); ?>"><?php esc_html_e( 'Accessibility', 'campusinterface' ); ?></a> · <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy policy', 'campusinterface' ); ?></a> · <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'campusinterface' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
