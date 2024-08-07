<?php
/** @var $posts */
/** @var $topic */
/** @var $canonicalUrl */
?><!DOCTYPE html>
<html lang="en"  xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $topic["title"]; ?> - grocery CRUD forum</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="/favicon.png" />
    <link rel="image_src" href='https://www.grocerycrud.com/assets/themes/default/images/forums-facebook-image.png' />
    <script type='text/javascript'>
        //<![CDATA[
        jsDebug			= 0; /* Must come before JS includes */
        USE_RTE			= 1;
        DISABLE_AJAX	= parseInt(0); /* Disables ajax requests where text is sent to the DB; helpful for charset issues */
        inACP			= false;
        var isRTL		= false;
        var rtlIe		= '';
        var rtlFull		= '';
        var IPS_extra_plugins       = [];
        //]]>
    </script>









    <style type="text/css" title="Main" media="screen">
        /* Inline CSS */

        /* CSS: calendar_select*/
        .calendar_date_select{color:white;border:#777 1px solid;display:block;width:195px;z-index:1000}iframe.ie6_blocker{position:absolute;z-index:999}.calendar_date_select thead
                                                                                                                                                        th{font-weight:bold;background-color:#aaa;border-top:1px solid #777;border-bottom:1px solid #777;color:white !important}.calendar_date_select
                                                                                                                                                                                                                                                                                .cds_buttons{text-align:center;padding:5px
        0px;background-color:#555}.calendar_date_select
                                  .cds_footer{background-color:black;padding:3px;font-size:12px;text-align:center}.calendar_date_select
                                                                                                                  table{margin:0px;padding:0px}.calendar_date_select
                                                                                                                                               .cds_header{background-color:#ccc;border-bottom:2px solid #aaa;text-align:center}.calendar_date_select .cds_header
                                                                                                                                                                                                                                span{font-size:15px;color:black;font-weight:bold}.calendar_date_select
                                                                                                                                                                                                                                                                                 select{font-size:11px}.calendar_date_select .cds_header a:hover{color:white}.calendar_date_select .cds_header
                                                                                                                                                                                                                                                                                                                                                             a{width:22px;height:20px;text-decoration:none;font-size:14px;color:black !important}.calendar_date_select .cds_header
                                                                                                                                                                                                                                                                                                                                                                                                                                                 a.prev{float:left}.calendar_date_select .cds_header
                                                                                                                                                                                                                                                                                                                                                                                                                                                                   a.next{float:right}.calendar_date_select .cds_header
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      a.close{float:right;display:none}.calendar_date_select .cds_header
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       select.month{width:90px}.calendar_date_select .cds_header
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               select.year{width:61px}.calendar_date_select .cds_buttons
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      a{color:white;font-size:9px}.calendar_date_select
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  td{font-size:12px;width:24px;height:21px;text-align:center;vertical-align:middle;background-color:#fff}.calendar_date_select
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         td.weekend{background-color:#eee;border-left:1px solid #ddd;border-right:1px solid #ddd}.calendar_date_select td
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 div{color:#000}.calendar_date_select td
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                div.other{color:#ccc}.calendar_date_select td.selected
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     div{color:white}.calendar_date_select tbody
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     td{border-bottom:1px solid #ddd}.calendar_date_select
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     td.selected{background-color:#777}.calendar_date_select td:hover{background-color:#ccc}.calendar_date_select
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            td.today{border:1px
        dashed #999}.calendar_date_select td.disabled
                    div{color:#e6e6e6}.fieldWithErrors
                                      .calendar_date_select{border:2px
        solid red}
    </style>


    <style type="text/css" >
        /* Inline CSS */

        /* CSS: ipb_ckeditor*/

    </style>


    <style type="text/css" title="Main" media="screen,print">
        /* Inline CSS */

        /* CSS: ipb_common*/
        #lightbox{position:absolute;left:0;width:100%;z-index:16000 !important;text-align:center;line-height:0}#lightbox
                                                                                                               img{width:auto;height:auto}#lightbox a
                                                                                                                                          img{border:none}#outerImageContainer{position:relative;background-color:#fff;width:250px;height:250px;margin:0
        auto}#imageContainer{padding:10px}#loading{position:absolute;top:40%;left:0%;height:25%;width:100%;text-align:center;line-height:0}#hoverNav{position:absolute;top:0;left:0;height:100%;width:100%;z-index:10}#imageContainer>#hoverNav{left:0}#hoverNav
                                                                                                                                                                                                                                                       a{outline:none}#prevLink,#nextLink{width:49%;height:100%;background-image:url(https://www.grocerycrud.com/forums/public/style_images/master/spacer.gif);display:block}#prevLink{left:0;float:left}#nextLink{right:0;float:right}#prevLink:hover,#prevLink:visited:hover{background:url(https://www.grocerycrud.com/forums/public/style_images/master/lightbox/prevlabel.gif) left 15% no-repeat}#nextLink:hover,#nextLink:visited:hover{background:url(https://www.grocerycrud.com/forums/public/style_images/master/lightbox/nextlabel.gif) right 15% no-repeat}#imageDataContainer{font:10px Verdana, Helvetica, sans-serif;background-color:#fff;margin:0
        auto;line-height:1.4em;overflow:auto;width:100%	}#imageData{padding:0
        10px;color:#666}#imageData
                        #imageDetails{width:70%;float:left;text-align:left}#imageData
                                                                           #caption{font-weight:bold}#imageData
                                                                                                     #numberDisplay{display:block;clear:left;padding-bottom:1.0em}#imageData
                                                                                                                                                                  #bottomNavClose{width:66px;float:right;padding-bottom:0.7em;outline:none}#overlay{position:fixed;top:0;left:0;z-index:15000 !important;width:100%;height:500px;background-color:#000}strong.bbc{font-weight:bold !important}em.bbc{font-style:italic !important}span.bbc_underline{text-decoration:underline !important}acronym.bbc{border-bottom:1px dotted #000}span.bbc_center,div.bbc_center,p.bbc_center{text-align:center;display:block}span.bbc_left,div.bbc_left,p.bbc_left{text-align:left;display:block}span.bbc_right,div.bbc_right,p.bbc_right{text-align:right;display:block}div.bbc_indent{margin-left:50px}del.bbc{text-decoration:line-through !important}.post.entry-content ul,ul.bbc{list-style:disc outside;margin:12px
        0 12px 40px}.post.entry-content ul,ul.bbc
        ul.bbc{list-style-type:circle}.post.entry-content ul,ul.bbc ul.bbc
        ul.bbc{list-style-type:square}.post.entry-content ul.decimal,ul.bbcol.decimal{margin:12px
        0 12px 40px;list-style-type:decimal}.post.entry-content ul.lower-alpha,ul.bbcol.lower-alpha{margin-left:40px;list-style-type:lower-alpha}.post.entry-content ul.upper-alpha,ul.bbcol.upper-alpha{margin-left:40px;list-style-type:upper-alpha}.post.entry-content ul.lower-roman,ul.bbcol.lower-roman{margin-left:40px;list-style-type:lower-roman}.post.entry-content ul.upper-roman,ul.bbcol.upper-roman{margin-left:40px;list-style-type:upper-roman}hr.bbc{display:block;border-top:2px solid #777}div.bbc_spoiler{}div.bbc_spoiler
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                span.spoiler_title{font-weight:bold}div.bbc_spoiler_wrapper{border:1px
        inset #777;padding:4px}div.bbc_spoiler_content{}input.bbc_spoiler_show{width:45px;font-size: .7em;margin:0px;padding:0px}pre.prettyprint{padding:5px;background:#f8f8f8;border:1px
        solid #c9c9c9;overflow:auto;margin-left:10px;font-size:11px;line-height:140%}img.bbc_img{cursor:pointer}.signature
                                                                                                                img.bbc_img{cursor:default}.signature a
                                                                                                                                           img.bbc_img{cursor:pointer}p.citation{font-size:12px;padding:8px
        10px;border-left:2px solid #989898;background:#f6f6f6;background:-moz-linear-gradient(top, #f6f6f6 0%, #e5e5e5 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#f6f6f6), color-stop(100%,#e5e5e5));border-top:2px solid #e5e5e5;border-right:2px solid #e5e5e5;-moz-border-radius:5px 5px 0 0;-webkit-border-radius:5px 5px 0 0;border-radius:5px 5px 0 0;font-weight:bold}div.blockquote{font-size:12px;padding:10px;border-left:2px solid #989898;border-right:2px solid #e5e5e5;border-bottom:2px solid #e5e5e5;-moz-border-radius:0 0 5px 5px;-webkit-border-radius:0 0 5px 5px;border-radius:0 0 5px 5px;background:#f7f7f7}div.blockquote
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        div.blockquote{margin:0
        10px 0 0}div.blockquote
                 p.citation{margin:6px
        10px 0 0}._sharedMediaBbcode{width:500px;background:#f6f6f6;background:-moz-linear-gradient(top, #f6f6f6 0%, #e5e5e5 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#f6f6f6), color-stop(100%,#e5e5e5));border:1px
        solid #dbdbdb;-moz-box-shadow:0px 1px 3px rgba(255,255,255,1) inset, 0px 1px 1px rgba(0,0,0,0.2);-webkit-box-shadow:0px 1px 3px rgba(255,255,255,1) inset, 0px 1px 1px rgba(0,0,0,0.2);box-shadow:0px 1px 3px rgba(255,255,255,1) inset, 0px 1px 2px rgba(0,0,0,0.2);-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;color:#616161;display:inline-block;margin-right:15px;margin-bottom:5px;padding:15px}.bbcode_mediaWrap
                                                                                                                                                                                                                                                                                                                                                                                                                                    .details{color:#616161;font-size:12px;line-height:1.5;margin-left:95px}.bbcode_mediaWrap .details
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           a{color:#616161;text-decoration:none}.bbcode_mediaWrap .details h5, .bbcode_mediaWrap .details h5
        a{font:400 20px/1.3 "Helvetica Neue", Helvetica, Arial, sans-serif;color:#2c2c2c;word-wrap:break-word;max-width:420px}.bbcode_mediaWrap
                                                                                                                              img.sharedmedia_image{float:left;position:relative;max-width:80px}.bbcode_mediaWrap
                                                                                                                                                                                                img.sharedmedia_screenshot{float:left;position:relative;max-width:80px}.cke_button_ipsmedia
                                                                                                                                                                                                                                                                       span.cke_label{display:inline !important}
    </style>


    <style type="text/css" >
        /* Inline CSS */

        /* CSS: ipb_editor*/

    </style>


    <style type="text/css" >
        /* Inline CSS */

        /* CSS: ipb_login_register*/

    </style>


    <style type="text/css" >
        /* Inline CSS */

        /* CSS: ipb_ucp*/

    </style>


    <style type="text/css" >
        /* Inline CSS */

        /* CSS: ipb_messenger*/

    </style>


    <style type="text/css" >
        /* Inline CSS */

        /* CSS: ipb_mlist*/

    </style>


    <style type="text/css" >
        /* Inline CSS */

        /* CSS: ipb_photo_editor*/

    </style>


    <style type="text/css" >
        /* Inline CSS */

        /* CSS: ipb_profile*/

    </style>


    <link rel="stylesheet" type="text/css" href="/css/main.css" />


    <style type="text/css" >
        /* Inline CSS */

        /* CSS: ipb_search*/

    </style>


    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" title='Main' media="screen" href="/public/style_css/css_18/ipb_ie.css" />
    <![endif]-->
    <!--[if lte IE 8]>
    <style type='text/css'>
        .ipb_table { table-layout: fixed; }
        .ipsLayout_content { width: 99.5%; }
    </style>
    <![endif]-->

    <style type='text/css'>
        img.bbc_img { max-width: 100% !important; }
    </style>
    <meta property="og:title" content=""/>
    <meta property="og:site_name" content="grocery CRUD forum"/>
    <meta property="og:image" content="https://www.grocerycrud.com/assets/themes/default/images/forums-facebook-image.png"/>
    <meta property="og:type" content="article" />



    <meta property="og:updated_time" content="Array" />






    <meta name="keywords" content="Array" />






    <meta name="description" content="Array" />



    <meta property="og:description" content="Array" />




    <meta name="identifier-url" content="Array" />


    <meta property="og:url" content="Array" />







    <script type='text/javascript' src='/public/js/3rd_party/prototype.js'></script>

    <script type='text/javascript' src='/public/js/ipb.js?ipbv=863bb407e1bf463ff5f60a6c1d241122&amp;load=quickpm,hovercard,sharelinks,topic,like'></script>

    <script type='text/javascript' src='/public/js/3rd_party/scriptaculous/scriptaculous-cache.js'></script>








    <link rel="canonical" href="https://forums.grocerycrud.com/<?php echo $canonicalUrl; ?>" />












    <script type='text/javascript'>
        //<![CDATA[
        /* ---- URLs ---- */
        ipb.vars['base_url'] 			= '/index.php?s=4cf0e1c2ec353c46d09ba6f395d21b30&';
        ipb.vars['board_url']			= 'https://forums.grocerycrud.com';
        ipb.vars['img_url'] 			= "/public/style_images/master";
        ipb.vars['loading_img'] 		= '/public/style_images/master/loading.gif';
        ipb.vars['active_app']			= 'forums';
        ipb.vars['upload_url']			= 'https://www.grocerycrud.com/forums/uploads';
        /* ---- Member ---- */
        ipb.vars['member_id']			= parseInt( 0 );
        ipb.vars['is_supmod']			= parseInt( 0 );
        ipb.vars['is_admin']			= parseInt( 0 );
        ipb.vars['secure_hash'] 		= '880ea6a14ea49e853634fbdc5015a024';
        ipb.vars['session_id']			= '4cf0e1c2ec353c46d09ba6f395d21b30';
        ipb.vars['twitter_id']			= 0;
        ipb.vars['fb_uid']				= 0;
        ipb.vars['auto_dst']			= parseInt( 0 );
        ipb.vars['dst_in_use']			= parseInt(  );
        ipb.vars['is_touch']			= false;
        ipb.vars['member_group']		= {"g_mem_info":"1"}
        /* ---- cookies ----- */
        ipb.vars['cookie_id'] 			= '';
        ipb.vars['cookie_domain'] 		= '';
        ipb.vars['cookie_path']			= '/';
        /* ---- Rate imgs ---- */
        ipb.vars['rate_img_on']			= '/public/style_images/master/star.png';
        ipb.vars['rate_img_off']		= '/public/style_images/master/star_off.png';
        ipb.vars['rate_img_rated']		= '/public/style_images/master/star_rated.png';
        /* ---- Uploads ---- */
        ipb.vars['swfupload_swf']		= '/public/js/3rd_party/swfupload/swfupload.swf';
        ipb.vars['swfupload_enabled']	= false;
        ipb.vars['use_swf_upload']		= ( '' == 'flash' ) ? true : false;
        ipb.vars['swfupload_debug']		= false;
        /* ---- other ---- */
        ipb.vars['highlight_color']     = "#ade57a";
        ipb.vars['charset']				= "UTF-8";
        ipb.vars['seo_enabled']			= 1;

        ipb.vars['seo_params']			= {"start":"-","end":"\/","varBlock":"?","varPage":"page-","varSep":"&","varJoin":"="};

        /* Templates/Language */
        ipb.templates['inlineMsg']		= "";
        ipb.templates['ajax_loading'] 	= "<div id='ajax_loading'><img src='/public/style_images/master/ajax_loading.gif' alt='" + ipb.lang['loading'] + "' /></div>";
        ipb.templates['close_popup']	= "<img src='/public/style_images/master/close_popup.png' alt='x' />";
        ipb.templates['rss_shell']		= new Template("<ul id='rss_menu' class='ipbmenu_content'>#{items}</ul>");
        ipb.templates['rss_item']		= new Template("<li><a href='#{url}' title='#{title}'>#{title}</a></li>");

        ipb.templates['autocomplete_wrap'] = new Template("<ul id='#{id}' class='ipb_autocomplete' style='width: 250px;'></ul>");
        ipb.templates['autocomplete_item'] = new Template("<li id='#{id}' data-url='#{url}'><img src='#{img}' alt='' class='ipsUserPhoto ipsUserPhoto_mini' />&nbsp;&nbsp;#{itemvalue}</li>");
        ipb.templates['page_jump']		= new Template("<div id='#{id}_wrap' class='ipbmenu_content'><h3 class='bar'>Jump to page</h3><p class='ipsPad'><input type='text' class='input_text' id='#{id}_input' size='8' /> <input type='submit' value='Go' class='input_submit add_folder' id='#{id}_submit' /></p></div>");
        ipb.templates['global_notify'] 	= new Template("<div class='popupWrapper'><div class='popupInner'><div class='ipsPad'>#{message} #{close}</div></div></div>");


        ipb.templates['header_menu'] 	= new Template("<div id='#{id}' class='ipsHeaderMenu boxShadow'></div>");

        Loader.boot();
        //]]>
    </script>
    <style type="text/css">
        .one .bsa_it_ad, .carbon-wrap
        {
            padding:5px !important;
            background: #fff !important;
            border: none !important;
            border-radius: 3px 3px 0 0;
        }
        .bsa_it_p, body .one .bsa_it_p
        {
            display:none !important;
            visibility: hidden;
        }

        #carbonads, #nbxepwf_5 {
            font-size: 14px;
            overflow: hidden;
            padding: 5px;
            background: #FFF;
            width: 292px;
            border-radius: 5px 5px 0px 0px;
        }
        #carbonads span, #nbxepwf_5 span {
            position: relative;
            display: block;
            overflow: hidden;
        }
        #carbonads .carbon-img, #carbonads .nbxepwf_5-img, #nbxepwf_5 .carbon-img, #nbxepwf_5 .nbxepwf_5-img {
            float: left;
            margin-right: 10px;
            width: 130px;
            height: 100px;
        }
        #carbonads .carbon-img img, #carbonads .nbxepwf_5-img img, #nbxepwf_5 .carbon-img img, #nbxepwf_5 .nbxepwf_5-img img {
            display: block;
        }
        #carbonads .carbon-text, #carbonads .nbxepwf_5-text, #nbxepwf_5 .carbon-text, #nbxepwf_5 .nbxepwf_5-text {
            height: 102px;
            overflow: hidden;
            width: 140px;
            display: block;
            float: left;
            text-align: left;
        }
        #carbonads .carbon-poweredby, #carbonads .nbxepwf_5-poweredby, #nbxepwf_5 .carbon-poweredby, #nbxepwf_5 .nbxepwf_5-poweredby {
            display: block;
            font-size: 11px;
            margin-top: -14px;
            width: 292px;
            text-align: right;
            position: absolute;
        }

        body.home .ads {
            position: absolute;
            margin-left: 847px;
        }

        body.default .ads {
            position: absolute;
            margin-left: 763px;
            margin-top: -71px;
        }
        body.default #carbonads {
            background: #f5f5f5;
        }

        #primary_nav
        {
            height:30px !important;
        }
        .ipsBlockquote
        {
            background: none repeat scroll 0 0 #F7F7F7 !important;
            border-color: #E5E5E5 #E5E5E5 #E5E5E5 #989898  !important;
            border-image: none  !important;
            border-radius: 5px 5px 5px 5px  !important;
            border-style: solid  !important;
            border-width: 2px  !important;
            font-size: 12px !important;
            margin: 0 !important;
            padding: 10px !important;
        }
    </style>
    <script>
        //When adblock is detected we are showing a different ad instead!
        //Beat that adblock!
        function adblock_detected() {
            setTimeout(function () {
                document.getElementById('adblock-detected').style.display = 'block';
                ga('send', 'event', 'Ad Block', 'Blocking');
            }, 500);
        }
    </script>
</head>
<body id='ipboard_body'>
<?php include_once("sections/top-info.php"); ?>
<div id='ipbwrapper'>
    <!-- ::: TOP BAR: Sign in / register or user drop down and notification alerts ::: -->
    <div id='header_bar' class='clearfix'>
        <div class='main_width'>

            <div id='user_navigation' class='not_logged_in'>

                <ul class='ipsList_inline right'>
                    <li>
									<span class='services'>
										
										
										
									</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ::: BRANDING STRIP: Logo and search box ::: -->
    <div id='branding'>
        <div class='main_width'>

            <?php include('sections/header.php'); ?>

            <!-- ::: CONTENT ::: -->

            <?php include(__DIR__ . '/sections/photo-thumbnail/photo-thumbnail-medium.php'); ?>

            <div itemscope itemtype="https://schema.org/Article" class='ipsBox_withphoto'>

                <h1 itemprop="headline" class='ipsType_pagetitle'><?php echo $topic["title"]; ?></h1>
                <div class='desc lighter blend_links'>
                    Started by <span itemprop="author"><?php echo $topic['starter_name']; ?></span>, <?php echo $topic['start_date']; ?>
                    <time itemprop="datePublished" datetime="<?php echo $topic['start_date_raw']; ?>"></time>
                </div>

                <br />

                <meta itemprop="interactionCount" content="UserComments:1" />
            </div>


            <?php include(__DIR__ . '/sections/pagination.php'); ?>

            <br/>

            <div class='maintitle clear clearfix'>
	<span class='ipsType_small'>

		
	</span>

            </div>

            <div class='topic hfeed clear clearfix'>

                <div class='ipsBox'>
                    <div class='ipsBox_container' id='ips_Posts'>


                        <?php foreach ($posts as $post) { ?>
                        <div class='post_block hentry clear clearfix'>

                            <div itemscope itemtype="https://schema.org/UserComments" class='post_wrap' >

                                <h3 class='row2'>
			

                                    <span itemprop="creator name" class="author vcard"><span class="fn name "><span itemprop="author"><?php echo $post->author_name; ?></span></span></span>


                                </h3>
                                <div class='author_info'>
                                    <div itemscope itemtype="https://schema.org/Person" class='user_details'>
                                        <span class='hide' itemprop="name"><?php echo $post->author_name; ?></span>
                                        <ul class='basic_info'>
                                            <li class='avatar'>
                                                <span class="ipsUserPhotoLink">
                                                <?php if ($post->pp_thumb_photo) {
                                                    if (strstr($post->pp_thumb_photo, 'http')) { ?>
                                                        <img src="<?php echo $post->pp_thumb_photo; ?>" alt="profile picture" class="ipsUserPhoto ipsUserPhoto_large">
                                                        <?php
                                                    } else { ?>
                                                        <img src="/uploads/<?php echo $post->pp_thumb_photo; ?>" alt="profile picture" class="ipsUserPhoto ipsUserPhoto_large">
                                                        <?php
                                                    }
                                                } else { ?>
                                                    <img src="/public/style_images/master/profile/default_large.png" alt="profile picture" class="ipsUserPhoto ipsUserPhoto_large">
                                                <?php } ?>
                                            </span>

                                            </li>
                                            <li class='group_title'>
                                                <?php if ($post->author_name === "web-johnny") { ?>
                                                    <span style="color:red;">Administrator</span>
                                                <?php } else {
                                                    echo "Member";
                                                }?>
                                            </li>

                                            <?php if ($post->author_name === "web-johnny") { ?>
                                            <li class="group_icon">
                                                <img src="/public/style_extra/team_icons/admin.png" alt="">
                                            </li>

                                            <li class="post_count desc lighter">
                                                1,166 posts
                                            </li>
                                            <?php }?>

                                        </ul>


                                        <ul class='custom_fields'>





                                        </ul>


                                    </div>
                                </div>
                                <div class='post_body'>
                                    <p class='posted_info desc lighter ipsType_small'>
                                        Posted <abbr class="published" itemprop="commentTime" title="<?php echo $post->post_date_raw; ?>"><?php echo $post->post_date; ?></abbr>
                                    </p>

                                    <div itemprop="commentText" class='post entry-content '>
                                        <?php echo $post->post; ?>


                                        <br />

                                    </div>



                                    <script type='text/javascript'>
                                        ipb.global.registerReputation( 'rep_post_152626', { domLikeStripId: 'like_post_152626', app: 'forums', type: 'pid', typeid: '152626' }, parseInt('0') );
                                    </script>








                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <hr />




                    </div>
                </div>

                <hr />

                <!-- Close topic -->
            </div>
            <!-- BOTTOM BUTTONS -->

            <br />
            <div class='clear clearfix left'>


            </div>
            <br />

            <div id='multiQuoteInsert' style='display: none;' class='ipsFloatingAction'>
                <span class='ipsButton no_width' id='mqbutton'>Reply to quoted posts</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' id='multiQuoteClear' class='ipsType_smaller desc' title='Clear the posts you have selected with MultiQuote'>Clear</a> &nbsp;&nbsp;&nbsp;
            </div>
            <form id="modform" method="post" action="/index.php?">
                <input type="hidden" name="app" value="forums" />
                <input type="hidden" name="module" value="moderate" />
                <input type="hidden" name="section" value="moderate" />
                <input type="hidden" name="do" value="postchoice" />
                <input type="hidden" name="f" value="11" />
                <input type="hidden" name="t" value="139616" />
                <input type="hidden" name="auth_key" value="880ea6a14ea49e853634fbdc5015a024" />
                <input type="hidden" name="st" value="" />
                <input type="hidden" value="" name="selectedpidsJS" id='selectedpidsJS' />
                <input type="hidden" name="tact" id="tact" value="" />
            </form>

            <br/>
        </div>
        <!-- ::: FOOTER (Change skin, language, mark as read, etc) ::: -->
        <div id='footer_utilities' class='main_width clearfix clear'>

        </div>

    </div>
    <?php include('sections/google-analytics.php'); ?>
</body>
</html>