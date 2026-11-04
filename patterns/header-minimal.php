<?php
/**
 * Title: Header, minimal
 * Slug: campusinterface/header-minimal
 * Categories: header
 * Block Types: core/template-part/header
 * Keywords: header, minimal, slim, dashboard, account, focus
 * Viewport Width: 1400
 * Description: A slim bar with the site title and a log-in or log-out link, without the main navigation. Used on the student dashboard and log-in pages.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"className":"is-style-campusinterface-header-bar","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-campusinterface-header-bar" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":32} /-->

			<!-- wp:site-title {"level":0,"fontSize":"lg"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"fontSize":"sm","layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group has-sm-font-size">
			<!-- wp:paragraph -->
			<p><a href="<?php echo esc_url( campusinterface_courses_url() ); ?>"><?php esc_html_e( 'Courses', 'campusinterface' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:loginout /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
