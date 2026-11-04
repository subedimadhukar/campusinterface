<?php
/**
 * Title: Lesson course contents
 * Slug: campusinterface/hidden-lesson-contents
 * Inserter: no
 * Description: A closed Details block on lessons that opens the course curriculum, so the lesson stays distraction-free until the learner asks for the outline.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:details -->
<details class="wp-block-details"><summary><?php esc_html_e( 'Course contents', 'campusinterface' ); ?></summary>
	<!-- wp:pattern {"slug":"publiclms/lesson-sidebar"} /-->
</details>
<!-- /wp:details -->
