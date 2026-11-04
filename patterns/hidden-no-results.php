<?php
/**
 * Title: No results
 * Slug: campusinterface/hidden-no-results
 * Inserter: no
 * Description: Shown by Query Loops that find nothing: a short message and a search form.
 *
 * @package CampusInterface
 * @since 0.1.0
 */

?>
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Nothing matched your search. Try different keywords.', 'campusinterface' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'search form label', 'campusinterface' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr_x( 'Search courses, pages and posts', 'search form placeholder', 'campusinterface' ); ?>","buttonText":"<?php echo esc_attr_x( 'Search', 'search button text', 'campusinterface' ); ?>"} /-->
