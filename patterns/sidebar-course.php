<?php
/**
 * Title: Course sidebar
 * Slug: campusinterface/sidebar-course
 * Categories: campusinterface-courses
 * Block Types: core/template-part/sidebar
 * Keywords: sidebar, enrol, price, course, aside
 * Viewport Width: 480
 * Description: The single course sidebar: the Public LMS enrol card (price, enrol button, what the course includes), then a card that points undecided learners to a person.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group">
	<!-- wp:pattern {"slug":"publiclms/course-enroll-card"} /-->

	<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group is-style-campusinterface-card">
		<!-- wp:heading {"fontSize":"lg"} -->
		<h2 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Not sure this is the right course?', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><?php esc_html_e( 'Tell us what you want to learn and an adviser will suggest where to start, usually within one working day.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Ask an adviser', 'campusinterface' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
