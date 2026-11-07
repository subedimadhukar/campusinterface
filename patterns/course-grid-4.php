<?php
/**
 * Title: Course grid, 4 columns
 * Slug: campusinterface/course-grid-4
 * Categories: campusinterface-courses, query
 * Block Types: core/query
 * Keywords: courses, catalogue, grid, lms, compact, public lms
 * Viewport Width: 1400
 * Description: A compact four-column grid of eight Public LMS courses in the minimal card style, with level and lesson count under each title.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'New this term', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"queryId":32,"query":{"perPage":8,"pages":0,"offset":0,"postType":"plms_course","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"publiclms/course-query","align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"className":"is-style-campusinterface-minimal","layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"13rem"}} -->
			<!-- wp:post-featured-image {"aspectRatio":"16/9","sizeSlug":"campusinterface-course-card"} /-->

			<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"base"} /-->

			<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"rating_summary"}}}},"className":"publiclms-course-card__rating","fontSize":"sm"} -->
			<p class="publiclms-course-card__rating has-sm-font-size"></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"fontSize":"sm","layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group has-sm-font-size">
				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"level"}}}}} -->
				<p></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"lesson_count"}}}}} -->
				<p></p>
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

	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph -->
		<p><a href="<?php echo esc_url( campusinterface_courses_url() ); ?>"><?php esc_html_e( 'See the full course catalogue', 'campusinterface' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
