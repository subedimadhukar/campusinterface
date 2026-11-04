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
		'campusinterface-about'        => array(
			'label'       => _x( 'About and features', 'Block pattern category', 'campusinterface' ),
			'description' => __( 'Statistics, features, steps, partner logos and sign-up panels.', 'campusinterface' ),
		),
		'campusinterface-pages'        => array(
			'label'       => _x( 'Full pages', 'Block pattern category', 'campusinterface' ),
			'description' => __( 'Complete page layouts assembled from the theme patterns.', 'campusinterface' ),
		),
	);

	foreach ( $categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}
}
add_action( 'init', 'campusinterface_pattern_categories' );

/**
 * Adds the template part areas the theme's parts use.
 *
 * `sidebar` (the course sidebar) and `lesson-nav` (the slim bar on lessons
 * and quizzes) are theme areas. WordPress 7.0 added `navigation-overlay`;
 * on older versions the theme registers it too, so the overlay part keeps a
 * valid area and its header falls back to the default mobile menu.
 *
 * @since 0.2.0
 *
 * @param array<int, array<string, string>> $areas Template part areas.
 * @return array<int, array<string, string>>
 */
function campusinterface_template_part_areas( $areas ) {
	$known = wp_list_pluck( $areas, 'area' );

	$theme_areas = array(
		array(
			'area'        => 'sidebar',
			'area_tag'    => 'aside',
			'label'       => _x( 'Sidebar', 'template part area', 'campusinterface' ),
			'description' => __( 'The sidebar of single course pages, which holds the enrol card.', 'campusinterface' ),
			'icon'        => 'sidebar',
		),
		array(
			'area'        => 'lesson-nav',
			'area_tag'    => 'header',
			'label'       => _x( 'Lesson bar', 'template part area', 'campusinterface' ),
			'description' => __( 'The slim bar at the top of lessons and quizzes, without the main navigation.', 'campusinterface' ),
			'icon'        => 'header',
		),
		array(
			'area'        => 'navigation-overlay',
			'area_tag'    => 'div',
			'label'       => _x( 'Navigation Overlay', 'template part area', 'campusinterface' ),
			'description' => __( 'The menu that opens over the page on small screens.', 'campusinterface' ),
			'icon'        => 'navigation-overlay',
		),
	);

	foreach ( $theme_areas as $area ) {
		if ( ! in_array( $area['area'], $known, true ) ) {
			$areas[] = $area;
		}
	}

	return $areas;
}
add_filter( 'default_wp_template_part_areas', 'campusinterface_template_part_areas' );

/**
 * Registers block style variations that are not section styles.
 *
 * Section styles (bands, cards, the "most popular" highlight and the header
 * and footer bars) are theme.json partials in `styles/blocks/`, which
 * WordPress registers itself. The styles below are small and block-specific;
 * all but the checklist are styled entirely from theme.json data.
 *
 * @since 0.1.0
 *
 * @return void
 */
