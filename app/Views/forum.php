<!DOCTYPE html>
<html lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta charset="UTF-8"/>
    <title>Grocery CRUD Enterprise - grocery CRUD forum</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" href="/assets/themes/default/images/favicon.png"/>
    <link rel="image_src" href='https://www.grocerycrud.com/assets/themes/default/images/forums-facebook-image.png'/>
    <script type='text/javascript'>
        //<![CDATA[
        jsDebug = 0; /* Must come before JS includes */
        USE_RTE = 1;
        DISABLE_AJAX = parseInt(0); /* Disables ajax requests where text is sent to the DB; helpful for charset issues */
        inACP = false;
        var isRTL = false;
        var rtlIe = '';
        var rtlFull = '';
        var IPS_extra_plugins = [];
        //]]>
    </script>


    <style type="text/css">
        /* Inline CSS */

        /* CSS: ipb_help*/

    </style>


    <style type="text/css" title="Main" media="screen">
        /* Inline CSS */

        /* CSS: calendar_select*/
        .calendar_date_select {
            color: white;
            border: #777 1px solid;
            display: block;
            width: 195px;
            z-index: 1000
        }

        iframe.ie6_blocker {
            position: absolute;
            z-index: 999
        }

        .calendar_date_select thead
        th {
            font-weight: bold;
            background-color: #aaa;
            border-top: 1px solid #777;
            border-bottom: 1px solid #777;
            color: white !important
        }

        .calendar_date_select
        .cds_buttons {
            text-align: center;
            padding: 5px 0px;
            background-color: #555
        }

        .calendar_date_select
        .cds_footer {
            background-color: black;
            padding: 3px;
            font-size: 12px;
            text-align: center
        }

        .calendar_date_select
        table {
            margin: 0px;
            padding: 0px
        }

        .calendar_date_select
        .cds_header {
            background-color: #ccc;
            border-bottom: 2px solid #aaa;
            text-align: center
        }

        .calendar_date_select .cds_header
        span {
            font-size: 15px;
            color: black;
            font-weight: bold
        }

        .calendar_date_select
        select {
            font-size: 11px
        }

        .calendar_date_select .cds_header a:hover {
            color: white
        }

        .calendar_date_select .cds_header
        a {
            width: 22px;
            height: 20px;
            text-decoration: none;
            font-size: 14px;
            color: black !important
        }

        .calendar_date_select .cds_header
        a.prev {
            float: left
        }

        .calendar_date_select .cds_header
        a.next {
            float: right
        }

        .calendar_date_select .cds_header
        a.close {
            float: right;
            display: none
        }

        .calendar_date_select .cds_header
        select.month {
            width: 90px
        }

        .calendar_date_select .cds_header
        select.year {
            width: 61px
        }

        .calendar_date_select .cds_buttons
        a {
            color: white;
            font-size: 9px
        }

        .calendar_date_select
        td {
            font-size: 12px;
            width: 24px;
            height: 21px;
            text-align: center;
            vertical-align: middle;
            background-color: #fff
        }

        .calendar_date_select
        td.weekend {
            background-color: #eee;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd
        }

        .calendar_date_select td
        div {
            color: #000
        }

        .calendar_date_select td
        div.other {
            color: #ccc
        }

        .calendar_date_select td.selected
        div {
            color: white
        }

        .calendar_date_select tbody
        td {
            border-bottom: 1px solid #ddd
        }

        .calendar_date_select
        td.selected {
            background-color: #777
        }

        .calendar_date_select td:hover {
            background-color: #ccc
        }

        .calendar_date_select
        td.today {
            border: 1px dashed #999
        }

        .calendar_date_select td.disabled
        div {
            color: #e6e6e6
        }

        .fieldWithErrors
        .calendar_date_select {
            border: 2px solid red
        }
    </style>


    <style type="text/css">
        /* Inline CSS */

        /* CSS: ipb_ckeditor*/

    </style>


    <style type="text/css" title="Main" media="screen,print">
        /* Inline CSS */

        /* CSS: ipb_common*/
        #lightbox {
            position: absolute;
            left: 0;
            width: 100%;
            z-index: 16000 !important;
            text-align: center;
            line-height: 0
        }

        #lightbox
        img {
            width: auto;
            height: auto
        }

        #lightbox a
        img {
            border: none
        }

        #outerImageContainer {
            position: relative;
            background-color: #fff;
            width: 250px;
            height: 250px;
            margin: 0 auto
        }

        #imageContainer {
            padding: 10px
        }

        #loading {
            position: absolute;
            top: 40%;
            left: 0%;
            height: 25%;
            width: 100%;
            text-align: center;
            line-height: 0
        }

        #hoverNav {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 10
        }

        #imageContainer > #hoverNav {
            left: 0
        }

        #hoverNav
        a {
            outline: none
        }

        #prevLink, #nextLink {
            width: 49%;
            height: 100%;
            background-image: url(/public/style_images/master/spacer.gif);
            display: block
        }

        #prevLink {
            left: 0;
            float: left
        }

        #nextLink {
            right: 0;
            float: right
        }

        #prevLink:hover, #prevLink:visited:hover {
            background: url(/public/style_images/master/lightbox/prevlabel.gif) left 15% no-repeat
        }

        #nextLink:hover, #nextLink:visited:hover {
            background: url(/public/style_images/master/lightbox/nextlabel.gif) right 15% no-repeat
        }

        #imageDataContainer {
            font: 10px Verdana, Helvetica, sans-serif;
            background-color: #fff;
            margin: 0 auto;
            line-height: 1.4em;
            overflow: auto;
            width: 100%
        }

        #imageData {
            padding: 0 10px;
            color: #666
        }

        #imageData
        #imageDetails {
            width: 70%;
            float: left;
            text-align: left
        }

        #imageData
        #caption {
            font-weight: bold
        }

        #imageData
        #numberDisplay {
            display: block;
            clear: left;
            padding-bottom: 1.0em
        }

        #imageData
        #bottomNavClose {
            width: 66px;
            float: right;
            padding-bottom: 0.7em;
            outline: none
        }

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 15000 !important;
            width: 100%;
            height: 500px;
            background-color: #000
        }

        strong.bbc {
            font-weight: bold !important
        }

        em.bbc {
            font-style: italic !important
        }

        span.bbc_underline {
            text-decoration: underline !important
        }

        acronym.bbc {
            border-bottom: 1px dotted #000
        }

        span.bbc_center, div.bbc_center, p.bbc_center {
            text-align: center;
            display: block
        }

        span.bbc_left, div.bbc_left, p.bbc_left {
            text-align: left;
            display: block
        }

        span.bbc_right, div.bbc_right, p.bbc_right {
            text-align: right;
            display: block
        }

        div.bbc_indent {
            margin-left: 50px
        }

        del.bbc {
            text-decoration: line-through !important
        }

        .post.entry-content ul, ul.bbc {
            list-style: disc outside;
            margin: 12px 0 12px 40px
        }

        .post.entry-content ul, ul.bbc
        ul.bbc {
            list-style-type: circle
        }

        .post.entry-content ul, ul.bbc ul.bbc
        ul.bbc {
            list-style-type: square
        }

        .post.entry-content ul.decimal, ul.bbcol.decimal {
            margin: 12px 0 12px 40px;
            list-style-type: decimal
        }

        .post.entry-content ul.lower-alpha, ul.bbcol.lower-alpha {
            margin-left: 40px;
            list-style-type: lower-alpha
        }

        .post.entry-content ul.upper-alpha, ul.bbcol.upper-alpha {
            margin-left: 40px;
            list-style-type: upper-alpha
        }

        .post.entry-content ul.lower-roman, ul.bbcol.lower-roman {
            margin-left: 40px;
            list-style-type: lower-roman
        }

        .post.entry-content ul.upper-roman, ul.bbcol.upper-roman {
            margin-left: 40px;
            list-style-type: upper-roman
        }

        hr.bbc {
            display: block;
            border-top: 2px solid #777
        }

        div.bbc_spoiler {
        }

        div.bbc_spoiler
        span.spoiler_title {
            font-weight: bold
        }

        div.bbc_spoiler_wrapper {
            border: 1px inset #777;
            padding: 4px
        }

        div.bbc_spoiler_content {
        }

        input.bbc_spoiler_show {
            width: 45px;
            font-size: .7em;
            margin: 0px;
            padding: 0px
        }

        pre.prettyprint {
            padding: 5px;
            background: #f8f8f8;
            border: 1px solid #c9c9c9;
            overflow: auto;
            margin-left: 10px;
            font-size: 11px;
            line-height: 140%
        }

        img.bbc_img {
            cursor: pointer
        }

        .signature
        img.bbc_img {
            cursor: default
        }

        .signature a
        img.bbc_img {
            cursor: pointer
        }

        p.citation {
            font-size: 12px;
            padding: 8px 10px;
            border-left: 2px solid #989898;
            background: #f6f6f6;
            background: -moz-linear-gradient(top, #f6f6f6 0%, #e5e5e5 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f6f6f6), color-stop(100%, #e5e5e5));
            border-top: 2px solid #e5e5e5;
            border-right: 2px solid #e5e5e5;
            -moz-border-radius: 5px 5px 0 0;
            -webkit-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;
            font-weight: bold
        }

        div.blockquote {
            font-size: 12px;
            padding: 10px;
            border-left: 2px solid #989898;
            border-right: 2px solid #e5e5e5;
            border-bottom: 2px solid #e5e5e5;
            -moz-border-radius: 0 0 5px 5px;
            -webkit-border-radius: 0 0 5px 5px;
            border-radius: 0 0 5px 5px;
            background: #f7f7f7
        }

        div.blockquote
        div.blockquote {
            margin: 0 10px 0 0
        }

        div.blockquote
        p.citation {
            margin: 6px 10px 0 0
        }

        ._sharedMediaBbcode {
            width: 500px;
            background: #f6f6f6;
            background: -moz-linear-gradient(top, #f6f6f6 0%, #e5e5e5 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f6f6f6), color-stop(100%, #e5e5e5));
            border: 1px solid #dbdbdb;
            -moz-box-shadow: 0px 1px 3px rgba(255, 255, 255, 1) inset, 0px 1px 1px rgba(0, 0, 0, 0.2);
            -webkit-box-shadow: 0px 1px 3px rgba(255, 255, 255, 1) inset, 0px 1px 1px rgba(0, 0, 0, 0.2);
            box-shadow: 0px 1px 3px rgba(255, 255, 255, 1) inset, 0px 1px 2px rgba(0, 0, 0, 0.2);
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            color: #616161;
            display: inline-block;
            margin-right: 15px;
            margin-bottom: 5px;
            padding: 15px
        }

        .bbcode_mediaWrap
        .details {
            color: #616161;
            font-size: 12px;
            line-height: 1.5;
            margin-left: 95px
        }

        .bbcode_mediaWrap .details
        a {
            color: #616161;
            text-decoration: none
        }

        .bbcode_mediaWrap .details h5, .bbcode_mediaWrap .details h5
        a {
            font: 400 20px/1.3 "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #2c2c2c;
            word-wrap: break-word;
            max-width: 420px
        }

        .bbcode_mediaWrap
        img.sharedmedia_image {
            float: left;
            position: relative;
            max-width: 80px
        }

        .bbcode_mediaWrap
        img.sharedmedia_screenshot {
            float: left;
            position: relative;
            max-width: 80px
        }

        .cke_button_ipsmedia
        span.cke_label {
            display: inline !important
        }
    </style>


    <style type="text/css">
        /* Inline CSS */

        /* CSS: ipb_editor*/

    </style>


    <style type="text/css">
        /* Inline CSS */

        /* CSS: ipb_login_register*/

    </style>


    <style type="text/css">
        /* Inline CSS */

        /* CSS: ipb_ucp*/

    </style>


    <style type="text/css">
        /* Inline CSS */

        /* CSS: ipb_messenger*/

    </style>


    <style type="text/css">
        /* Inline CSS */

        /* CSS: ipb_mlist*/

    </style>


    <style type="text/css">
        /* Inline CSS */

        /* CSS: ipb_photo_editor*/

    </style>


    <style type="text/css">
        /* Inline CSS */

        /* CSS: ipb_profile*/

    </style>


    <link rel="stylesheet" type="text/css" href="/css/main.css"/>

    <style type="text/css">
        /* Inline CSS */

        /* CSS: ipb_search*/

    </style>


    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" title='Main' media="screen" href="/public/style_css/css_18/ipb_ie.css"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <style type='text/css'>
        .ipb_table {
            table-layout: fixed;
        }

        .ipsLayout_content {
            width: 99.5%;
        }
    </style>
    <![endif]-->

    <style type='text/css'>
        img.bbc_img {
            max-width: 100% !important;
        }
    </style>
    <meta property="og:title" content=""/>
    <meta property="og:site_name" content="grocery CRUD forum"/>
    <meta property="og:image"
          content="https://www.grocerycrud.com/assets/themes/default/images/forums-facebook-image.png"/>
    <meta property="og:type" content="article"/>


    <meta name="description" content="Array"/>


    <meta property="og:description" content="Array"/>


    <meta name="identifier-url" content="Array"/>


    <meta property="og:url" content="Array"/>


    <script type='text/javascript' src='/public/js/3rd_party/prototype.js'></script>

    <script type='text/javascript'
            src='/public/js/ipb.js?ipbv=863bb407e1bf463ff5f60a6c1d241122&amp;load=quickpm,hovercard,forums,like'></script>

    <script type='text/javascript' src='/public/js/3rd_party/scriptaculous/scriptaculous-cache.js'></script>

    <script type="text/javascript" src='/cache/lang_cache/1/ipb.lang.js' charset='UTF-8'></script>


    <link id="ipsCanonical" rel="canonical" href="/forum/11-grocery-crud-enterprise/"/>


    <link rel='next'
          href='/forum/11-grocery-crud-enterprise/page-2?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all'/>


    <link rel='last'
          href='/forum/11-grocery-crud-enterprise/page-11?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all'/>


    <link rel='up' href='/forum/3-support/'/>


    <script type='text/javascript'>
        //<![CDATA[
        /* ---- URLs ---- */
        ipb.vars['base_url'] = '/index.php?s=6d9b17e7f5a0054df48d8ebf08c515b4&';
        ipb.vars['board_url'] = 'https://forums.grocerycrud.com';
        ipb.vars['img_url'] = "/public/style_images/master";
        ipb.vars['loading_img'] = '/public/style_images/master/loading.gif';
        ipb.vars['active_app'] = 'forums';
        ipb.vars['upload_url'] = '/uploads';
        /* ---- Member ---- */
        ipb.vars['member_id'] = parseInt(0);
        ipb.vars['is_supmod'] = parseInt(0);
        ipb.vars['is_admin'] = parseInt(0);
        ipb.vars['secure_hash'] = '880ea6a14ea49e853634fbdc5015a024';
        ipb.vars['session_id'] = '6d9b17e7f5a0054df48d8ebf08c515b4';
        ipb.vars['twitter_id'] = 0;
        ipb.vars['fb_uid'] = 0;
        ipb.vars['auto_dst'] = parseInt(0);
        ipb.vars['dst_in_use'] = parseInt();
        ipb.vars['is_touch'] = false;
        ipb.vars['member_group'] = {"g_mem_info": "1"}
        /* ---- cookies ----- */
        ipb.vars['cookie_id'] = '';
        ipb.vars['cookie_domain'] = '';
        ipb.vars['cookie_path'] = '/';
        /* ---- Rate imgs ---- */
        ipb.vars['rate_img_on'] = '/public/style_images/master/star.png';
        ipb.vars['rate_img_off'] = '/public/style_images/master/star_off.png';
        ipb.vars['rate_img_rated'] = '/public/style_images/master/star_rated.png';
        /* ---- Uploads ---- */
        ipb.vars['swfupload_swf'] = '/public/js/3rd_party/swfupload/swfupload.swf';
        ipb.vars['swfupload_enabled'] = false;
        ipb.vars['use_swf_upload'] = ('' == 'flash') ? true : false;
        ipb.vars['swfupload_debug'] = false;
        /* ---- other ---- */
        ipb.vars['highlight_color'] = "#ade57a";
        ipb.vars['charset'] = "UTF-8";
        ipb.vars['seo_enabled'] = 1;

        ipb.vars['seo_params'] = {
            "start": "-",
            "end": "\/",
            "varBlock": "?",
            "varPage": "page-",
            "varSep": "&",
            "varJoin": "="
        };

        /* Templates/Language */
        ipb.templates['inlineMsg'] = "";
        ipb.templates['ajax_loading'] = "<div id='ajax_loading'><img src='/public/style_images/master/ajax_loading.gif' alt='" + ipb.lang['loading'] + "' /></div>";
        ipb.templates['close_popup'] = "<img src='/public/style_images/master/close_popup.png' alt='x' />";
        ipb.templates['rss_shell'] = new Template("<ul id='rss_menu' class='ipbmenu_content'>#{items}</ul>");
        ipb.templates['rss_item'] = new Template("<li><a href='#{url}' title='#{title}'>#{title}</a></li>");

        ipb.templates['autocomplete_wrap'] = new Template("<ul id='#{id}' class='ipb_autocomplete' style='width: 250px;'></ul>");
        ipb.templates['autocomplete_item'] = new Template("<li id='#{id}' data-url='#{url}'><img src='#{img}' alt='' class='ipsUserPhoto ipsUserPhoto_mini' />&nbsp;&nbsp;#{itemvalue}</li>");
        ipb.templates['page_jump'] = new Template("<div id='#{id}_wrap' class='ipbmenu_content'><h3 class='bar'>Jump to page</h3><p class='ipsPad'><input type='text' class='input_text' id='#{id}_input' size='8' /> <input type='submit' value='Go' class='input_submit add_folder' id='#{id}_submit' /></p></div>");
        ipb.templates['global_notify'] = new Template("<div class='popupWrapper'><div class='popupInner'><div class='ipsPad'>#{message} #{close}</div></div></div>");


        ipb.templates['header_menu'] = new Template("<div id='#{id}' class='ipsHeaderMenu boxShadow'></div>");

        Loader.boot();
        //]]>
    </script>
    <style type="text/css">
        .one .bsa_it_ad, .carbon-wrap {
            padding: 5px !important;
            background: #fff !important;
            border: none !important;
            border-radius: 3px 3px 0 0;
        }

        .bsa_it_p, body .one .bsa_it_p {
            display: none !important;
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

        #primary_nav {
            height: 30px !important;
        }

        .ipsBlockquote {
            background: none repeat scroll 0 0 #F7F7F7 !important;
            border-color: #E5E5E5 #E5E5E5 #E5E5E5 #989898 !important;
            border-image: none !important;
            border-radius: 5px 5px 5px 5px !important;
            border-style: solid !important;
            border-width: 2px !important;
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
<p id='content_jump' style="background: #d8dde8;padding: 20px 10px;font-size: 16px;text-align:center"> &#9888; In case
    you've missed it we have migrated to our <a href="https://www.grocerycrud.com/" title="new website"
                                                style="text-decoration: underline">new website</a>, with a brand <a
        href="https://discuss.grocerycrud.com/" title="new forum" style="text-decoration: underline">new forum</a>. For
    more details about the migration you can read our blog post for <a
        href="https://www.grocerycrud.com/blog/new-website-migration" title="website migration"
        style="text-decoration: underline">website migration</a>. This forum is read-only and soon will be archived.
    &#9888; </p>
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
                        &nbsp;&nbsp;&nbsp;
                    </li>
                    <!--<li>
                        <a href="/index.php?app=core&amp;module=global&amp;section=register" title='Create Account' id='register_link'>Create Account</a>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
    <!-- ::: BRANDING STRIP: Logo and search box ::: -->
    <div id='branding'>
        <div class='main_width'>

            <?php include('sections/header.php'); ?>

            <!-- ::: CONTENT ::: -->


            <script type="text/javascript">
                //<![CDATA[
                //Search Setup
                ipb.vars['search_type'] = 'forum';
                ipb.vars['search_type_id'] = 11;
                ipb.templates['topic_rename'] = new Template("<input type='text' id='#{inputid}' value='#{value}' class='input_text' size='50' maxlength='150' /> <input type='submit' value='Update' class='input_submit' id='#{submitid}' /> <a href='#' id='#{cancelid}' class='cancel' title='Cancel'>Cancel</a>");
                var markerURL = ipb.vars['base_url'] + "app=forums&module=ajax&section=markasread&i=1"; // Ajax URL so don't use &amp;
                var unreadIcon = "<img src='/public/style_images/master/f_icon_read.png' />";

                ipb.templates['topic_moderation'] = new Template("<div id='comment_moderate_box' class='ipsFloatingAction' style='display: none'><span class='desc'>With <span id='comment_count'>#{count}</span> checked topics: </span><select id='tactInPopup' class='input_select'></select>&nbsp;&nbsp;<input type='button' class='input_submit' id='submitModAction' value='Go' /></div>");
                //]]>
            </script>

            <h1 class='ipsType_pagetitle'><?php echo $forum['name']; ?></h1>
            <div class='ipsType_pagedesc forum_rules'>

                <?php echo $forum['description']; ?>

            </div>
            <br/>

            <!-- __-SUBFORUMS-__ -->

            <div class='topic_controls clearfix'>
                <div class='pagination clearfix left '>
                    <ul class='ipsList_inline back left'>


                    </ul>
                    <ul class='ipsList_inline left pages'>
                        <li class='pagejump clickable pj0424018001'>
                            <a href='#'>Page 1 of 11
                                <!--<img src='/public/style_images/master/dropdown.png' alt='+' />--></a>
                            <script type='text/javascript'>
                                ipb.global.registerPageJump('0424018001', {
                                    url: "/forum/11-grocery-crud-enterprise/?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all",
                                    stKey: 'st',
                                    perPage: 30,
                                    totalPages: 11,
                                    anchor: ''
                                });
                            </script>
                        </li>


                        <li class='page active'>1</li>


                        <li class='page'><a
                                href="/forum/11-grocery-crud-enterprise/?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all&st=30"
                                title="2">2</a></li>


                        <li class='page'><a
                                href="/forum/11-grocery-crud-enterprise/?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all&st=60"
                                title="3">3</a></li>


                    </ul>
                    <ul class='ipsList_inline forward left'>

                        <li class='next'><a
                                href="/forum/11-grocery-crud-enterprise/?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all&st=30"
                                title=" Next page" rel='next'>Next</a></li>


                        <li class='last'><a
                                href="/forum/11-grocery-crud-enterprise/?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all&st=300"
                                title=" Go to last page" rel='last'>&raquo;</a></li>

                    </ul>
                </div>
                <ul class='topic_buttons'>


                    <li class='non_button'>
                        <a data-clicklaunch="forumMarkRead" data-fid="11"
                           href='/index.php?app=forums&amp;module=forums&amp;section=markasread&amp;marktype=forum&amp;forumid=11&amp;returntoforumid=11'
                           title='Mark this forum as read'><img src='/public/style_images/master/icon_check.png'/>
                            &nbsp;Mark this forum as read</a>
                    </li>
                </ul>


            </div>


            <div class='ipsFilterbar maintitle'>


            </div>
            <div id='forum_filter_menucontent' class='ipbmenu_content ipsPad' style='display: none'>
                <form id='filter_form' action="/forum/11-grocery-crud-enterprise/?changefilters=1" method="post">
                    <strong>Show topic type</strong><br/>
                    <select name="topicfilter" id='topic_filter' class='input_select'>
                        <option value='all' selected='selected'>All Topics</option>
                        <option value='open'>Open</option>
                        <option value='hot'>Hot</option>
                        <option value='poll'>Polls</option>
                        <option value='locked'>Locked</option>
                        <option value='moved'>Moved</option>
                    </select>
                    <br/><br/>

                    <strong>Sort by</strong><br/>
                    <select name="sort_key" id='sort_by' class='input_select'>
                        <option value='last_post' selected='selected'>Last Post</option>
                        <option value='last_poster_name'>Last Poster</option>
                        <option value='title'>Topic Title</option>
                        <option value='starter_name'>Topic Starter</option>
                        <option value='start_date'>Topic Started</option>
                        <option value='topic_hasattach'>Attachments</option>
                        <option value='posts'>Replies</option>
                        <option value='views'>Views</option>
                    </select>
                    <br/><br/>

                    <strong>Sort direction</strong><br/>
                    <select name="sort_by" id='direction' class='input_select'>
                        <option value='Z-A' selected='selected'>Descending (Z-A)</option>
                        <option value='A-Z'>Ascending (A-Z)</option>
                    </select>
                    <br/><br/>

                    <strong>Time frame</strong><br/>
                    <select name="prune_day" id='time_frame' class='input_select'>
                        <option value='1'>From Today</option>
                        <option value='5'>Last 5 days</option>
                        <option value='7'>Last 7 days</option>
                        <option value='10'>Last 10 days</option>
                        <option value='15'>Last 15 days</option>
                        <option value='20'>Last 20 days</option>
                        <option value='25'>Last 25 days</option>
                        <option value='30'>Last 30 days</option>
                        <option value='60'>Last 60 days</option>
                        <option value='90'>Last 90 days</option>
                        <option value='100' selected='selected'>Show All</option>
                        <option value='200'>Since Last Visit</option>
                    </select>
                    <br/><br/>

                    <input type='checkbox' value='1' name='remember' class='input_check' id='remember_filter'/> <label
                        for='remember_filter'>Remember filters</label>
                    <br/><br/>

                    <input type="submit" value="Update Filter" class="input_submit"/>
                </form>
            </div>
            <script type='text/javascript'>
                new ipb.Menu($('forum_filter'), $('forum_filter_menucontent'), {stopClose: true});
            </script>
            <div class='ipsBox'>
                <div class='ipsBox_container'>
                    <table class='ipb_table topic_list hover_rows '
                           summary='Topics In This Forum "Grocery CRUD Enterprise"' id='forum_table'>
                        <tr class='header hide'>
                            <th scope='col' class='col_f_icon'>&nbsp;</th>
                            <th scope='col' class='col_f_topic'>Topic</th>
                            <th scope='col' class='col_f_starter short'>Started By</th>
                            <th scope='col' class='col_f_views stats'>Stats</th>
                            <th scope='col' class='col_f_post'>Last Post Info</th>

                        </tr>
                        <!-- BEGIN TOPICS -->


                        <?php ;
                        foreach ($topics as $topic) { ?>
                        <tr itemscope itemtype="http://schema.org/Article" class='__topic  expandable' id='trow_139616'
                            data-tid="139616">
                            <td class='col_f_icon altrow short'>


                            </td>
                            <td class='col_f_content '>
                                <h4>

                                    <a itemprop="url" id="tid-link-139616"
                                       href="/topic/139616-newbie-question-about-installing-grocery-crud-for-codeigniter-4/"
                                       title='Newbie question about installing Grocery CRUD for CodeIgniter 4 - started  28 November 2021 - 02:29 AM'
                                       class='topic_title'>
                                        <span itemprop="name"><?php echo($topic->title);?></a>
                                </h4>
                                <br/>
                                <span class='desc lighter blend_links'>
			Started by <a hovercard-ref="member" hovercard-id="5559" class="_hovertrigger url fn name "
                          href='/user/5559-daveoreardon/' title='View Profile'><span itemprop="name">daveoreardon</span></a>, <span
                                        itemprop="dateCreated">28 Nov 2021</span>



		</span>

                            </td>
                            <td class='col_f_preview __topic_preview'>

                                <a href='/topic/139616-newbie-question-about-installing-grocery-crud-for-codeigniter-4/'
                                   class='expander closed' title='Preview this topic'>&nbsp;</a>

                            </td>
                            <td class='col_f_views desc blend_links'>
                                <ul>
                                    <li>

                                        <?php echo number_format($topic->posts); ?> replies
                                        <meta itemprop="interactionCount" content="UserComments:0"/>
                                    </li>
                                    <li class='views desc'><?php echo number_format($topic->views); ?> views</li>
                                </ul>
                            </td>
                            <td class='col_f_post'>

                                <a href='/user/5559-daveoreardon/' class='ipsUserPhotoLink left'>

                                    <img
                                        src='https://secure.gravatar.com/avatar/f9d5f7a0d4f28160857b04ea4340a56a?s=100&amp;d=https%3A%2F%2Fforums.grocerycrud.com%2Fpublic%2Fstyle_images%2Fmaster%2Fprofile%2Fdefault_large.png'
                                        alt='Newbie question about installing Grocery CRUD for CodeIgniter 4 - last post by daveoreardon'
                                        class='ipsUserPhoto ipsUserPhoto_mini'
                                        onerror='this.onerror=null;this.src="http://www.grocerycrud.com/forums/public/style_images/master/profile/default_large.png";'/>

                                </a>

                                <ul class='last_post ipsType_small'>
                                    <li><a hovercard-ref="member" hovercard-id="5559" class="_hovertrigger url fn name "
                                           href='/user/5559-daveoreardon/' title='View Profile'><span itemprop="name">daveoreardon</span></a>
                                    </li>
                                    <li>
                                        <a href='/topic/139616-newbie-question-about-installing-grocery-crud-for-codeigniter-4/?view=getlastpost'
                                           title='Go to last post: Newbie question about installing Grocery CRUD for CodeIgniter 4'>
                                            28 Nov 2021
                                        </a>
                                    </li>
                                </ul>
                            </td>

                        </tr>
                        <?php } ?>

                    </table>

                    <script type='text/javascript'>
                        ipb.forums.fetchMore = {
                            'f': parseInt("11"),
                            'st': parseInt(""),
                            'sort_by': "Z-A",
                            'sort_key': "last_post",
                            'topicfilter': "",
                            'prune_day': "",
                            'max_topics': "30"
                        };
                    </script>

                </div>
            </div>

            <br/>
            <div class='topic_controls clear'>
                <div class='pagination clearfix left '>
                    <ul class='ipsList_inline back left'>


                    </ul>
                    <ul class='ipsList_inline left pages'>
                        <li class='pagejump clickable pj0424018001'>
                            <a href='#'>Page 1 of 11
                                <!--<img src='/public/style_images/master/dropdown.png' alt='+' />--></a>
                            <script type='text/javascript'>
                                ipb.global.registerPageJump('0424018001', {
                                    url: "/forum/11-grocery-crud-enterprise/?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all",
                                    stKey: 'st',
                                    perPage: 30,
                                    totalPages: 11,
                                    anchor: ''
                                });
                            </script>
                        </li>


                        <li class='page active'>1</li>


                        <li class='page'><a
                                href="/forum/11-grocery-crud-enterprise/?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all&st=30"
                                title="2">2</a></li>


                        <li class='page'><a
                                href="/forum/11-grocery-crud-enterprise/?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all&st=60"
                                title="3">3</a></li>


                    </ul>
                    <ul class='ipsList_inline forward left'>

                        <li class='next'><a
                                href="/forum/11-grocery-crud-enterprise/?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all&st=30"
                                title=" Next page" rel='next'>Next</a></li>


                        <li class='last'><a
                                href="/forum/11-grocery-crud-enterprise/?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all&st=300"
                                title=" Go to last page" rel='last'>&raquo;</a></li>

                    </ul>
                </div>
            </div>
            <br class='clear'/>
            <div id='forum_footer' class='statistics clear clearfix'>

            </div>
            <br class='clear'/>

            <select style='display:none' id='multiModOptions'>

            </select>
        </div>
        <!-- ::: FOOTER (Change skin, language, mark as read, etc) ::: -->
        <div id='footer_utilities' class='main_width clearfix clear'>
            <a rel="nofollow" href='#top' id='backtotop' title='Go to top'><img
                    src='/public/style_images/master/top.png' alt=''/></a>
            <ul class='ipsList_inline left'>
                <li>
                    <img src='/public/style_images/master/feed.png' alt='RSS Feed' id='rss_feed' class='clickable'/>
                </li>

                <li>
                    <a href="/index.php?app=core&amp;module=help" title='View help' rel="help" accesskey='6'>Help</a>
                </li>
            </ul>

        </div>

        <div><img src='/index.php?app=core&amp;module=task' alt='' style='border: 0px;height:1px;width:1px;'/></div>

        <script type="text/javascript">
            ipb.global.lightBoxIsOff();
        </script>

        <div id='inline_login_form' style='display: none'>
            <form action="/index.php?app=core&amp;module=global&amp;section=login&amp;do=process" method="post"
                  id='login'>
                <input type='hidden' name='auth_key' value='880ea6a14ea49e853634fbdc5015a024'/>
                <input type="hidden" name="referer" value="/forum/11-grocery-crud-enterprise/"/>
                <h3>Sign In</h3>

                <br/>
                <div class='ipsForm ipsForm_horizontal'>
                    <fieldset>
                        <ul>
                            <li class='ipsField'>
                                <div class='ipsField_content'>
                                    Need an account? <a
                                        href="/index.php?app=core&amp;module=global&amp;section=register"
                                        title='Register now!'>Register now!</a>
                                </div>
                            </li>
                            <li class='ipsField ipsField_primary'>
                                <label for='ips_username' class='ipsField_title'>Username</label>
                                <div class='ipsField_content'>
                                    <input id='ips_username' type='text' class='input_text' name='ips_username'
                                           size='30'/>
                                </div>
                            </li>
                            <li class='ipsField ipsField_primary'>
                                <label for='ips_password' class='ipsField_title'>Forum Password</label>
                                <div class='ipsField_content'>
                                    <input id='ips_password' type='password' class='input_text' name='ips_password'
                                           size='30'/><br/>
                                    <a href='/index.php?app=core&amp;module=global&amp;section=lostpass'
                                       title='Retrieve password'>I've forgotten my password</a>
                                </div>
                            </li>
                            <li class='ipsField ipsField_checkbox'>
                                <input type='checkbox' id='inline_remember' checked='checked' name='rememberMe'
                                       value='1' class='input_check'/>
                                <div class='ipsField_content'>
                                    <label for='inline_remember'>
                                        <strong>Remember me</strong><br/>
                                        <span class='desc lighter'>This is not recommended for shared computers</span>
                                    </label>
                                </div>
                            </li>

                            <li class='ipsField ipsField_checkbox'>
                                <input type='checkbox' id='inline_invisible' name='anonymous' value='1'
                                       class='input_check'/>
                                <div class='ipsField_content'>
                                    <label for='inline_invisible'>
                                        <strong>Sign in anonymously</strong><br/>
                                        <span class='desc lighter'>Don't add me to the active users list</span>
                                    </label>
                                </div>
                            </li>


                            <li class='ipsPad_top ipsForm_center desc ipsType_smaller'>
                                <a rel="nofollow" href='/privacypolicy/'>Privacy Policy</a>
                            </li>

                        </ul>
                    </fieldset>

                    <div class='ipsForm_submit ipsForm_center'>
                        <input type='submit' class='ipsButton' value='Sign In'/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23493740-5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-23493740-5');
    </script>
</body>
</html>