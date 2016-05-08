( function () {

    var apiUrl = mw.config.get('wgServer') + mw.config.get('wgScriptPath') + '/api.php?action=customwatchlist&format=json';

    /**
     * @class mw.customwatchlist.Foo
     *
     * @constructor
     */
    function CustomWatchlist( element ) {
        this.$element = element;
        this.watchToken = null;
        this.pageId = mw.config.get('wgArticleId');
        this.isWatched = false;
        this.init();
    }

    CustomWatchlist.prototype = {

        init: function() {

            // Check user status
            if( !mw.config.get('wgUserId') || mw.config.get('wgUserId') == null ) {
                this.displayAnon();
                return false;
            }

            this.watchToken = mw.user.tokens.get('watchToken');

            // Fetch watchlist status
            $.get( apiUrl + '&do=info&page_id=' + this.pageId, function(data){
                this.isWatched = data.customwatchlist.watched;
                this.updateUI();
                this.bindEvents();
            }.bind(this));

        },

        bindEvents: function() {
            this.$element.click(function(){
                var callUrl = apiUrl + '&page_id=' + this.pageId;
                if( this.isWatched ) {
                    callUrl += '&do=unwatch';
                }else{
                    callUrl += '&do=watch';
                }
                $.get( callUrl, function() {
                   // Saved
                });
                this.isWatched = !this.isWatched;
                this.updateUI();
            }.bind(this));
        },

        updateUI: function() {
            var contents = '';
            if( this.isWatched ) {
                contents = '<i class="fa fa-heart"></i> ' + mw.msg('customwatchlist-remove');
            }else{
                contents = '<i class="fa fa-heart-o"></i> ' + mw.msg('customwatchlist-add');
            }
            this.$element.html( contents );
        },

        displayAnon: function() {

        }

    };

    mw.CustomWatchlist = CustomWatchlist;

}() );
