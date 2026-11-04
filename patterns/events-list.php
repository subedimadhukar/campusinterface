<?php
/**
 * Title: Events list
 * Slug: campusinterface/events-list
 * Categories: campusinterface-events
 * Keywords: events, calendar, open day, webinar, dates, schedule
 * Viewport Width: 1400
 * Description: Three upcoming events as cards, each with a date badge, title, time and place, a sentence and a button. Edit the dates by hand; no events plugin needed.
 *
 * @package CampusInterface
 * @since 0.2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Upcoming events', 'campusinterface' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Open days, free webinars and cohort start dates. All events are free unless marked otherwise.', 'campusinterface' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:group {"className":"is-style-campusinterface-date-badge","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group is-style-campusinterface-date-badge">
				<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","fontWeight":"700","letterSpacing":"0.08em"}},"fontSize":"xs"} -->
				<p class="has-text-align-center has-xs-font-size" style="font-weight:700;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html_x( 'Nov', 'abbreviated month name', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600","lineHeight":"1"}},"fontSize":"2xl","fontFamily":"display"} -->
				<p class="has-text-align-center has-display-font-family has-2-xl-font-size" style="font-weight:600;line-height:1"><?php echo esc_html_x( '21', 'day of the month', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":3,"fontSize":"xl"} -->
				<h3 class="wp-block-heading has-xl-font-size"><?php esc_html_e( 'Open day at the Lakeside campus', 'campusinterface' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"sm"} -->
				<p class="has-sm-font-size" style="font-weight:600"><?php esc_html_e( 'Saturday, 10:00 to 14:00 · Lakeside campus, 14 College Road', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'Meet the instructors, sit in on a live class and get advice on which course to take first.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/events/open-day/' ) ); ?>"><?php esc_html_e( 'Book a place', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:group {"className":"is-style-campusinterface-date-badge","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group is-style-campusinterface-date-badge">
				<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","fontWeight":"700","letterSpacing":"0.08em"}},"fontSize":"xs"} -->
				<p class="has-text-align-center has-xs-font-size" style="font-weight:700;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html_x( 'Dec', 'abbreviated month name', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600","lineHeight":"1"}},"fontSize":"2xl","fontFamily":"display"} -->
				<p class="has-text-align-center has-display-font-family has-2-xl-font-size" style="font-weight:600;line-height:1"><?php echo esc_html_x( '3', 'day of the month', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":3,"fontSize":"xl"} -->
				<h3 class="wp-block-heading has-xl-font-size"><?php esc_html_e( 'Free webinar: getting started with data analysis', 'campusinterface' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"sm"} -->
				<p class="has-sm-font-size" style="font-weight:600"><?php esc_html_e( 'Thursday, 18:00 to 19:00 GMT · Online', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'Dr. Asha Gurung walks through a real dataset and answers your questions live.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/events/data-analysis-webinar/' ) ); ?>"><?php esc_html_e( 'Register', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-campusinterface-card","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group is-style-campusinterface-card">
			<!-- wp:group {"className":"is-style-campusinterface-date-badge","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group is-style-campusinterface-date-badge">
				<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","fontWeight":"700","letterSpacing":"0.08em"}},"fontSize":"xs"} -->
				<p class="has-text-align-center has-xs-font-size" style="font-weight:700;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html_x( 'Jan', 'abbreviated month name', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600","lineHeight":"1"}},"fontSize":"2xl","fontFamily":"display"} -->
				<p class="has-text-align-center has-display-font-family has-2-xl-font-size" style="font-weight:600;line-height:1"><?php echo esc_html_x( '12', 'day of the month', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":3,"fontSize":"xl"} -->
				<h3 class="wp-block-heading has-xl-font-size"><?php esc_html_e( 'UX Design Essentials: cohort 3 begins', 'campusinterface' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"sm"} -->
				<p class="has-sm-font-size" style="font-weight:600"><?php esc_html_e( 'Tuesday, 18:30 GMT · Online', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'Eight weeks of lessons with Elena Ortiz, and a live critique every Thursday.', 'campusinterface' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/courses/ux-design-essentials/' ) ); ?>"><?php esc_html_e( 'Reserve your place', 'campusinterface' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
