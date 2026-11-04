<?php
/**
 * Title: Process steps
 * Slug: campusinterface/process-steps
 * Categories: campusinterface-about, about
 * Keywords: steps, process, how it works, timeline, journey
 * Viewport Width: 1400
 * Description: Four numbered steps that explain how learning works, from choosing a course to earning a certificate. The section has the anchor "how-it-works".
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div id="how-it-works" class="wp-block-group alignfull has-surface-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'How it works', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"13rem"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"is-style-campusinterface-step-number"} -->
			<p class="is-style-campusinterface-step-number"><?php echo esc_html_x( '1', 'step number', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Choose a course', 'campusinterface' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'Browse 36 courses by subject and level, or start with one of the three free courses.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"is-style-campusinterface-step-number"} -->
			<p class="is-style-campusinterface-step-number"><?php echo esc_html_x( '2', 'step number', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Learn in short lessons', 'campusinterface' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'Watch, read and practise in lessons of ten to fifteen minutes.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"is-style-campusinterface-step-number"} -->
			<p class="is-style-campusinterface-step-number"><?php echo esc_html_x( '3', 'step number', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Practise and get feedback', 'campusinterface' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'Check your understanding with quizzes and send your projects to the instructor for review.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"is-style-campusinterface-step-number"} -->
			<p class="is-style-campusinterface-step-number"><?php echo esc_html_x( '4', 'step number', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Earn your certificate', 'campusinterface' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'Finish every lesson, pass the final quiz and download your certificate.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
