<?php
/**
 * Title: Latest posts grid
 * Slug: campusinterface/posts-grid
 * Categories: query, posts
 * Block Types: core/query
 * Keywords: news, blog, latest, posts
 * Viewport Width: 1400
 * Description: A heading and a three-column grid of the latest posts with image, title and date.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'News and announcements', 'campusinterface' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":21,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"default"}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"16rem"}} -->
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
			<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"lg"} /-->
			<!-- wp:post-date {"fontSize":"sm"} /-->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'No posts yet.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
