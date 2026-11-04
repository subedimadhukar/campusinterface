<?php
/**
 * Title: Course filters
 * Slug: campusinterface/hidden-course-filters
 * Inserter: no
 * Description: The filters column of the course archive: a course search and links to subjects and levels. Public LMS can replace or extend this region with its own filter blocks.
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

	<!-- wp:search {"label":"<?php echo esc_attr__( 'Search courses', 'campusinterface' ); ?>","placeholder":"<?php echo esc_attr__( 'For example: Python', 'campusinterface' ); ?>","buttonText":"<?php echo esc_attr__( 'Search', 'campusinterface' ); ?>","buttonPosition":"button-inside","query":{"post_type":"plms_course"}} /-->

	<!-- wp:categories {"taxonomy":"plms_course_category","label":"<?php echo esc_attr__( 'Subjects', 'campusinterface' ); ?>","showPostCounts":true,"fontSize":"sm"} /-->

	<!-- wp:categories {"taxonomy":"plms_level","label":"<?php echo esc_attr__( 'Levels', 'campusinterface' ); ?>","showPostCounts":true,"fontSize":"sm"} /-->
</div>
<!-- /wp:group -->
