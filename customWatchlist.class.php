<?php

/**
 * Class for customWatchlist extension
 *
 * @file
 * @ingroup Extensions
 */
class customWatchlist
{

    /**
     * @param Parser $parser
     * @return array
     */
    public static function render( $parser )
    {

        $html = '';

        $html .= $parser->insertStripItem( '<a href="#" class="custom-watchlist-wrapper" id="add-to-watchlist"></a>'
        );

        $parser->getOutput()->addModules('ext.customwatchlist.foo');

        return array(
            $html,
            'markerType' => 'nowiki'
        );

    }

}
