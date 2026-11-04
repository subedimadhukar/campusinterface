<?php
/**
 * Title: Header, centred
 * Slug: campusinterface/header-centered
 * Categories: header
 * Block Types: core/template-part/header
 * Keywords: header, centred, centered, navigation, logo, school
 * Viewport Width: 1400
 * Description: Logo and site title centred above a centred navigation row, for schools and academies with a strong name.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"className":"is-style-campusinterface-header-bar","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-campusinterface-header-bar" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":48} /-->

			<!-- wp:site-title {"level":0,"fontSize":"2xl"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:navigation {"overlay":"navigation-overlay","overlayMenu":"mobile","ariaLabel":"<?php echo esc_attr_x( 'Main', 'navigation landmark label', 'campusinterface' ); ?>","layout":{"type":"flex","justifyContent":"center"}} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
