<?php
/**
 * Title: Blog cards
 * Slug: campusinterface/blog-cards
 * Categories: query, posts
 * Keywords: news, blog, latest, posts, articles, cards
 * Block Types: core/query
 * Viewport Width: 1400
 * Description: A heading and the three latest posts as cards with image, category, title, excerpt and date.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'From the blog', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Study tips, learner stories and news from the academy.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"queryId":21,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"className":"is-style-campusinterface-classic","layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"16rem"}} -->
			<!-- wp:post-featured-image {"aspectRatio":"16/9"} /-->

			<!-- wp:post-terms {"term":"category","className":"is-style-campusinterface-eyebrow"} /-->

			<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"lg"} /-->

			<!-- wp:post-excerpt {"excerptLength":20,"fontSize":"sm"} /-->

			<!-- wp:post-date {"fontSize":"xs"} /-->
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
