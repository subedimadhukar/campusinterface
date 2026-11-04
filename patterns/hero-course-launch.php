<?php
/**
 * Title: Hero: course launch
 * Slug: campusinterface/hero-course-launch
 * Categories: campusinterface-hero, banner
 * Keywords: hero, launch, cohort, new course, enrol, landing
 * Viewport Width: 1400
 * Description: A dark band announcing a new course cohort: start date badge, course title, summary, key facts, a button and a wide course illustration.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","className":"is-style-campusinterface-band-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-campusinterface-band-dark" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"is-style-campusinterface-badge"} -->
		<p class="is-style-campusinterface-badge"><?php esc_html_e( 'New cohort · Starts 12 January', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:heading {"textAlign":"center","level":1} -->
	<h1 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'UX Design Essentials', 'campusinterface' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"lg"} -->
	<p class="has-text-align-center has-lg-font-size"><?php esc_html_e( 'An eight-week, project-based course with Elena Ortiz. Research a real problem, sketch and test your ideas, and finish with a case study you can show employers.', 'campusinterface' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"fontSize":"sm","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<div class="wp-block-group has-sm-font-size">
		<!-- wp:paragraph -->
		<p><?php esc_html_e( '8 weeks', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( '18 lessons', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Live critique every Thursday', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Certificate on completion', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/courses/ux-design-essentials/' ) ); ?>"><?php esc_html_e( 'Reserve your place', 'campusinterface' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
	<p class="has-text-align-center has-sm-font-size"><a href="#curriculum"><?php esc_html_e( 'See what you will learn each week', 'campusinterface' ); ?></a></p>
	<!-- /wp:paragraph -->

	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-campusinterface-hero-image","style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}}} -->
	<figure class="wp-block-image size-full is-campusinterface-hero-image" style="margin-top:var(--wp--preset--spacing--70)"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/course-ux-design.svg' ) ); ?>" alt="<?php esc_attr_e( 'Illustration of a phone wireframe, a moodboard and colour swatches from the UX Design Essentials course', 'campusinterface' ); ?>"/></figure>
	<!-- /wp:image -->
</div>
<!-- /wp:group -->
