<?php
/**
 * Title: Text and image
 * Slug: campusinterface/text-and-image
 * Categories: about, media
 * Keywords: about, intro, media, image
 * Viewport Width: 1400
 * Description: An image beside a heading, a paragraph and a link button.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:media-text {"align":"wide","mediaType":"image","verticalAlignment":"center"} -->
<div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/learning-illustration.svg' ) ); ?>" alt=""/></figure><div class="wp-block-media-text__content">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'A place to learn, at your own pace', 'campusinterface' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Tell visitors who you teach and why it works: small classes, practical projects, and teachers who answer questions.', 'campusinterface' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'About us', 'campusinterface' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div></div>
<!-- /wp:media-text -->
