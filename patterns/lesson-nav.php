<?php
/**
 * Title: Lesson bar
 * Slug: campusinterface/lesson-nav
 * Categories: header
 * Block Types: core/template-part/lesson-nav
 * Keywords: lesson, header, focus, distraction-free, dashboard
 * Viewport Width: 1400
 * Description: A slim bar for lessons, quizzes and assignments: the site title, and on the right the learner's dashboard and a log-out link. No main navigation, so learners stay on the lesson. The way back to the course is the Public LMS lesson header's course button, just below, so the bar does not repeat it.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

$campusinterface_dashboard_url = campusinterface_lms_page_url( 'publiclms_dashboard_page_id' );
?>
<!-- wp:group {"className":"is-style-campusinterface-header-bar","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-campusinterface-header-bar" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-title {"level":0,"fontSize":"base"} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"fontSize":"sm","layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group has-sm-font-size">
			<?php if ( $campusinterface_dashboard_url ) : ?>
			<!-- wp:paragraph -->
			<p><a href="<?php echo esc_url( $campusinterface_dashboard_url ); ?>"><?php esc_html_e( 'My dashboard', 'campusinterface' ); ?></a></p>
			<!-- /wp:paragraph -->
			<?php endif; ?>


			<!-- wp:loginout /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
