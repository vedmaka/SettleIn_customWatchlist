<?php

/**
 * customWatchlist SpecialPage for customWatchlist extension
 *
 * @file
 * @ingroup Extensions
 */
class SpecialcustomWatchlist extends SpecialPage
{
    public function __construct()
    {
        parent::__construct( 'customWatchlist' );
    }

    /**
     * Show the page to the user
     *
     * @param string $sub The subpage string argument (if any).
     *  [[Special:customWatchlist/subpage]].
     */
    public function execute( $sub )
    {
        $out = $this->getOutput();

        $out->setPageTitle( $this->msg( 'customwatchlist-helloworld' ) );

        $out->addHelpLink( 'How to become a MediaWiki hacker' );

        $out->addWikiMsg( 'customwatchlist-helloworld-intro' );
    }

    protected function getGroupName()
    {
        return 'other';
    }
}
