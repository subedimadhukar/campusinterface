<?php
/**
 * Title: Header
 * Slug: campusinterface/header
 * Categories: header
 * Block Types: core/template-part/header
 * Keywords: header, navigation, menu, logo
 * Viewport Width: 1400
 * Description: Logo and site title on the left; navigation, a log-in link and a button to the course catalogue on the right. On phones the menu opens in the theme's navigation overlay.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"className":"is-style-campusinterface-header-bar","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-campusinterface-header-bar" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":40} /-->

			<!-- wp:site-title {"level":0} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
		<div class="wp-block-group">
			<!-- wp:navigation {"overlay":"navigation-overlay","overlayMenu":"mobile","ariaLabel":"<?php echo esc_attr_x( 'Main', 'navigation landmark label', 'campusinterface' ); ?>","layout":{"type":"flex","justifyContent":"right"}} /-->

			<!-- wp:loginout {"metadata":{"blockVisibility":{"viewport":{"mobile":false,"tablet":false}}},"fontSize":"sm"} /-->

			<!-- wp:buttons {"metadata":{"blockVisibility":{"viewport":{"mobile":false,"tablet":false}}}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-campusinterface-pill"} -->
				<div class="wp-block-button is-style-campusinterface-pill"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( campusinterface_courses_url() ); ?>"><?php esc_html_e( 'Browse courses', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
