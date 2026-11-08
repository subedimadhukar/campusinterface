<?php
/**
 * Title: Hero: coaching
 * Slug: campusinterface/hero-coaching
 * Categories: campusinterface-hero, banner
 * Keywords: hero, coaching, tutoring, mentoring, one-to-one, consultation
 * Viewport Width: 1400
 * Description: An illustration of an online coaching session beside a headline, three benefits and buttons to book a consultation or meet the coaches.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-campusinterface-hero-image"} -->
			<figure class="wp-block-image size-full is-campusinterface-hero-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/coaching-session.svg' ) ); ?>" alt="<?php esc_attr_e( 'Illustration of a video call between a coach and a learner, beside a checklist of goals', 'campusinterface' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:paragraph {"className":"is-style-campusinterface-eyebrow","textColor":"secondary"} -->
			<p class="is-style-campusinterface-eyebrow has-secondary-color has-text-color"><?php esc_html_e( 'One-to-one coaching', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1} -->
			<h1 class="wp-block-heading"><?php esc_html_e( 'Personal coaching for exams, interviews and career changes', 'campusinterface' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"lg"} -->
			<p class="has-lg-font-size"><?php esc_html_e( 'Work with a coach who knows your field. Set your goals in the first session, practise with feedback every week and see your progress in one place.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-campusinterface-checklist"} -->
			<ul class="wp-block-list is-style-campusinterface-checklist">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'A free 20-minute consultation to plan your goals', 'campusinterface' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Weekly 45-minute sessions online, at times that suit you', 'campusinterface' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Practice tasks and written feedback between sessions', 'campusinterface' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( campusinterface_page_link( 'contact' ) ); ?>"><?php esc_html_e( 'Book a free consultation', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( campusinterface_page_link( 'instructors' ) ); ?>"><?php esc_html_e( 'Meet our coaches', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
