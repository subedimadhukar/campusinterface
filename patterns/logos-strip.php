<?php
/**
 * Title: Logos strip
 * Slug: campusinterface/logos-strip
 * Categories: campusinterface-about, about
 * Keywords: logos, partners, clients, trusted by, accreditation, brands
 * Viewport Width: 1400
 * Description: A short line and a row of five partner logos that wraps on small screens. The logos are fictional placeholders drawn for the theme.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
	<p class="has-text-align-center has-sm-font-size"><?php esc_html_e( 'Learners from these organisations study with us', 'campusinterface' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:image {"width":"10rem","sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-northfield-college.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Northfield College', 'partner organisation name', 'campusinterface' ); ?>" style="width:10rem;height:auto"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"width":"10rem","sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-bluegate-labs.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Bluegate Labs', 'partner organisation name', 'campusinterface' ); ?>" style="width:10rem;height:auto"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"width":"10rem","sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-harbor-and-pine.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Harbor & Pine', 'partner organisation name', 'campusinterface' ); ?>" style="width:10rem;height:auto"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"width":"10rem","sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-meridian-trust.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Meridian Trust', 'partner organisation name', 'campusinterface' ); ?>" style="width:10rem;height:auto"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"width":"10rem","sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-openfield-school.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Openfield School', 'partner organisation name', 'campusinterface' ); ?>" style="width:10rem;height:auto"/></figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
