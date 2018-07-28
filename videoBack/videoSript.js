    jQuery( function() {

      var should_remember = $.mbCookie.get( "YTP_should_remember" );
      if ( should_remember )
        $( "#should_remember" ).attr( "checked", "checked" );

      $( "#should_remember" ).on( "change", function() {
        if ( $( this ).is( ":checked" ) ) {
          $.mbCookie.set( "YTP_should_remember", "true", 1 );
        } else {
          $.mbCookie.remove( "YTP_should_remember" );
        }
      });

      var myPlayer = jQuery( "#bgndVideo" ).YTPlayer( {
        remember_last_time: should_remember
        , onReady: function( player ) {
          YTPConsole.append( player.id + " player is ready" );
          YTPConsole.append( "<br>" );
        }
      });

      var YTPConsole = jQuery( "#eventListener" );

    });