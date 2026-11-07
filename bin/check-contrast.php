<?php
/**
 * Checks every palette for WCAG 2.2 AA contrast on the colour pairs that the
 * Public LMS token contract (docs/CONTRACTS.md) says blocks use.
 *
 * Usage: php bin/check-contrast.php   (exit code 1 when any pair fails)
 *
 * @package CampusInterface
 */

if ( 'cli' !== PHP_SAPI ) {
	exit( 1 );
}

// Foreground, background, minimum ratio. The pairs in the plugin's token
// contract (B1), plus: `muted` (secondary text, contract 1.6.0, B8) on `base`
// and `surface`, and on `primary-soft` where the dashboard's current menu item
// sits; `secondary` on `surface`, the theme's own (checklist ticks on surface
// bands); `warning` on `surface`, which Public LMS uses for "Waiting for a
// grade" on its assignment panel (contract 1.3.0). Dark and primary bands reuse
// these pairs with the roles swapped, which gives the same ratios.
$campusinterface_pairs = array(
	array( 'contrast', 'base', 4.5 ),
	array( 'contrast', 'surface', 4.5 ),
	array( 'contrast', 'primary-soft', 4.5 ),
	array( 'contrast', 'accent', 4.5 ),
	array( 'muted', 'base', 4.5 ),
	array( 'muted', 'surface', 4.5 ),
	array( 'muted', 'primary-soft', 4.5 ),
	array( 'base', 'primary', 4.5 ),
	array( 'primary', 'base', 4.5 ),
	array( 'primary', 'surface', 4.5 ),
	array( 'primary', 'primary-soft', 4.5 ),
	array( 'base', 'secondary', 4.5 ),
	array( 'secondary', 'base', 4.5 ),
	array( 'secondary', 'surface', 4.5 ),
	array( 'success', 'base', 4.5 ),
	array( 'success', 'surface', 4.5 ),
	array( 'warning', 'base', 4.5 ),
	array( 'warning', 'surface', 4.5 ),
	array( 'danger', 'base', 4.5 ),
	array( 'danger', 'surface', 4.5 ),
);

/**
 * Relative luminance of a #rrggbb colour.
 *
 * @param string $hex Colour.
 * @return float
 */
function campusinterface_luminance( $hex ) {
	$hex      = ltrim( $hex, '#' );
	$channels = array();
	foreach ( array( 0, 2, 4 ) as $offset ) {
		$c          = hexdec( substr( $hex, $offset, 2 ) ) / 255;
		$channels[] = $c <= 0.03928 ? $c / 12.92 : pow( ( $c + 0.055 ) / 1.055, 2.4 );
	}
	return 0.2126 * $channels[0] + 0.7152 * $channels[1] + 0.0722 * $channels[2];
}

/**
 * Contrast ratio between two colours.
 *
 * @param string $a Colour.
 * @param string $b Colour.
 * @return float
 */
function campusinterface_ratio( $a, $b ) {
	$la = campusinterface_luminance( $a );
	$lb = campusinterface_luminance( $b );
	return ( max( $la, $lb ) + 0.05 ) / ( min( $la, $lb ) + 0.05 );
}

$campusinterface_root  = dirname( __DIR__ );
$campusinterface_files = array_merge( array( $campusinterface_root . '/theme.json' ), glob( $campusinterface_root . '/styles/colors/*.json' ) );
$campusinterface_fail  = false;

foreach ( $campusinterface_files as $campusinterface_file ) {
	$campusinterface_json    = json_decode( (string) file_get_contents( $campusinterface_file ), true );
	$campusinterface_palette = array();
	foreach ( $campusinterface_json['settings']['color']['palette'] ?? array() as $campusinterface_entry ) {
		$campusinterface_palette[ $campusinterface_entry['slug'] ] = $campusinterface_entry['color'];
	}

	echo basename( dirname( $campusinterface_file ) ) . '/' . basename( $campusinterface_file ) . PHP_EOL;
	foreach ( $campusinterface_pairs as $campusinterface_pair ) {
		list( $campusinterface_fg, $campusinterface_bg, $campusinterface_min ) = $campusinterface_pair;
		if ( ! isset( $campusinterface_palette[ $campusinterface_fg ], $campusinterface_palette[ $campusinterface_bg ] ) ) {
			echo "  MISSING {$campusinterface_fg} or {$campusinterface_bg}" . PHP_EOL;
			$campusinterface_fail = true;
			continue;
		}
		$campusinterface_value = campusinterface_ratio( $campusinterface_palette[ $campusinterface_fg ], $campusinterface_palette[ $campusinterface_bg ] );
		$campusinterface_ok    = $campusinterface_value >= $campusinterface_min;
		$campusinterface_fail  = $campusinterface_fail || ! $campusinterface_ok;
		printf( "  %s %-12s on %-12s %5.2f:1\n", $campusinterface_ok ? 'pass' : 'FAIL', $campusinterface_fg, $campusinterface_bg, $campusinterface_value );
	}
}

exit( $campusinterface_fail ? 1 : 0 );
