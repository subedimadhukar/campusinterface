<?php
/**
 * CampusInterface functions and definitions.
 *
 * The theme owns design only: no post types, blocks or shortcodes. Course
 * features come from the Public LMS plugin, whose templates this theme
 * overrides slug for slug (see docs/CONTRACTS.md).
 *
 * @package CampusInterface
 * @since 0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'campusinterface_setup' ) ) :
	/**
	 * Sets up theme supports and image sizes.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	function campusinterface_setup() {
		// 16:9 course card, used by the course grid pattern's Post Featured Image block.
		add_image_size( 'campusinterface-course-card', 480, 270, true );
	}
endif;
add_action( 'after_setup_theme', 'campusinterface_setup' );

/**
 * Lists the course card size in the editor's image size picker.
 *
 * @since 0.1.0
 *
 * @param array<string, string> $sizes Image size names keyed by slug.
 * @return array<string, string>
 */
function campusinterface_image_size_names( $sizes ) {
	$sizes['campusinterface-course-card'] = __( 'Course card (16:9)', 'campusinterface' );
	return $sizes;
}
add_filter( 'image_size_names_choose', 'campusinterface_image_size_names' );

/**
 * Registers the theme's block pattern categories.
 *
 * @since 0.1.0
 *
 * @return void
 */
function campusinterface_pattern_categories() {
	$categories = array(
		'campusinterface-hero'         => array(
			'label'       => _x( 'Heroes', 'Block pattern category', 'campusinterface' ),
			'description' => __( 'Page openers with a headline, text and calls to action.', 'campusinterface' ),
		),
		'campusinterface-courses'      => array(
			'label'       => _x( 'Courses', 'Block pattern category', 'campusinterface' ),
			'description' => __( 'Course grids, lists and featured courses.', 'campusinterface' ),
		),
		'campusinterface-pricing'      => array(
			'label'       => _x( 'Pricing', 'Block pattern category', 'campusinterface' ),
			'description' => __( 'Pricing tables and plan comparisons.', 'campusinterface' ),
		),
		'campusinterface-team'         => array(
			'label'       => _x( 'Team and instructors', 'Block pattern category', 'campusinterface' ),
			'description' => __( 'Instructor and staff profiles.', 'campusinterface' ),
		),
		'campusinterface-testimonials' => array(
			'label'       => _x( 'Testimonials', 'Block pattern category', 'campusinterface' ),
			'description' => __( 'Learner quotes and reviews.', 'campusinterface' ),
		),
		'campusinterface-cta'          => array(
			'label'       => _x( 'Calls to action', 'Block pattern category', 'campusinterface' ),
			'description' => __( 'Enrolment, sign-up and contact prompts.', 'campusinterface' ),
		),
		'campusinterface-events'       => array(
			'label'       => _x( 'Events', 'Block pattern category', 'campusinterface' ),
			'description' => __( 'Open days, webinars and cohort start dates.', 'campusinterface' ),
		),
		'campusinterface-faq'          => array(
			'label'       => _x( 'FAQ', 'Block pattern category', 'campusinterface' ),
			'description' => __( 'Frequently asked questions.', 'campusinterface' ),
		),
	);

	foreach ( $categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}
}
add_action( 'init', 'campusinterface_pattern_categories' );

/**
 * Registers block style variations, styled entirely with theme.json data.
 *
 * @since 0.1.0
 *
 * @return void
 */
function campusinterface_block_styles() {
	$card = array(
		'name'       => 'campusinterface-card',
		'label'      => __( 'Card', 'campusinterface' ),
		'style_data' => array(
			'color'   => array(
				'background' => 'var:preset|color|surface',
			),
			'border'  => array(
				'color'  => 'var:preset|color|line',
				'radius' => 'var:custom|radius|lg',
				'style'  => 'solid',
				'width'  => '1px',
			),
			'spacing' => array(
				'padding' => array(
					'top'    => 'var:preset|spacing|50',
					'right'  => 'var:preset|spacing|50',
					'bottom' => 'var:preset|spacing|50',
					'left'   => 'var:preset|spacing|50',
				),
			),
		),
	);
	register_block_style( 'core/group', $card );
	register_block_style( 'core/column', $card );

	register_block_style(
		'core/button',
		array(
			'name'       => 'campusinterface-pill',
			'label'      => __( 'Pill', 'campusinterface' ),
			'style_data' => array(
				'border' => array(
					'radius' => 'var:custom|radius|pill',
				),
			),
		)
	);
}
add_action( 'init', 'campusinterface_block_styles' );

/**
 * Loads the hero image eagerly with high fetch priority.
 *
 * Applies to Image blocks with the `is-campusinterface-hero-image` class,
 * which the hero pattern sets, so the largest above-the-fold image is not
 * lazy-loaded.
 *
 * @since 0.1.0
 *
 * @param string               $block_content Rendered block HTML.
 * @param array<string, mixed> $block         Parsed block.
 * @return string
 */
function campusinterface_hero_image_priority( $block_content, $block ) {
	$class_name = isset( $block['attrs']['className'] ) ? (string) $block['attrs']['className'] : '';
	if ( false === strpos( $class_name, 'is-campusinterface-hero-image' ) ) {
		return $block_content;
	}

	$processor = new WP_HTML_Tag_Processor( $block_content );
	if ( $processor->next_tag( 'img' ) ) {
		$processor->set_attribute( 'fetchpriority', 'high' );
		$processor->set_attribute( 'loading', 'eager' );
		return $processor->get_updated_html();
	}
	return $block_content;
}
add_filter( 'render_block_core/image', 'campusinterface_hero_image_priority', 10, 2 );

/**
 * Preloads the body font, the one weight above the fold on every page.
 *
 * @since 0.1.0
 *
 * @return void
 */
function campusinterface_preload_fonts() {
	printf(
		'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
		esc_url( get_theme_file_uri( 'assets/fonts/figtree/Figtree-Variable.woff2' ) )
	);
}
add_action( 'wp_head', 'campusinterface_preload_fonts', 1 );
