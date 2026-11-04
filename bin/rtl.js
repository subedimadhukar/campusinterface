#!/usr/bin/env node
/**
 * Writes the right-to-left copy of every theme stylesheet with rtlcss.
 *
 * assets/css/global.css and each assets/css/blocks/*.css get a -rtl.css file
 * beside them, which WordPress serves instead in right-to-left languages.
 * style.css holds only the theme header, so it has none. Write logical
 * properties in the sources; use `/*rtl:ignore*\/` only where a physical value
 * must not flip, with a comment saying why.
 *
 * Usage: npm run rtl. CI runs it and fails when a committed copy is stale.
 */

'use strict';

const fs = require( 'fs' );
const path = require( 'path' );
const rtlcss = require( 'rtlcss' );
const { version } = require( 'rtlcss/package.json' );

const root = path.resolve( __dirname, '..' );
const blocks = path.join( root, 'assets/css/blocks' );
const sources = [
	path.join( root, 'assets/css/global.css' ),
	...fs
		.readdirSync( blocks )
		.filter( ( file ) => file.endsWith( '.css' ) && ! file.endsWith( '-rtl.css' ) )
		.sort()
		.map( ( file ) => path.join( blocks, file ) ),
];

for ( const source of sources ) {
	const target = source.replace( /\.css$/, '-rtl.css' );
	const banner = `/* Generated from ${ path.basename( source ) } by rtlcss ${ version }. Edit the source and run npm run rtl. */\n`;
	const css = rtlcss.process( fs.readFileSync( source, 'utf8' ) );
	fs.writeFileSync( target, banner + css.replace( /\s*$/, '\n' ) );
	process.stdout.write( `${ path.relative( root, target ) }\n` );
}
