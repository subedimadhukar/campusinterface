<?php
/**
 * Title: Pricing, 2 columns
 * Slug: campusinterface/pricing-2-columns
 * Categories: campusinterface-pricing
 * Keywords: pricing, plans, prices, membership, buy, subscription
 * Viewport Width: 1400
 * Description: Two plans side by side: a single course and all-access, with the all-access plan highlighted as the most popular.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div id="pricing" class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Choose how you learn', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php esc_html_e( 'Buy one course and keep it, or learn everything with all-access. Both come with a 14-day refund.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"className":"is-style-campusinterface-card"} -->
		<div class="wp-block-column is-style-campusinterface-card">
			<!-- wp:heading {"level":3,"fontSize":"xl"} -->
			<h3 class="wp-block-heading has-xl-font-size"><?php esc_html_e( 'Single course', 'campusinterface' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"bottom"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","lineHeight":"1"}},"fontSize":"3xl","fontFamily":"display"} -->
				<p class="has-display-font-family has-3-xl-font-size" style="font-weight:600;line-height:1"><?php echo esc_html_x( '$49', 'price', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'one payment', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Pick any one course and keep it for life.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-campusinterface-checklist","fontSize":"sm"} -->
			<ul class="wp-block-list is-style-campusinterface-checklist has-sm-font-size">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Lifetime access to one course, with updates', 'campusinterface' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Certificate of completion', 'campusinterface' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Questions answered by the instructor', 'campusinterface' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( campusinterface_courses_url() ); ?>"><?php esc_html_e( 'Browse courses', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"is-style-campusinterface-highlight"} -->
		<div class="wp-block-column is-style-campusinterface-highlight">
			<!-- wp:group {"layout":{"type":"flex"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"is-style-campusinterface-badge"} -->
				<p class="is-style-campusinterface-badge"><?php esc_html_e( 'Most popular', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":3,"fontSize":"xl"} -->
			<h3 class="wp-block-heading has-xl-font-size"><?php esc_html_e( 'All-access', 'campusinterface' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"bottom"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","lineHeight":"1"}},"fontSize":"3xl","fontFamily":"display"} -->
				<p class="has-display-font-family has-3-xl-font-size" style="font-weight:600;line-height:1"><?php echo esc_html_x( '$19', 'price', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'per month', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Every course, every new release and a certificate for each one.', 'campusinterface' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-campusinterface-checklist","fontSize":"sm"} -->
			<ul class="wp-block-list is-style-campusinterface-checklist has-sm-font-size">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'All 36 courses and every new release', 'campusinterface' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Certificates of completion', 'campusinterface' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Project feedback from instructors', 'campusinterface' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Cancel any time', 'campusinterface' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( campusinterface_courses_url() ); ?>"><?php esc_html_e( 'Get all-access', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
