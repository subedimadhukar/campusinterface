<?php
/**
 * Title: Footer with columns
 * Slug: campusinterface/footer-columns
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: footer, columns, links, sitemap, navigation
 * Viewport Width: 1400
 * Description: A four-column footer: the site title, tagline and a sentence, then link lists for courses, the academy and help, with the privacy policy link underneath.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"34%"} -->
		<div class="wp-block-column" style="flex-basis:34%">
			<!-- wp:site-title {"level":0} /-->

			<!-- wp:site-tagline {"fontSize":"sm"} /-->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'Practical courses in data, web development, design and communication, taught by people who do the work.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"fontSize":"base"} -->
			<h2 class="wp-block-heading has-base-font-size"><?php esc_html_e( 'Courses', 'campusinterface' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:navigation {"overlayMenu":"never","ariaLabel":"<?php echo esc_attr_x( 'Course categories', 'navigation landmark label', 'campusinterface' ); ?>","fontSize":"sm","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Data and analytics', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/course-category/data-and-analytics/' ) ); ?>","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Web development', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/course-category/web-development/' ) ); ?>","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Design', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/course-category/design/' ) ); ?>","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Communication', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/course-category/communication/' ) ); ?>","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'All courses', 'campusinterface' ); ?>","url":"<?php echo esc_url( campusinterface_courses_url() ); ?>","kind":"custom"} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"fontSize":"base"} -->
			<h2 class="wp-block-heading has-base-font-size"><?php esc_html_e( 'Academy', 'campusinterface' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:navigation {"overlayMenu":"never","ariaLabel":"<?php echo esc_attr_x( 'Academy', 'navigation landmark label', 'campusinterface' ); ?>","fontSize":"sm","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'About', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/about/' ) ); ?>","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Instructors', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/instructors/' ) ); ?>","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Events', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/events/' ) ); ?>","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Blog', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/blog/' ) ); ?>","kind":"custom"} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"fontSize":"base"} -->
			<h2 class="wp-block-heading has-base-font-size"><?php esc_html_e( 'Help', 'campusinterface' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:navigation {"overlayMenu":"never","ariaLabel":"<?php echo esc_attr_x( 'Help', 'navigation landmark label', 'campusinterface' ); ?>","fontSize":"sm","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Questions and answers', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/faq/' ) ); ?>","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Pricing', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/pricing/' ) ); ?>","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Contact', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/contact/' ) ); ?>","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Accessibility', 'campusinterface' ); ?>","url":"<?php echo esc_url( home_url( '/accessibility/' ) ); ?>","kind":"custom"} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-title {"level":0,"fontSize":"sm"} /-->

		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><a href="<?php echo esc_url( campusinterface_privacy_policy_url() ); ?>"><?php esc_html_e( 'Privacy policy', 'campusinterface' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
