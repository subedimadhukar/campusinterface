<?php
/**
 * Title: 404
 * Slug: campusinterface/hidden-404
 * Inserter: no
 * Description: Content of the 404 template: a heading, a short explanation and a search form.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading"><?php echo esc_html_x( 'Page not found', 'Heading for a page that does not exist', 'campusinterface' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'The page you were looking for does not exist or has moved. Try searching for it instead.', 'campusinterface' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'search form label', 'campusinterface' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr_x( 'Search courses, pages and posts', 'search form placeholder', 'campusinterface' ); ?>","buttonText":"<?php echo esc_attr_x( 'Search', 'search button text', 'campusinterface' ); ?>"} /-->
