<?php
/**
 * Title: Single course hero
 * Slug: campusinterface/hidden-course-hero
 * Inserter: no
 * Description: Top of the single course template: subject, title, summary, a meta row bound to publiclms/course-field, the enrol button and the featured image.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","className":"is-style-campusinterface-band-tint","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-campusinterface-band-tint" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:post-terms {"term":"plms_course_category","className":"is-style-campusinterface-eyebrow"} /-->

			<!-- wp:post-title {"level":1} /-->

			<!-- wp:post-excerpt {"fontSize":"lg"} /-->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"fontSize":"sm","layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group has-sm-font-size">
				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"instructor"}}}},"style":{"typography":{"fontWeight":"600"}}} -->
				<p style="font-weight:600"></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"level"}}}}} -->
				<p></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"lesson_count"}}}}} -->
				<p></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"duration"}}}}} -->
				<p></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"enrolled_count"}}}}} -->
				<p></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"metadata":{"bindings":{"url":{"source":"publiclms/course-field","args":{"key":"enroll_url"}},"text":{"source":"publiclms/course-field","args":{"key":"enroll_label"}}}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Enrol now', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:post-featured-image {"aspectRatio":"16/9","sizeSlug":"large"} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
