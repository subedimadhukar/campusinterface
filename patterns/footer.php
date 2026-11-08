<?php
/**
 * Title: Footer
 * Slug: campusinterface/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: footer, site title, tagline, navigation, links
 * Viewport Width: 1400
 * Description: Site title and tagline beside the footer navigation, with links to the accessibility statement, privacy policy and contact page underneath. Only pages the site has are linked: the course catalogue while Public LMS is active, and the Instructors, Events, About, Accessibility and Contact pages and the privacy policy once they are published.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

$campusinterface_nav   = campusinterface_navigation_links(
	array(
		__( 'Courses', 'campusinterface' )     => campusinterface_catalogue_url(),
		__( 'Instructors', 'campusinterface' ) => campusinterface_page_url( 'instructors' ),
		__( 'Events', 'campusinterface' )      => campusinterface_page_url( 'events' ),
		__( 'About', 'campusinterface' )       => campusinterface_page_url( 'about' ),
	)
);
$campusinterface_pages = campusinterface_footer_page_links();
?>
<!-- wp:group {"backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:site-title {"level":0} /-->

			<!-- wp:site-tagline {"fontSize":"sm"} /-->
		</div>
		<!-- /wp:group -->

		<?php if ( $campusinterface_nav ) : ?>
		<!-- wp:navigation {"overlayMenu":"never","ariaLabel":"<?php echo esc_attr_x( 'Footer', 'navigation landmark label', 'campusinterface' ); ?>","fontSize":"sm","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
			<?php echo $campusinterface_nav; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup; campusinterface_navigation_links() escapes each label and URL. ?>
		<!-- /wp:navigation -->
		<?php endif; ?>
	</div>
	<!-- /wp:group -->
	<?php if ( $campusinterface_pages ) : ?>

	<!-- wp:separator {"align":"wide","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><?php echo $campusinterface_pages; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in campusinterface_text_links(). ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<?php endif; ?>
</div>
<!-- /wp:group -->
