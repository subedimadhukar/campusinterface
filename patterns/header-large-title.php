<?php
/**
 * Title: Header with large title
 * Slug: campusinterface/header-large-title
 * Categories: header
 * Block Types: core/template-part/header
 * Keywords: header, large title, tagline, masthead, navigation
 * Viewport Width: 1400
 * Description: A masthead with a large site title and the tagline, and the navigation in its own row below a divider.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"className":"is-style-campusinterface-header-bar","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-campusinterface-header-bar" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:site-title {"level":0,"fontSize":"3xl"} /-->

			<!-- wp:site-tagline /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:loginout {"fontSize":"sm"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"align":"wide","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->

	<!-- wp:navigation {"overlay":"navigation-overlay","overlayMenu":"mobile","ariaLabel":"<?php echo esc_attr_x( 'Main', 'navigation landmark label', 'campusinterface' ); ?>","align":"wide","layout":{"type":"flex","justifyContent":"left"}} /-->
</div>
<!-- /wp:group -->
