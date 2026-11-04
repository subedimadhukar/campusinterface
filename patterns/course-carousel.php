<?php
/**
 * Title: Course carousel
 * Slug: campusinterface/course-carousel
 * Categories: campusinterface-courses, query
 * Block Types: core/query
 * Keywords: courses, carousel, slider, scroll, lms, public lms
 * Viewport Width: 1400
 * Description: A horizontally scrolling row of Public LMS course cards that snaps card by card. Pure CSS scroll snap: no JavaScript, and it scrolls with touch, trackpad, mouse wheel and keyboard.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Starting soon', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><?php esc_html_e( 'Scroll sideways to see more courses.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"queryId":33,"query":{"perPage":8,"pages":0,"offset":0,"postType":"plms_course","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"publiclms/course-query","align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"className":"is-style-campusinterface-carousel","layout":{"type":"default"}} -->
			<!-- wp:post-featured-image {"aspectRatio":"16/9","sizeSlug":"campusinterface-course-card"} /-->

			<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"level"}}}},"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
			<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"></p>
			<!-- /wp:paragraph -->

			<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"lg"} /-->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"lesson_count"}}}},"fontSize":"sm"} -->
				<p class="has-sm-font-size"></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"price"}}}},"style":{"typography":{"fontWeight":"700"}}} -->
				<p style="font-weight:700"></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'New courses are on their way. Check back soon.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
