<?php
/**
 * Title: Course grid
 * Slug: campusinterface/course-grid
 * Categories: campusinterface-courses, query
 * Block Types: core/query
 * Keywords: courses, catalogue, grid, lms
 * Viewport Width: 1400
 * Description: A heading and a three-column grid of the latest courses from the Public LMS plugin, with a link to the course catalogue.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

$campusinterface_catalogue_url = get_post_type_archive_link( 'plms_course' );
if ( ! $campusinterface_catalogue_url ) {
	$campusinterface_catalogue_url = home_url( '/courses/' );
}
?>
<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Popular courses', 'campusinterface' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":31,"query":{"perPage":6,"pages":0,"offset":0,"postType":"plms_course","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"default"}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"16rem"}} -->
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","sizeSlug":"campusinterface-course-card"} /-->
			<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"lg"} /-->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'New courses are on their way. Check back soon.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $campusinterface_catalogue_url ); ?>"><?php esc_html_e( 'View all courses', 'campusinterface' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
