<?php

/**
 * Hooks for customWatchlist extension
 *
 * @file
 * @ingroup Extensions
 */
class customWatchlistHooks
{

	public static function onExtensionLoad()
	{
		
	}

	public static function onNameOfHook()
	{
		
	}

	/**
	 * @param Parser $parser
	 */
	public static function onParserFirstCallInit( $parser )
	{
		$parser->setFunctionHook( 'customwatchlist', 'customWatchlist::render' );
	}

	/**
	 * @param OutputPage $out
	 */
	public static function onBeforePageDisplay( $out )
	{
		$out->addModules('ext.customwatchlist.foo');
	}

}
