<?php

class customWatchlistApi extends ApiBase {

    private $params;
    private $formattedData = array();

    /**
     * @var User
     */
    private $user;

    public function execute()
    {

        $this->params = $this->extractRequestParams();

        $this->user = $this->getUser();
        if( !$this->user || $this->user->isAnon() ) {
            return false;
        }

        switch( $this->params['do'] ) {
            case 'info':
                $this->info();
                break;

            case 'watch':
                $this->watch();
                break;

            case 'unwatch':
                $this->unwatch();
                break;
        }

        $this->getResult()->addValue( null, $this->getModuleName(), $this->formattedData );

    }

    private function unwatch()
    {
        $this->user->removeWatch( Title::newFromID( $this->params['page_id'] ) );
    }

    private function watch()
    {
        $this->user->addWatch( Title::newFromID( $this->params['page_id'] ) );
    }

    private function info()
    {
        $isWatched = $this->user->isWatched( Title::newFromID( $this->params['page_id'] ) );
        $this->formattedData['watched'] = (int)$isWatched;
    }

    public function getAllowedParams( /* $flags = 0 */ )
    {
        return array(
            'page_id' => array(
                ApiBase::PARAM_REQUIRED => true,
                ApiBase::PARAM_TYPE => 'integer'
            ),
            'do' => array(
                ApiBase::PARAM_REQUIRED => true,
                ApiBase::PARAM_TYPE => 'string'
            )
        );
    }

}