<?php
/**
 * Title: Text and image
 * Slug: campusinterface/text-and-image
 * Categories: campusinterface-about, about, media
 * Keywords: about, intro, media, image, story, mission
 * Viewport Width: 1400
 * Description: An illustration beside a heading, a paragraph and a link button, for an "about us" or mission section.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:media-text {"align":"wide","mediaType":"image","verticalAlignment":"center"} -->
	<div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/learning-illustration.svg' ) ); ?>" alt="<?php esc_attr_e( 'Illustration of a laptop showing a lesson, an open book and a graduation cap', 'campusinterface' ); ?>"/></figure><div class="wp-block-media-text__content">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Learn with people who do the work', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Every instructor works in the field they teach. Classes stay small, projects come from real jobs, and questions get an answer within one working day.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( campusinterface_page_link( 'about' ) ); ?>"><?php esc_html_e( 'About the academy', 'campusinterface' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div></div>
	<!-- /wp:media-text -->
</div>
<!-- /wp:group -->
