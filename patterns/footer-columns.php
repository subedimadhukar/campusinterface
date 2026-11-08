<?php
/**
 * Title: Footer with columns
 * Slug: campusinterface/footer-columns
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: footer, columns, links, sitemap, navigation
 * Viewport Width: 1400
 * Description: A four-column footer: the site title, tagline and a sentence, then link lists for courses, the academy and help, with the privacy policy link underneath. The course list shows the site's busiest course categories; the other lists link only pages the site has published, and a list with nothing to link is left out.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

$campusinterface_courses = array();
if ( taxonomy_exists( 'plms_course_category' ) ) {
	$campusinterface_terms = get_terms(
		array(
			'taxonomy'   => 'plms_course_category',
			'number'     => 4,
			'orderby'    => 'count',
			'order'      => 'DESC',
			'hide_empty' => true,
		)
	);
	foreach ( is_array( $campusinterface_terms ) ? $campusinterface_terms : array() as $campusinterface_term ) {
		$campusinterface_link = get_term_link( $campusinterface_term );
		if ( is_string( $campusinterface_link ) ) {
			$campusinterface_courses[ $campusinterface_term->name ] = $campusinterface_link;
		}
	}
}
$campusinterface_courses[ __( 'All courses', 'campusinterface' ) ] = campusinterface_catalogue_url();

$campusinterface_columns = array(
	array(
		__( 'Courses', 'campusinterface' ),
		_x( 'Course categories', 'navigation landmark label', 'campusinterface' ),
		campusinterface_navigation_links( $campusinterface_courses ),
	),
	array(
		__( 'Academy', 'campusinterface' ),
		_x( 'Academy', 'navigation landmark label', 'campusinterface' ),
		campusinterface_navigation_links(
			array(
				__( 'About', 'campusinterface' )       => campusinterface_page_url( 'about' ),
				__( 'Instructors', 'campusinterface' ) => campusinterface_page_url( 'instructors' ),
				__( 'Events', 'campusinterface' )      => campusinterface_page_url( 'events' ),
				__( 'Blog', 'campusinterface' )        => campusinterface_blog_url(),
			)
		),
	),
	array(
		__( 'Help', 'campusinterface' ),
		_x( 'Help', 'navigation landmark label', 'campusinterface' ),
		campusinterface_navigation_links(
			array(
				__( 'Questions and answers', 'campusinterface' ) => campusinterface_page_url( 'faq' ),
				__( 'Pricing', 'campusinterface' )       => campusinterface_page_url( 'pricing' ),
				__( 'Contact', 'campusinterface' )       => campusinterface_page_url( 'contact' ),
				__( 'Accessibility', 'campusinterface' ) => campusinterface_page_url( 'accessibility' ),
			)
		),
	),
);
$campusinterface_privacy = campusinterface_privacy_policy_url();
?>
<!-- wp:group {"backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"34%"} -->
		<div class="wp-block-column" style="flex-basis:34%">
			<!-- wp:site-title {"level":0} /-->

			<!-- wp:site-tagline {"fontSize":"sm"} /-->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'Practical courses in data, web development, design and communication, taught by people who do the work.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<?php
		foreach ( $campusinterface_columns as $campusinterface_column ) :
			if ( '' === $campusinterface_column[2] ) {
				continue;
			}
			?>

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"fontSize":"base"} -->
			<h2 class="wp-block-heading has-base-font-size"><?php echo esc_html( $campusinterface_column[0] ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:navigation {"overlayMenu":"never","ariaLabel":"<?php echo esc_attr( $campusinterface_column[1] ); ?>","fontSize":"sm","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
				<?php echo $campusinterface_column[2]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup; campusinterface_navigation_links() escapes each label and URL. ?>
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-title {"level":0,"fontSize":"sm"} /-->
		<?php if ( $campusinterface_privacy ) : ?>

		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><a href="<?php echo esc_url( $campusinterface_privacy ); ?>"><?php esc_html_e( 'Privacy policy', 'campusinterface' ); ?></a></p>
		<!-- /wp:paragraph -->
		<?php endif; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
