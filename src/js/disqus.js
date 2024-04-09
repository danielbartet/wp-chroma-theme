var disqus_data = document.getElementById('disqus'),
    disqus_shortname = 'idropnews';

if (disqus_data) {
  ;( function( window, document, index )
  {
    'use strict';

    var extendObj = function( defaults, options )
      {
        var prop, extended = {};
        for( prop in defaults )
          if( Object.prototype.hasOwnProperty.call( defaults, prop ))
            extended[ prop ] = defaults[ prop ];

        for( prop in options )
          if( Object.prototype.hasOwnProperty.call( options, prop ))
            extended[ prop ] = options[ prop ];

        return extended;
      },
      getOffset = function( el )
      {
        var rect = el.getBoundingClientRect();
        return { top: rect.top + document.body.scrollTop, left: rect.left + document.body.scrollLeft };
      },
      loadScript = function( url, callback )
      {
        var script	 = document.createElement( 'script' );
        script.src	 = url;
        script.async = true;
        script.setAttribute( 'data-timestamp', +new Date());
        script.addEventListener( 'load', function()
        {
          if( typeof callback === 'function' )
            callback();
        });
        ( document.head || document.body ).appendChild( script );
      },
      throttle		= function(a,b){var c,d;return function(){var e=this,f=arguments,g=+new Date;c&&g<c+a?(clearTimeout(d),d=setTimeout(function(){c=g,b.apply(e,f)},a)):(c=g,b.apply(e,f))}},

      throttleTO		= false,
      laziness		= false,
      disqusConfig	= false,
      scriptUrl		= false,

      scriptStatus	= 'unloaded',
      instance		= false,

      init = function()
      {
        if( !instance || !document.body.contains( instance ) || instance.disqusLoaderStatus == 'loaded' )
          return true;

        var winST	= window.pageYOffset,
          offset	= getOffset( instance ).top;

        // if the element is too far below || too far above
        if( offset - winST > window.innerHeight * laziness || winST - offset - instance.offsetHeight - ( window.innerHeight * laziness ) > 0 )
          return true;

        var tmp = document.getElementById( 'disqus_thread' );
        if( tmp ) tmp.removeAttribute( 'id' );
        instance.setAttribute( 'id', 'disqus_thread' );
        instance.disqusLoaderStatus = 'loaded';

        if( scriptStatus == 'loaded' )
        {
          DISQUS.reset({ reload: true, config: disqusConfig });
        }
        else // unloaded | loading
        {
          window.disqus_config = disqusConfig;
          if( scriptStatus == 'unloaded' )
          {
            scriptStatus = 'loading';
            loadScript( scriptUrl, function()
            {
              scriptStatus = 'loaded';
            });
          }
        }
      };

    window.addEventListener( 'scroll', throttle( throttleTO, init ));
    window.addEventListener( 'resize', throttle( throttleTO, init ));

    window.disqusLoader = function( element, options )
    {
      options = extendObj(
      {
        laziness:		1,
        throttle:		250,
        scriptUrl:		false,
        disqusConfig:	false,

      }, options );

      laziness		= options.laziness + 1;
      throttleTO		= options.throttle;
      disqusConfig	= options.disqusConfig;
      scriptUrl		= scriptUrl === false ? options.scriptUrl : scriptUrl; // set it only once

      if( typeof element === 'string' )				instance = document.querySelector( element );
      else if( typeof element.length === 'number' )	instance = element[ 0 ];
      else											instance = element;

      instance.disqusLoaderStatus = 'unloaded';

      init();
    };

    var options =
  {
    scriptUrl: '//username.disqus.com/embed.js',
    /*
      @type: string (url)
      @default: none
      @required
      URL of Disqus' executive JS file. The value is memorized on the first function call
      and ignored otherwise because Disqus allows only one instance per page at the time.
    */

    laziness: 1,
    /*
      @type: int (>=0)
      @default: 1
      Sets the laziness of loading the widget: (viewport height) * laziness . For example:
      0 - widget load starts when at the least a tiny part of it gets in the viewport;
      1 - widget load starts when the distance between the widget zone and the viewport is no more than the height of the viewport;
      2 - 2x viewports, etc.
    */

    throttle: 250,
    /*
      @type: int (milliseconds)
      @default: 250
      Defines how often the plugin should make calculations during the
      processes such as resize of a browser's window or viewport scroll.
      250 = 4 times in a second.
    */

    /*
      @type: function
      @default: none
      Disqus-native options. Check Disqus' manual for more information.
    */
    disqusConfig: function()
    {
      this.page.title       = disqus_data.dataset.pageTitle;
      this.page.url         = disqus_data.dataset.pageUrl;
      this.page.identifier  = disqus_data.dataset.pageIdentifer;
    }
  };

  // vanilla
  disqusLoader( '.disqus', options );
  }( window, document, 0 ));
}
