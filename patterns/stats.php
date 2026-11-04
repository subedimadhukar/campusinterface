<?php
/**
 * Title: Statistics
 * Slug: campusinterface/stats
 * Categories: campusinterface-about, about
 * Keywords: stats, numbers, counters, figures, results
 * Viewport Width: 1400
 * Description: Four large figures on a dark band: learners, courses, instructors and average rating. Static numbers, no animation.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","className":"is-style-campusinterface-band-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-campusinterface-band-dark" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'The academy in numbers', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"12rem"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","lineHeight":"1.1"}},"fontSize":"4xl","fontFamily":"display"} -->
			<p class="has-display-font-family has-4-xl-font-size" style="font-weight:600;line-height:1.1"><?php echo esc_html_x( '4,800+', 'statistic', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'learners enrolled', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","lineHeight":"1.1"}},"fontSize":"4xl","fontFamily":"display"} -->
			<p class="has-display-font-family has-4-xl-font-size" style="font-weight:600;line-height:1.1"><?php echo esc_html_x( '36', 'statistic', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'courses in six subjects', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","lineHeight":"1.1"}},"fontSize":"4xl","fontFamily":"display"} -->
			<p class="has-display-font-family has-4-xl-font-size" style="font-weight:600;line-height:1.1"><?php echo esc_html_x( '18', 'statistic', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'working instructors', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","lineHeight":"1.1"}},"fontSize":"4xl","fontFamily":"display"} -->
			<p class="has-display-font-family has-4-xl-font-size" style="font-weight:600;line-height:1.1"><?php echo esc_html_x( '4.8/5', 'statistic', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'average rating from 1,200 reviews', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
