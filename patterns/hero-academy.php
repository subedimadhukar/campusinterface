<?php
/**
 * Title: Hero: academy
 * Slug: campusinterface/hero-academy
 * Categories: campusinterface-hero, banner
 * Keywords: hero, header, banner, intro, academy, school, landing
 * Viewport Width: 1400
 * Description: A tinted band with a headline, an introduction, two buttons and a line of proof beside an illustration. The illustration loads with high fetch priority.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:group {"align":"full","className":"is-style-campusinterface-band-tint","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-campusinterface-band-tint" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:paragraph {"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
			<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"><?php esc_html_e( 'Online courses and live classes', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1} -->
			<h1 class="wp-block-heading"><?php esc_html_e( 'Learn the skills that move your career forward', 'campusinterface' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"lg"} -->
			<p class="has-lg-font-size"><?php esc_html_e( 'Practical courses in data, web development, design and communication, taught by people who do the work every day. Study at your own pace, get feedback on real projects and earn a certificate.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( campusinterface_courses_url() ); ?>"><?php esc_html_e( 'Explore courses', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#how-it-works"><?php esc_html_e( 'How it works', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( '4,800+ learners · 36 courses · Rated 4.8 out of 5', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-campusinterface-hero-image"} -->
			<figure class="wp-block-image size-full is-campusinterface-hero-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/learning-illustration.svg' ) ); ?>" alt="<?php esc_attr_e( 'Illustration of a laptop showing a lesson, an open book and a graduation cap', 'campusinterface' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
