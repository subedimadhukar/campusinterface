<?php
/**
 * Title: Course filters
 * Slug: campusinterface/hidden-course-filters
 * Inserter: no
 * Description: The filters column of the course archive: a heading and the Public LMS Course filters block (search, subject, level, price, rating and sort), which updates the course list in place.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"metadata":{"name":"<?php echo esc_attr__( 'Course filters', 'campusinterface' ); ?>"},"className":"campusinterface-course-filters","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group campusinterface-course-filters">
	<!-- wp:heading {"fontSize":"lg"} -->
	<h2 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Find a course', 'campusinterface' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:publiclms/course-filters /-->
</div>
<!-- /wp:group -->
