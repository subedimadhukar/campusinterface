<?php
/**
 * Title: Instructor grid
 * Slug: campusinterface/instructor-grid
 * Categories: campusinterface-team, team
 * Keywords: instructors, teachers, team, staff, faculty, coaches
 * Viewport Width: 1400
 * Description: Four instructor profiles with a portrait, name, subject and a one-line biography.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div id="instructors" class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Learn from people who do the work', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Every instructor works in the field they teach and answers questions within one working day.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"13rem"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/instructor-asha-gurung.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Portrait illustration of Dr. Asha Gurung', 'image alt text', 'campusinterface' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"xl"} -->
			<h3 class="wp-block-heading has-xl-font-size"><?php echo esc_html_x( 'Dr. Asha Gurung', 'person name', 'campusinterface' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
			<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"><?php esc_html_e( 'Data and analytics', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'A former public health analyst who has taught Python and SQL to more than 1,500 learners.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/instructor-marcus-bell.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Portrait illustration of Marcus Bell', 'image alt text', 'campusinterface' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"xl"} -->
			<h3 class="wp-block-heading has-xl-font-size"><?php echo esc_html_x( 'Marcus Bell', 'person name', 'campusinterface' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
			<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"><?php esc_html_e( 'Web development', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'A front-end engineer for twelve years who teaches HTML, CSS and JavaScript from first principles.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/instructor-elena-ortiz.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Portrait illustration of Elena Ortiz', 'image alt text', 'campusinterface' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"xl"} -->
			<h3 class="wp-block-heading has-xl-font-size"><?php echo esc_html_x( 'Elena Ortiz', 'person name', 'campusinterface' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
			<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"><?php esc_html_e( 'UX and product design', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'A product designer who has led research and design teams at two start-ups.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/instructor-daniel-okafor.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Portrait illustration of Daniel Okafor', 'image alt text', 'campusinterface' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"xl"} -->
			<h3 class="wp-block-heading has-xl-font-size"><?php echo esc_html_x( 'Daniel Okafor', 'person name', 'campusinterface' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
			<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"><?php esc_html_e( 'Communication', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'A speaker coach and former radio presenter who helps learners speak with confidence.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
