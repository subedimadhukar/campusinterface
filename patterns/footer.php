<?php
/**
 * Title: Footer
 * Slug: campusinterface/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: footer, site title, tagline, navigation, links
 * Viewport Width: 1400
 * Description: Site title and tagline beside the footer navigation, with links to the accessibility statement, privacy policy and contact page underneath.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:site-title {"level":0} /-->

			<!-- wp:site-tagline {"fontSize":"sm"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:navigation {"overlayMenu":"never","ariaLabel":"<?php echo esc_attr_x( 'Footer', 'navigation landmark label', 'campusinterface' ); ?>","fontSize":"sm","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
			<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Courses', 'campusinterface' ); ?>","url":"<?php echo esc_url( campusinterface_courses_url() ); ?>","kind":"custom"} /-->
			<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Instructors', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/instructors/' ) ); ?>","kind":"custom"} /-->
			<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Events', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/events/' ) ); ?>","kind":"custom"} /-->
			<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'About', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/about/' ) ); ?>","kind":"custom"} /-->
		<!-- /wp:navigation -->
	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"align":"wide","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><a href="<?php echo esc_url( home_url( '/accessibility/' ) ); ?>"><?php esc_html_e( 'Accessibility', 'campusinterface' ); ?></a> · <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy policy', 'campusinterface' ); ?></a> · <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'campusinterface' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
