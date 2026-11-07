<?php
/**
 * Title: Lesson course contents
 * Slug: campusinterface/hidden-lesson-contents
 * Inserter: no
 * Description: A closed Details block on lessons, quizzes and assignments that opens the course curriculum, so the page stays distraction-free until the learner asks for the outline. On phones, once Public LMS's Course content button works, its drawer takes over and this block is hidden (assets/css/blocks/details.css).
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:details {"className":"campusinterface-lesson-contents"} -->
<details class="wp-block-details campusinterface-lesson-contents"><summary><?php esc_html_e( 'Course contents', 'campusinterface' ); ?></summary>
	<!-- wp:pattern {"slug":"publiclms/lesson-sidebar"} /-->
</details>
<!-- /wp:details -->
