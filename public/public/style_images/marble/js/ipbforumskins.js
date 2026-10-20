// Created by ipbforumskins.com

jQuery.noConflict();

jQuery(document).ready(function($){

	$('a[href=#top], a[href=#ipboard_body]').click(function(){
		$('html, body').animate({scrollTop:0}, 400);
        return false;
	});
	
	$(".forum_name").hover(function() {
		$(this).next(".forum_desc_pos").children(".forum_desc_con").stop()
		.animate({left: "0", opacity:1}, "fast")
		.css("display","block")
	}, function() {
		$(this).next(".forum_desc_pos").children(".forum_desc_con").stop()
		.animate({left: "10", opacity: 0}, "fast", function(){
			$(this).hide();
		})
	});
	
	$(".notnew .ipsUserPhoto").pixastic("desaturate");

	$('#topicViewBasic').click(function(){
		$(this).addClass("active");
		$('#topicViewRegular').removeClass("active");
		$("#customize_topic").addClass("basicTopicView");
		$.cookie('ctv','basic',{ expires: 365, path: '/'});
		return false;
	});
	
	$('#topicViewRegular').click(function(){
		$(this).addClass("active");
		$('#topicViewBasic').removeClass("active");
		$("#customize_topic").removeClass("basicTopicView");
		$.cookie('ctv',null,{ expires: -1, path: '/'});
		return false;
	});
	
	if ( ($.cookie('ctv') != null))	{
		$("#customize_topic").addClass("basicTopicView");
		$("#topicViewBasic").addClass("active");
	}
	else{
		$("#topicViewRegular").addClass("active");
	}

});