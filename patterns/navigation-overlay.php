<?php
/**
 * Title: Navigation overlay
 * Slug: campusinterface/navigation-overlay
 * Categories: header
 * Block Types: core/template-part/navigation-overlay
 * Keywords: menu, overlay, mobile, navigation
 * Viewport Width: 480
 * Description: The full-screen menu that opens from the header on phones (WordPress 7.0 and later): site title, the main menu in large type, a log-in link and a button to the course catalogue. WordPress adds the close button.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"style":{"dimensions":{"minHeight":"100vh"},"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|60"}},"backgroundColor":"base","textColor":"contrast","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group has-contrast-color has-base-background-color has-text-color has-background" style="min-height:100vh;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:site-title {"level":0} /-->

	<!-- wp:navigation {"overlayMenu":"never","ariaLabel":"<?php echo esc_attr_x( 'Main', 'navigation landmark label', 'campusinterface' ); ?>","fontSize":"xl","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} /-->

	<!-- wp:separator {"className":"is-style-wide"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->

	<!-- wp:loginout /-->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-campusinterface-pill"} -->
		<div class="wp-block-button is-style-campusinterface-pill"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( campusinterface_courses_url() ); ?>"><?php esc_html_e( 'Browse courses', 'campusinterface' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
