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

	// Post Title takes it on the dashboard templates, where the page title sits
	// above the plugin's own large greeting.
	register_block_style(
		array( 'core/paragraph', 'core/post-terms', 'core/post-title' ),
		array(
			'name'       => 'campusinterface-eyebrow',
			'label'      => __( 'Eyebrow', 'campusinterface' ),
			'style_data' => array(
				'typography' => array(
					'fontFamily'    => 'var:preset|font-family|body',
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

	// Query Loop card styles. The card frame is on the `<li>`, which only CSS
	// can reach (assets/css/blocks/post-template.css); nested blocks are styled
	// here from theme.json data.
	$flush_image          = array(
		'core/post-featured-image' => array(
			'border' => array(
				'radius' => '0',
			),
		),
	);
	$post_template_styles = array(
		'campusinterface-classic'  => array(
			'label'      => __( 'Classic cards', 'campusinterface' ),
			'style_data' => array( 'blocks' => $flush_image ),
		),
		'campusinterface-minimal'  => array(
			'label'      => __( 'Minimal cards', 'campusinterface' ),
			'style_data' => array(),
		),
		'campusinterface-overlay'  => array(
			'label'      => __( 'Overlay cards', 'campusinterface' ),
			'style_data' => array(
				'elements' => array(
					'link' => array(
						'color' => array(
							'text' => 'var:preset|color|base',
						),
					),
				),
				'blocks'   => array_merge(
					$flush_image,
					array(
						'core/post-title' => array(
							'elements' => array(
								'link' => array(
									'color' => array(
										'text' => 'var:preset|color|base',
									),
								),
							),
						),
					)
				),
			),
		),
		'campusinterface-list'     => array(
			'label'      => __( 'List', 'campusinterface' ),
			'style_data' => array(),
		),
		'campusinterface-carousel' => array(
			'label'      => __( 'Carousel', 'campusinterface' ),
			'style_data' => array( 'blocks' => $flush_image ),
		),
	);
	foreach ( $post_template_styles as $name => $style ) {
		$properties = array(
			'name'  => $name,
			'label' => $style['label'],
		);
		if ( $style['style_data'] ) {
			$properties['style_data'] = $style['style_data'];
		}
		register_block_style( 'core/post-template', $properties );
	}

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
	$blocks = array( 'details', 'list', 'loginout', 'post-template', 'quote', 'search', 'table' );

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
 * Returns the URL of the privacy policy page.
 *
 * Uses the page chosen in Settings > Privacy once it is published, which
 * translation plugins map to each language's own page, and the
 * `/privacy-policy/` path WordPress gives that page otherwise, so footer
 * links work before the page exists and in every language after.
 *
 * @since 0.3.0
 *
 * @return string
 */
function campusinterface_privacy_policy_url() {
	$url = get_privacy_policy_url();
	return $url ? $url : home_url( '/privacy-policy/' );
}

/**
 * Tells theme patterns whether Public LMS has registered one of its patterns.
 *
 * Contract 1.2.0 ships some `publiclms/*` patterns only from phase 2 (course
 * reviews, the quiz runner, the instructor dashboard). The theme's templates
 * reach them through small `hidden-*` patterns that use this check, so each
 * area shows the plugin's pattern when it exists and a clean fallback before.
 *
 * @since 0.2.0
 *
 * @param string $slug Pattern slug, for example `publiclms/course-reviews`.
 * @return bool
 */
function campusinterface_has_plugin_pattern( $slug ) {
	return WP_Block_Patterns_Registry::get_instance()->is_registered( $slug );
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
 * Makes the comment form title a level-two heading.
 *
 * Core prints "Leave a Reply" as an `h3`. On a single post it follows the
 * post title (`h1`) or the comments title (`h2`), so an `h3` would skip a
 * level when a post has no comments yet.
 *
 * @since 0.3.0
 *
 * @param array<string, mixed> $defaults Comment form arguments.
 * @return array<string, mixed>
 */
function campusinterface_comment_form_defaults( $defaults ) {
	$defaults['title_reply_before'] = '<h2 id="reply-title" class="comment-reply-title">';
	$defaults['title_reply_after']  = '</h2>';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'campusinterface_comment_form_defaults' );

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
 * Enqueues the global stylesheet: focus rings for form controls and the
 * reduced-motion rule. Registered with its path so WordPress can inline it.
 *
 * @since 0.2.0
 *
 * @return void
 */
function campusinterface_global_styles() {
	wp_enqueue_style(
		'campusinterface-global',
		get_theme_file_uri( 'assets/css/global.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);
	// In right-to-left languages WordPress serves global-rtl.css instead (made
	// by `npm run rtl`); the path points at the same file, so an inlined copy is
	// the right-to-left one too. Per-block stylesheets get this from
	// wp_enqueue_block_style(), and the editor from add_editor_style().
	wp_style_add_data( 'campusinterface-global', 'rtl', 'replace' );
	wp_style_add_data( 'campusinterface-global', 'path', get_theme_file_path( is_rtl() ? 'assets/css/global-rtl.css' : 'assets/css/global.css' ) );
}
add_action( 'wp_enqueue_scripts', 'campusinterface_global_styles' );

/**
 * Loads the global stylesheet in the editor canvas too.
 *
 * @since 0.2.0
 *
 * @return void
 */
function campusinterface_editor_styles() {
	// In right-to-left languages core adds global-rtl.css after it.
	add_editor_style( 'assets/css/global.css' );
}
add_action( 'after_setup_theme', 'campusinterface_editor_styles' );

/**
 * Gives the theme's own SVG images their intrinsic width and height.
 *
 * Image blocks in patterns point at files in `assets/images/`, which have no
 * attachment ID, so WordPress cannot add `width` and `height` itself. Without
 * them the browser reserves no space and the page shifts when they load.
 * Reads the size from the SVG's root element; CSS keeps `height: auto`.
 *
 * @since 0.2.0
 *
 * @param string               $block_content Rendered block HTML.
 * @param array<string, mixed> $block         Parsed block.
 * @return string
 */
function campusinterface_theme_image_dimensions( $block_content, $block ) {
	unset( $block );
	$base      = trailingslashit( get_template_directory_uri() ) . 'assets/images/';
	$processor = new WP_HTML_Tag_Processor( $block_content );
	if ( ! $processor->next_tag( 'img' ) || null !== $processor->get_attribute( 'width' ) ) {
		return $block_content;
	}

	$src = (string) $processor->get_attribute( 'src' );
	if ( 0 !== strpos( $src, $base ) || '.svg' !== substr( $src, -4 ) ) {
		return $block_content;
	}

	$size = campusinterface_svg_size( basename( $src ) );
	if ( ! $size ) {
		return $block_content;
	}

	$processor->set_attribute( 'width', (string) $size[0] );
	$processor->set_attribute( 'height', (string) $size[1] );
	return $processor->get_updated_html();
}
add_filter( 'render_block_core/image', 'campusinterface_theme_image_dimensions', 10, 2 );

/**
 * Reads the width and height of an SVG in the theme's `assets/images/`.
 *
 * @since 0.2.0
 *
 * @param string $file File name, without a path.
 * @return int[]|null Width and height, or null when unknown.
 */
function campusinterface_svg_size( $file ) {
	static $sizes = array();
	$file         = sanitize_file_name( $file );
	if ( array_key_exists( $file, $sizes ) ) {
		return $sizes[ $file ];
	}

	$sizes[ $file ] = null;
	$path           = get_template_directory() . '/assets/images/' . $file;
	if ( is_readable( $path ) ) {
		$head = (string) file_get_contents( $path, false, null, 0, 512 ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Local theme file, first 512 bytes only.
		if ( preg_match( '/<svg[^>]*\swidth="(\d+)"[^>]*\sheight="(\d+)"/', $head, $match ) ) {
			$sizes[ $file ] = array( (int) $match[1], (int) $match[2] );
		}
	}
	return $sizes[ $file ];
}

/**
 * Tells whether the site language is written entirely in Latin-1.
 *
 * The bundled Fraunces and Figtree files hold Latin-1 only. For other
 * languages `assets/css/global.css` switches the display and body presets to
 * the system stacks (so no word mixes two fonts), and the theme then skips
 * the font preload. The language list matches the `:lang()` list there.
 *
 * @since 0.3.0
 *
 * @return bool
 */
function campusinterface_language_uses_bundled_fonts() {
	$latin_1  = array( 'af', 'br', 'ca', 'co', 'da', 'de', 'en', 'es', 'eu', 'fi', 'fil', 'fo', 'fr', 'fy', 'ga', 'gd', 'gl', 'id', 'is', 'it', 'lb', 'ms', 'nb', 'nl', 'nn', 'no', 'oc', 'pt', 'rm', 'so', 'sq', 'sv', 'sw', 'tl', 'xh', 'zu' );
	$language = strtolower( (string) strtok( str_replace( '_', '-', get_locale() ), '-' ) );
	return in_array( $language, $latin_1, true );
}

/**
 * Preloads the body font, the one weight above the fold on every page.
 *
 * @since 0.1.0
 *
 * @return void
 */
function campusinterface_preload_fonts() {
	if ( ! campusinterface_language_uses_bundled_fonts() ) {
		return;
	}
	printf(
		'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
		esc_url( get_theme_file_uri( 'assets/fonts/figtree/Figtree-Variable.woff2' ) )
	);
}
add_action( 'wp_head', 'campusinterface_preload_fonts', 1 );
