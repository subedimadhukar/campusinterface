<?php
/**
 * Title: Instructor dashboard area
 * Slug: campusinterface/hidden-instructor-dashboard
 * Inserter: no
 * Description: The body of the Instructor Dashboard page template. Shows the Public LMS instructor dashboard once the plugin registers it (phase 2); before that, the page title and a link to the course tools in the WordPress admin.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

if ( campusinterface_has_plugin_pattern( 'publiclms/instructor-dashboard' ) ) :
	?>
<!-- wp:pattern {"slug":"publiclms/instructor-dashboard"} /-->
	<?php
else :
	?>
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Your instructor dashboard is on its way. Until then, manage your courses, lessons and learners in the WordPress admin.', 'campusinterface' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons">
	<!-- wp:button -->
	<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( admin_url( 'admin.php?page=publiclms' ) ); ?>"><?php esc_html_e( 'Open course tools', 'campusinterface' ); ?></a></div>
	<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
	<?php
endif;
