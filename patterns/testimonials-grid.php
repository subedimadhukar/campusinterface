<?php
/**
 * Title: Testimonials grid
 * Slug: campusinterface/testimonials-grid
 * Categories: campusinterface-testimonials, testimonials
 * Keywords: testimonials, reviews, quotes, learners, students
 * Viewport Width: 1400
 * Description: Three learner quotes in cards on a surface band, each with a portrait, a name, a role and the course they took.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'What our learners say', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Learners rate their courses 4.8 out of 5 on average. Here are three of them in their own words.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"className":"is-style-campusinterface-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:quote {"className":"is-style-plain"} -->
			<blockquote class="wp-block-quote is-style-plain">
				<!-- wp:paragraph {"fontSize":"lg"} -->
				<p class="has-lg-font-size"><?php echo esc_html_x( 'I had never written a line of code. Eight weeks later I was cleaning real datasets at work, and Asha’s feedback on my final project helped me land my first analyst role.', 'testimonial', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</blockquote>
			<!-- /wp:quote -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"3.5rem","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/learner-sanjana-shrestha.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Portrait illustration of Sanjana Shrestha', 'image alt text', 'campusinterface' ); ?>" style="aspect-ratio:1;object-fit:cover;width:3.5rem;height:auto"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
					<p style="font-weight:700"><?php echo esc_html_x( 'Sanjana Shrestha', 'person name', 'campusinterface' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontSize":"sm"} -->
					<p class="has-sm-font-size"><?php esc_html_e( 'Junior data analyst · Data Analysis with Python', 'campusinterface' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-campusinterface-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:quote {"className":"is-style-plain"} -->
			<blockquote class="wp-block-quote is-style-plain">
				<!-- wp:paragraph {"fontSize":"lg"} -->
				<p class="has-lg-font-size"><?php echo esc_html_x( 'Marcus explains things the way you would want a colleague to. The weekly projects were hard enough to stretch me and small enough to finish after work.', 'testimonial', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</blockquote>
			<!-- /wp:quote -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"3.5rem","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/learner-tom-whitaker.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Portrait illustration of Tom Whitaker', 'image alt text', 'campusinterface' ); ?>" style="aspect-ratio:1;object-fit:cover;width:3.5rem;height:auto"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
					<p style="font-weight:700"><?php echo esc_html_x( 'Tom Whitaker', 'person name', 'campusinterface' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontSize":"sm"} -->
					<p class="has-sm-font-size"><?php esc_html_e( 'Front-end developer · Web Development Foundations', 'campusinterface' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-campusinterface-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:quote {"className":"is-style-plain"} -->
			<blockquote class="wp-block-quote is-style-plain">
				<!-- wp:paragraph {"fontSize":"lg"} -->
				<p class="has-lg-font-size"><?php echo esc_html_x( 'The Thursday critiques with Elena changed how I present my work. I finished with a case study that I still use in interviews.', 'testimonial', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</blockquote>
			<!-- /wp:quote -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"3.5rem","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/learner-grace-mwangi.svg' ) ); ?>" alt="<?php echo esc_attr_x( 'Portrait illustration of Grace Mwangi', 'image alt text', 'campusinterface' ); ?>" style="aspect-ratio:1;object-fit:cover;width:3.5rem;height:auto"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
					<p style="font-weight:700"><?php echo esc_html_x( 'Grace Mwangi', 'person name', 'campusinterface' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontSize":"sm"} -->
					<p class="has-sm-font-size"><?php esc_html_e( 'Product designer · UX Design Essentials', 'campusinterface' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
