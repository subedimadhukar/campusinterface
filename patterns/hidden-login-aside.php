<?php
/**
 * Title: Log-in page aside
 * Slug: campusinterface/hidden-login-aside
 * Inserter: no
 * Description: The coloured half of the split log-in template: site title, a welcome line and an illustration.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"className":"is-style-campusinterface-band-primary","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|60","bottom":"var:preset|spacing|70","left":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
<div class="wp-block-group is-style-campusinterface-band-primary" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--60)">
	<!-- wp:site-title {"level":0} /-->

	<!-- wp:group {"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"fontSize":"3xl"} -->
		<h2 class="wp-block-heading has-3-xl-font-size"><?php esc_html_e( 'Your courses are waiting', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"lg"} -->
		<p class="has-lg-font-size"><?php esc_html_e( 'Pick up where you left off, check your progress and download your certificates.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/learning-illustration.svg' ) ); ?>" alt="<?php esc_attr_e( 'Illustration of a laptop showing a lesson, an open book and a graduation cap', 'campusinterface' ); ?>"/></figure>
	<!-- /wp:image -->
</div>
<!-- /wp:group -->
