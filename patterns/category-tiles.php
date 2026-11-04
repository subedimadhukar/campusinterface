<?php
/**
 * Title: Course categories
 * Slug: campusinterface/category-tiles
 * Categories: campusinterface-courses
 * Keywords: categories, topics, subjects, departments, tiles
 * Viewport Width: 1400
 * Description: Six linked tiles, one per course category, each with an icon, the category name and its number of courses.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Explore by subject', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Thirty-six courses across six subjects, from your first spreadsheet to your first conference talk.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50","margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"14rem"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--60)">
		<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:image {"width":"3rem","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-data.svg' ) ); ?>" alt="" style="width:3rem"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><a href="<?php echo esc_url( home_url( '/course-category/data-and-analytics/' ) ); ?>"><?php esc_html_e( 'Data and analytics', 'campusinterface' ); ?></a></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( '8 courses', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:image {"width":"3rem","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-code.svg' ) ); ?>" alt="" style="width:3rem"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><a href="<?php echo esc_url( home_url( '/course-category/web-development/' ) ); ?>"><?php esc_html_e( 'Web development', 'campusinterface' ); ?></a></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( '10 courses', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:image {"width":"3rem","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-design.svg' ) ); ?>" alt="" style="width:3rem"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><a href="<?php echo esc_url( home_url( '/course-category/design/' ) ); ?>"><?php esc_html_e( 'Design', 'campusinterface' ); ?></a></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( '6 courses', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:image {"width":"3rem","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-speaking.svg' ) ); ?>" alt="" style="width:3rem"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><a href="<?php echo esc_url( home_url( '/course-category/communication/' ) ); ?>"><?php esc_html_e( 'Communication', 'campusinterface' ); ?></a></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( '5 courses', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:image {"width":"3rem","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-business.svg' ) ); ?>" alt="" style="width:3rem"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><a href="<?php echo esc_url( home_url( '/course-category/business-and-marketing/' ) ); ?>"><?php esc_html_e( 'Business and marketing', 'campusinterface' ); ?></a></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( '4 courses', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:image {"width":"3rem","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-career.svg' ) ); ?>" alt="" style="width:3rem"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><a href="<?php echo esc_url( home_url( '/course-category/career-skills/' ) ); ?>"><?php esc_html_e( 'Career skills', 'campusinterface' ); ?></a></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( '3 courses', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
