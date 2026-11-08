<?php
/**
 * Title: Frequently asked questions
 * Slug: campusinterface/faq
 * Categories: campusinterface-faq
 * Keywords: faq, questions, answers, help, accordion, details
 * Viewport Width: 1400
 * Description: A heading and a contact link beside five questions and answers built on the core Details block, so they open and close without JavaScript.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div id="faq" class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"35%"} -->
		<div class="wp-block-column" style="flex-basis:35%">
			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Questions, answered', 'campusinterface' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Cannot find what you are looking for? Our team replies within one working day.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="<?php echo esc_url( campusinterface_page_link( 'contact' ) ); ?>"><?php esc_html_e( 'Contact us', 'campusinterface' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"65%"} -->
		<div class="wp-block-column" style="flex-basis:65%">
			<!-- wp:details -->
			<details class="wp-block-details"><summary><?php esc_html_e( 'Do I get a certificate?', 'campusinterface' ); ?></summary>
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Yes. Finish every lesson and pass the final quiz, and a certificate with your name and the course title appears in your dashboard, ready to download.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details"><summary><?php esc_html_e( 'How long can I access a course?', 'campusinterface' ); ?></summary>
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'A course you buy on its own is yours for life, including updates. All-access members can take any course while their membership is active.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details"><summary><?php esc_html_e( 'Can I learn on my phone?', 'campusinterface' ); ?></summary>
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Yes. Lessons, quizzes and your progress work on any phone, tablet or computer with a modern browser.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details"><summary><?php esc_html_e( 'What if a course is not right for me?', 'campusinterface' ); ?></summary>
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Ask for a refund within 14 days of buying and we will refund you in full. No questions asked.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details"><summary><?php esc_html_e( 'Do you offer discounts for teams or schools?', 'campusinterface' ); ?></summary>
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Yes. The Team plan covers up to ten learners for $99 a month. For larger groups and schools, contact us for a quote.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
