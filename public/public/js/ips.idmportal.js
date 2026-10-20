/************************************************/
/* IPB3 Javascript								*/
/* -------------------------------------------- */
/* ips.idmportal.js - Portal & Categories		*/
/* (c) IPS, Inc 2011							*/
/* -------------------------------------------- */
/* Author: Rikki Tissier						*/
/************************************************/

var _idmportal = window.IPBoard;

_idmportal.prototype.idmportal = {
	
	/*
	 * Generic initialization function
	 */
	init: function()
	{
		Debug.write( "Initializing ips.idmportal.js" );
		
		// Adaptive layout
		document.observe("dom:loaded", function(){
			var screenWidth = document.viewport.getWidth();
	
			if ( screenWidth < 1329 ){	
				try {
					// Adaptive layout
					// Removes the right sidebar and puts contents on the left, if on a small res screen
					$('main-layout').removeClassName('ipsLayout_withright').removeClassName('ipsLayout_largeright').select(".ipsLayout_left")[0].insert( 
						$('main-layout').select(".ipsLayout_right")[0].innerHTML
					);
					
					$('main-layout').select(".ipsLayout_right")[0].hide();
				} catch(err){}
			}
		});
		
		// Menu toggle
		ipb.delegate.register('.cat_toggle', ipb.idmportal.toggleCategory);
	},
	
	toggleCategory: function(e, elem)
	{
		Event.stop(e);
		
		var group = $( elem ).up('li');
		var subgroup = $( group ).down('.subforums');
		
		if( !$( group ) || !$( subgroup ) )
		{
			Debug.write("Can't find parent or subforums");
			return;
		}
		
		if( $( group ).hasClassName('closed') )
		{
			new Effect.BlindDown( $( subgroup ), { duration: 0.2 } );
			$( group ).removeClassName('closed').addClassName('open');
		}
		else
		{
			new Effect.BlindUp( $( subgroup ), { duration: 0.2 } );
			$( group ).removeClassName('open').addClassName('closed');
		}
		
	},
	
	scroller: Class.create({
		
		initialize: function( id, total )
		{
			this.id = id;
			this.total = total;
			this.effect = Effect.Transitions.sinoidal;
			this.current = 1;
			
			// Check for required elements
			if( !$( this.id + '_wrap' ) || !$( this.id + '_l' ) || !$( this.id + '_r' ) )
			{
				Debug.error("Required element missing");
				return false;
			}
			
			// Set panel height
			$( this.id + '_wrap' ).setStyle( 'height: ' + $( this.id + '_wrap' ).getHeight() + 'px' );
			
			// Set columns
			var w = this.getPaneWidth();
			$( this.id + '_' + this.current ).setStyle('position: absolute; width: ' + w + 'px;');
			
			if( w < 690 ){
				$( this.id + '_wrap' ).removeClassName('three_column').addClassName('two_column');
			} else {
				$( this.id + '_wrap' ).addClassName('three_column').removeClassName('two_column');
			}
			
			// Turn on the buttons
			this.checkButtonDisable();	
			
			// Set events
			$( this.id + '_l' ).observe( 'click', this.scrollLeft.bindAsEventListener(this) );
			$( this.id + '_r' ).observe( 'click', this.scrollRight.bindAsEventListener(this) );
			Event.observe( window, 'resize', this.windowResize.bindAsEventListener(this) );
			
			this.windowResize();
		},
		
		scrollLeft: function(e)
		{
			if( this.current != 1 )
			{
				var prev = $( this.id + '_' + (this.current - 1) );
				var w = this.getPaneWidth();
				var _t = this.current;
				
				$( prev ).setStyle('position: absolute; width: ' + w + 'px; left: ' + ( w * -1 ) + 'px;').show();
				$( this.id + '_' + this.current ).setStyle('position: absolute; width: ' + w + 'px');
				
				new Effect.Parallel([
					new Effect.Move( $( prev ), { x: 0, y: 0, mode: 'absolute' } ),
					new Effect.Move( $( this.id + '_' + this.current ), { x: w, y: 0, mode: 'absolute' } )
				], { duration: 1, transition: this.effect, afterFinish: function(){
					$( this.id + '_' + _t ).hide();
				}.bind(this) } );
				
				this.current = this.current - 1;
			}
			
			this.checkButtonDisable();			
			Event.stop(e);
		},
		
		scrollRight: function(e)
		{
			if( this.current != this.total )
			{	
				var next = $( this.id + '_' + (this.current + 1) );
				var w = this.getPaneWidth();
				var _t = this.current;
				
				$( next ).setStyle('position: absolute; width: ' + w + 'px; left: ' + w + 'px').show();
				$( this.id + '_' + this.current ).setStyle('position: absolute; width: ' + w + 'px;');

				new Effect.Parallel([
					new Effect.Move( $( next ), { x: 0, y: 0, mode: 'absolute' } ),
					new Effect.Move( $( this.id + '_' + this.current ), { x: (w * -1), y: 0, mode: 'absolute' } )
				], { duration: 1, transition: this.effect, afterFinish: function(){
					$( this.id + '_' + _t ).hide();
				}.bind(this) } );
				
				this.current = this.current + 1;
			}
			
			this.checkButtonDisable();	
			Event.stop(e);
		},
		
		windowResize: function(e)
		{
			var w = this.getPaneWidth();
			
			if( w < 420 ){
				$( this.id + '_wrap' ).removeClassName('three_column').removeClassName('two_column').addClassName('one_column');
			} else if( w < 690 ){
				$( this.id + '_wrap' ).removeClassName('three_column').removeClassName('one_column').addClassName('two_column');
			} else {
				$( this.id + '_wrap' ).removeClassName('one_column').removeClassName('two_column').addClassName('three_column');
			}
			
			$( this.id + '_' + this.current ).setStyle('width: ' + w + 'px');
		},
		
		getPaneWidth: function(e)
		{
			return $( this.id + '_wrap' ).getWidth();
		},
		
		checkButtonDisable: function()
		{
			if( this.current == 1 ){
				$( this.id + '_l' ).addClassName('disabled');
				
				if( this.total > 1 ){
					$( this.id + '_r').removeClassName('disabled');
				}
			}
			else if( this.current == this.total ){
				$( this.id + '_r' ).addClassName('disabled');
				
				if( this.total > 1 ){
					$( this.id + '_l').removeClassName('disabled');
				}
			}
			else {
				$( this.id + '_r' ).removeClassName('disabled');
				$( this.id + '_l' ).removeClassName('disabled');
			}	
			
		}
	})	
};

ipb.idmportal.init();