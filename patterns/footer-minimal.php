<?php
/**
 * Title: Footer, minimal
 * Slug: campusinterface/footer-minimal
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: footer, minimal, slim, small print
 * Viewport Width: 1400
 * Description: One slim row with the site title and links to the accessibility statement, privacy policy and contact page, each once the site has published it. Used on the lesson, quiz and assignment templates.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

$campusinterface_pages = campusinterface_footer_page_links();
?>
<!-- wp:group {"className":"is-style-campusinterface-footer-bar","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-campusinterface-footer-bar" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-title {"level":0,"fontSize":"sm"} /-->

		<?php if ( $campusinterface_pages ) : ?>
		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><?php echo $campusinterface_pages; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in campusinterface_text_links(). ?></p>
		<!-- /wp:paragraph -->
		<?php endif; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
