<?php
/**
 * Title: Related courses
 * Slug: campusinterface/hidden-related-courses
 * Inserter: no
 * Description: Bottom of the single course template: three related courses as classic cards. With Public LMS 0.1.0+ (contract 1.2.0) the query leaves out the current course and prefers courses in the same categories.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'You might also like', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"queryId":41,"query":{"perPage":3,"pages":0,"offset":0,"postType":"plms_course","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"publiclmsRelated":true},"namespace":"publiclms/course-query","align":"wide","layout":{"type":"default"}} -->
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
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
