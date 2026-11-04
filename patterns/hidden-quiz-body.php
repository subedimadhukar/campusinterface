<?php
/**
 * Title: Quiz body
 * Slug: campusinterface/hidden-quiz-body
 * Inserter: no
 * Description: The body of the single quiz template. Shows the Public LMS quiz header and runner once the plugin registers them (phase 2); before that, the quiz title and a short note (Public LMS keeps quiz content closed until its quiz runner ships).
 *
 * @package CampusInterface
 * @since 0.2.0
 */

if ( campusinterface_has_plugin_pattern( 'publiclms/quiz-header' ) && campusinterface_has_plugin_pattern( 'publiclms/quiz-runner' ) ) :
	?>
<!-- wp:pattern {"slug":"publiclms/quiz-header"} /-->

<!-- wp:pattern {"slug":"publiclms/quiz-runner"} /-->
	<?php
else :
	?>
<!-- wp:post-title {"level":1} /-->

<!-- wp:group {"className":"is-style-campusinterface-placeholder","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-campusinterface-placeholder">
	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'This quiz is not open yet. Carry on with the lessons and check back soon.', 'campusinterface' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
	<?php
endif;
