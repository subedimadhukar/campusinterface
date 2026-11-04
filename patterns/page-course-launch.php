<?php
/**
 * Title: Course launch landing
 * Slug: campusinterface/page-course-launch
 * Categories: campusinterface-pages
 * Post Types: page
 * Block Types: core/post-content
 * Keywords: launch, landing, sales page, cohort, course, enrol
 * Viewport Width: 1400
 * Description: A landing page for a new course cohort: launch hero, week-by-week curriculum, the instructor, learner testimonials, pricing, questions and a closing call to action. Use it with the "Landing page" template.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:pattern {"slug":"campusinterface/hero-course-launch"} /-->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div id="curriculum" class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'What you will learn', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Eighteen lessons over eight weeks, about three hours a week, with a live critique every Thursday evening.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"14rem"}} -->
	<div class="wp-block-group alignwide">
			<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group is-style-campusinterface-card">
				<!-- wp:paragraph {"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
				<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"><?php esc_html_e( 'Weeks 1 and 2', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"xl"} -->
				<h3 class="wp-block-heading has-xl-font-size"><?php esc_html_e( 'Research', 'campusinterface' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'Plan and run five user interviews, then turn your notes into clear findings.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group is-style-campusinterface-card">
				<!-- wp:paragraph {"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
				<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"><?php esc_html_e( 'Weeks 3 and 4', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"xl"} -->
				<h3 class="wp-block-heading has-xl-font-size"><?php esc_html_e( 'Define and sketch', 'campusinterface' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'Write a problem statement, map the user journey and sketch three directions.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group is-style-campusinterface-card">
				<!-- wp:paragraph {"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
				<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"><?php esc_html_e( 'Weeks 5 and 6', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"xl"} -->
				<h3 class="wp-block-heading has-xl-font-size"><?php esc_html_e( 'Prototype and test', 'campusinterface' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'Build a clickable prototype and test it with real people, twice.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group is-style-campusinterface-card">
				<!-- wp:paragraph {"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
				<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"><?php esc_html_e( 'Weeks 7 and 8', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"xl"} -->
				<h3 class="wp-block-heading has-xl-font-size"><?php esc_html_e( 'Case study', 'campusinterface' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'Present your work at the final critique and publish a portfolio case study.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/instructor-elena-ortiz.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Portrait illustration of Elena Ortiz', 'image alt text', 'campusinterface' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"65%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
			<!-- wp:paragraph {"className":"is-style-campusinterface-eyebrow","textColor":"primary"} -->
			<p class="is-style-campusinterface-eyebrow has-primary-color has-text-color"><?php esc_html_e( 'Your instructor', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php echo esc_html_x( 'Elena Ortiz', 'person name', 'campusinterface' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"lg"} -->
			<p class="has-lg-font-size"><?php esc_html_e( 'Elena is a product designer who has led research and design teams at two start-ups. She has run the Thursday critiques for every cohort of UX Design Essentials and reviews each final case study herself.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"campusinterface/testimonials-grid"} /-->

<!-- wp:pattern {"slug":"campusinterface/pricing-2-columns"} /-->

<!-- wp:pattern {"slug":"campusinterface/faq"} /-->

<!-- wp:pattern {"slug":"campusinterface/call-to-action"} /-->
