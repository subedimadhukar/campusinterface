<?php
/**
 * Title: Course grid, 3 columns
 * Slug: campusinterface/course-grid
 * Categories: campusinterface-courses, query
 * Block Types: core/query
 * Keywords: courses, catalogue, grid, lms, public lms
 * Viewport Width: 1400
 * Description: A heading, a link to the catalogue and a three-column grid of the latest Public LMS courses, as classic cards with level, lesson count, duration and price. The course title is the card's only link.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:group {"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Popular courses', 'campusinterface' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Start with one of the courses our learners recommend most.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( campusinterface_courses_url() ); ?>"><?php esc_html_e( 'View all courses', 'campusinterface' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"queryId":31,"query":{"perPage":6,"pages":0,"offset":0,"postType":"plms_course","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"publiclms/course-query","align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"className":"is-style-campusinterface-classic","layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"16rem"}} -->
			<!-- wp:post-featured-image {"aspectRatio":"16/9","sizeSlug":"campusinterface-course-card"} /-->

			<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"level"}}}},"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
			<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"></p>
			<!-- /wp:paragraph -->

			<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"lg"} /-->

			<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"rating_summary"}}}},"className":"publiclms-course-card__rating","fontSize":"sm"} -->
			<p class="publiclms-course-card__rating has-sm-font-size"></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"fontSize":"sm","layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group has-sm-font-size">
				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"lesson_count"}}}}} -->
				<p></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"duration"}}}}} -->
				<p></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"publiclms/course-field","args":{"key":"price"}}}},"style":{"typography":{"fontWeight":"700"}},"fontSize":"lg"} -->
			<p class="has-lg-font-size" style="font-weight:700"></p>
			<!-- /wp:paragraph -->
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
