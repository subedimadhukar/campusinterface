<?php
/**
 * Title: Hero with image
 * Slug: campusinterface/hero
 * Categories: campusinterface-hero, banner
 * Keywords: hero, header, banner, intro, landing
 * Viewport Width: 1400
 * Description: A large headline, an introduction, two buttons and an illustration. The image loads with high fetch priority.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"primary-soft","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-soft-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:paragraph {"fontSize":"sm","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.08em"}},"textColor":"primary"} -->
			<p class="has-primary-color has-text-color has-sm-font-size" style="font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php esc_html_e( 'Online courses and live classes', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1} -->
			<h1 class="wp-block-heading"><?php esc_html_e( 'Learn the skills that move you forward', 'campusinterface' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"lg"} -->
			<p class="has-lg-font-size"><?php esc_html_e( 'Practical courses taught by people who do the work. Learn at your own pace, track your progress and earn a certificate.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Explore courses', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'How it works', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-campusinterface-hero-image"} -->
			<figure class="wp-block-image size-full is-campusinterface-hero-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/learning-illustration.svg' ) ); ?>" alt="<?php esc_attr_e( 'Illustration of an open book, a laptop and a graduation cap', 'campusinterface' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