function campusinterface_block_styles() {
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

	register_block_style(
		array( 'core/paragraph', 'core/post-terms' ),
		array(
			'name'       => 'campusinterface-eyebrow',
			'label'      => __( 'Eyebrow', 'campusinterface' ),
			'style_data' => array(
				'typography' => array(
					'fontSize'      => 'var:preset|font-size|sm',
					'fontWeight'    => '600',
					'letterSpacing' => '0.08em',
					'textTransform' => 'uppercase',
				),
			),
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'       => 'campusinterface-badge',
			'label'      => __( 'Badge', 'campusinterface' ),
			'style_data' => array(
				'border'     => array(
					'radius' => 'var:custom|radius|pill',
				),
				'color'      => array(
					'background' => 'var:preset|color|accent',
					'text'       => 'var:preset|color|contrast',
				),
				'spacing'    => array(
					'padding' => array(
						'top'    => 'var:preset|spacing|20',
						'right'  => 'var:preset|spacing|40',
						'bottom' => 'var:preset|spacing|20',
						'left'   => 'var:preset|spacing|40',
					),
				),
				'typography' => array(
					'fontSize'      => 'var:preset|font-size|xs',
					'fontWeight'    => '700',
					'letterSpacing' => '0.06em',
					'lineHeight'    => '1.4',
					'textTransform' => 'uppercase',
				),
			),
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'       => 'campusinterface-step-number',
			'label'      => __( 'Step number', 'campusinterface' ),
			'style_data' => array(
				'color'      => array(
					'text' => 'var:preset|color|primary',
				),
				'typography' => array(
					'fontFamily' => 'var:preset|font-family|display',
					'fontSize'   => 'var:preset|font-size|3-xl',
					'fontWeight' => '600',
					'lineHeight' => '1',
				),
			),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'       => 'campusinterface-date-badge',
			'label'      => __( 'Date badge', 'campusinterface' ),
			'style_data' => array(
				'border'  => array(
					'radius' => 'var:custom|radius|md',
				),
				'color'   => array(
					'background' => 'var:preset|color|primary-soft',
					'text'       => 'var:preset|color|contrast',
				),
				'spacing' => array(
					'padding' => array(
						'top'    => 'var:preset|spacing|30',
						'right'  => 'var:preset|spacing|40',
						'bottom' => 'var:preset|spacing|30',
						'left'   => 'var:preset|spacing|40',
					),
				),
			),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'       => 'campusinterface-placeholder',
			'label'      => __( 'Placeholder', 'campusinterface' ),
			'style_data' => array(
				'border'  => array(
					'color'  => 'var:preset|color|contrast',
					'radius' => 'var:custom|radius|md',
					'style'  => 'dashed',
					'width'  => '1px',
				),
				'spacing' => array(
					'padding' => array(
						'top'    => 'var:preset|spacing|40',
						'right'  => 'var:preset|spacing|40',
						'bottom' => 'var:preset|spacing|40',
						'left'   => 'var:preset|spacing|40',
					),
				),
			),
		)
	);

	// The tick marks need `list-style-type`, which theme.json cannot set.
	register_block_style(
		'core/list',
		array(
			'name'  => 'campusinterface-checklist',
			'label' => __( 'Checklist', 'campusinterface' ),
		)
	);
}
add_action( 'init', 'campusinterface_block_styles' );

/**
 * Enqueues the per-block stylesheets for what theme.json cannot express.
 *
 * Each file loads only on pages that render its block.
 *
 * @since 0.2.0
 *
 * @return void
 */
function campusinterface_block_stylesheets() {
	$blocks = array( 'details', 'list', 'loginout' );

	foreach ( $blocks as $block ) {
		wp_enqueue_block_style(
			'core/' . $block,
			array(
				'handle' => 'campusinterface-' . $block,
				'src'    => get_theme_file_uri( "assets/css/blocks/{$block}.css" ),
				'path'   => get_theme_file_path( "assets/css/blocks/{$block}.css" ),
				'ver'    => wp_get_theme()->get( 'Version' ),
			)
		);
	}
}
add_action( 'init', 'campusinterface_block_stylesheets' );

/**
 * Returns the URL of the course catalogue.
 *
 * Uses the Public LMS course archive when the plugin is active, and the
 * `/courses/` path it would use otherwise, so pattern links work either way.
 *
 * @since 0.2.0
 *
 * @return string
 */
function campusinterface_courses_url() {
	$url = get_post_type_archive_link( 'plms_course' );
	return $url ? $url : home_url( '/courses/' );
}

/**
 * Keeps course Query Loops empty while Public LMS is inactive.
 *
 * WordPress swaps an unregistered post type in a Query Loop for `post`, so
 * without this the course patterns would list blog posts. With the plugin
 * active this does nothing.
 *
 * @since 0.2.0
 *
 * @param array<string, mixed> $query Query vars built from the block.
 * @param WP_Block             $block The Query Loop's Post Template block.
 * @return array<string, mixed>
 */
function campusinterface_course_query_without_plugin( $query, $block ) {
	$post_type = isset( $block->context['query']['postType'] ) ? $block->context['query']['postType'] : '';
	if ( 'plms_course' === $post_type && ! post_type_exists( 'plms_course' ) ) {
		$query['post__in'] = array( 0 );
	}
	return $query;
}
add_filter( 'query_loop_block_query_vars', 'campusinterface_course_query_without_plugin', 10, 2 );

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
