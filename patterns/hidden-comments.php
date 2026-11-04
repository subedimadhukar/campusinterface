<?php
/**
 * Title: Comments
 * Slug: campusinterface/hidden-comments
 * Inserter: no
 * Description: The comments area of single posts: comment list, pagination and the reply form.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:comments -->
<div class="wp-block-comments">
	<!-- wp:comments-title {"level":2,"fontSize":"2xl"} /-->

	<!-- wp:comment-template -->
		<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
		<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--50)">
			<!-- wp:avatar {"size":40} /-->

			<!-- wp:group {"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:comment-author-name {"fontSize":"sm"} /-->
				<!-- wp:comment-date {"fontSize":"xs"} /-->
				<!-- wp:comment-content /-->
				<!-- wp:comment-reply-link {"fontSize":"sm"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	<!-- /wp:comment-template -->

	<!-- wp:comments-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:comments-pagination-previous /-->
		<!-- wp:comments-pagination-numbers /-->
		<!-- wp:comments-pagination-next /-->
	<!-- /wp:comments-pagination -->

	<!-- wp:post-comments-form /-->
</div>
<!-- /wp:comments -->
