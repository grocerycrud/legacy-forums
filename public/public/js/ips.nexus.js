/************************************************/
/* IPB3 Javascript								*/
/* -------------------------------------------- */
/* ips.nexus.js - Javascript for nexus frontend	*/
/* (c) IPS, Inc 2008							*/
/* -------------------------------------------- */
/* Author: Rikki Tissier						*/
/************************************************/
var _nexus = window.IPBoard;

_nexus.prototype.nexus = {
	currentTab: '',
	
	init: function()
	{
		document.observe("dom:loaded", function(){
			ipb.delegate.register(".tab", ipb.nexus.toggleTab);
		});
		
	},
	
	toggleTab: function( e, elem )
	{
		Event.stop(e);
		var id = $( elem ).id.replace('t_', '');
		Debug.write( id );
		if( ipb.nexus.currentTab == id || !$('t_pane_' + id) ){ return; }
		
		$('t_pane_' + ipb.nexus.currentTab).hide();
		$('t_pane_' + id).show();
		
		$( 't_' + ipb.nexus.currentTab ).removeClassName('active');
		$( 't_' + id ).addClassName('active');
		
		ipb.nexus.currentTab = id;
	},
	
	setUpAltContacts: function()
	{
		// Autocomplete
		new ipb.Autocomplete( $('name'), { multibox: false, url: ipb.vars['base_url'] + 'app=core&module=ajax&section=findnames&do=get-member-names&secure_key=' + ipb.vars['secure_hash'] + '&name=', templates: { wrap: ipb.templates['autocomplete_wrap'], item: ipb.templates['autocomplete_item'] } } );
		
		$('add_new_contact').hide();
		
		$('add_new_toggle').observe('click', function(e){
			Event.stop(e);
			new Effect.BlindDown( $('add_new_contact'), { duration: 0.3 } );
			$('add_new_toggle').hide();
		});	 
	},
	
	setUpReferrals: function()
	{
		$('refer_code_html').observe('focus', function(){ this.select(); });
		$('refer_code_bbcode').observe('focus', function(){ this.select(); });
	}	
};

ipb.nexus.init();