<?php
/**
 * Title: Course reviews area
 * Slug: campusinterface/hidden-course-reviews
 * Inserter: no
 * Description: The reviews area of the single course template. Shows the Public LMS course reviews pattern once the plugin registers it (phase 2) and nothing before, so the course page has no empty section.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

if ( campusinterface_has_plugin_pattern( 'publiclms/course-reviews' ) ) :
	?>
<!-- wp:pattern {"slug":"publiclms/course-reviews"} /-->
	<?php
endif;
