$( function () {

    console.log('Watchlist initiated.');

    if( $('.user-panel-watchlist-action').length ) {
        var w = new mw.CustomWatchlist( $('.user-panel-watchlist-action') );
    }

}() );
