<?php
/** @var array $topics */
/** @var array $paginationData */
?><!DOCTYPE html>
<html lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta charset="UTF-8"/>
    <title>Grocery CRUD Enterprise - grocery CRUD forum</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" href="/assets/themes/default/images/favicon.png"/>
    <link rel="image_src" href='https://www.grocerycrud.com/assets/themes/default/images/forums-facebook-image.png'/>



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



    <link id="ipsCanonical" rel="canonical" href="/forum/11-grocery-crud-enterprise/"/>


    <link rel='next'
          href='/forum/11-grocery-crud-enterprise/page-2?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all'/>


    <link rel='last'
          href='/forum/11-grocery-crud-enterprise/page-11?prune_day=100&sort_by=Z-A&sort_key=last_post&topicfilter=all'/>


    <link rel='up' href='/forum/3-support/'/>


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




            <h1 class='ipsType_pagetitle'><?php echo $forum['name']; ?></h1>
            <div class='ipsType_pagedesc forum_rules'>

                <?php echo $forum['description']; ?>

            </div>
            <br/>

            <!-- __-SUBFORUMS-__ -->

            <?php include(__DIR__ . '/sections/pagination.php'); ?>


            <div class='ipsFilterbar maintitle'>


            </div>

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
                        <tr itemscope itemtype="http://schema.org/Article" class='__topic  expandable' id='trow_<?php echo $topic->tid; ?>'
                            data-tid="<?php echo $topic->tid; ?>">
                            <td class='col_f_icon altrow short'>


                            </td>
                            <td class='col_f_content '>
                                <h4>

                                    <a itemprop="url" id="tid-link-<?php echo $topic->tid; ?>"
                                       href="/topic/<?php echo $topic->tid; ?>-<?php echo $topic->title_seo; ?>/"
                                       title='Newbie question about installing Grocery CRUD for CodeIgniter 4 - started  28 November 2021 - 02:29 AM'
                                       class='topic_title'>
                                        <?php if ($topic->pinned === "1") { ?>
                                            <span class="ipsBadge ipsBadge_green">Pinned</span>&nbsp;
                                        <?php } ?>
                                        <span itemprop="name"><?php echo($topic->title);?></a>
                                </h4>
                                <br/>
                                <span class='desc lighter blend_links'>
                                    Started by <span class="fn name"><span itemprop="name"><?php echo $topic->starter_name; ?></span></span>,
                                    <span itemprop="dateCreated"><?php echo $topic->start_date; ?></span>
		                        </span>

                            </td>
                            <td class='col_f_preview __topic_preview'>

                                <a href='/topic/<?php echo $topic->tid; ?>-newbie-question-about-installing-grocery-crud-for-codeigniter-4/'
                                   class='expander closed' title='Preview this topic'>&nbsp;</a>

                            </td>
                            <td class='col_f_views desc blend_links'>
                                <ul>
                                    <li>
                                        <?php if ((int)$topic->posts > 10) { ?>
                                            <span class="ipsBadge ipsBadge_orange">Hot</span>&nbsp;
                                        <?php } ?>
                                        <?php echo number_format($topic->posts); ?> replies
                                        <meta itemprop="interactionCount" content="UserComments:0"/>
                                    </li>
                                    <li class='views desc'><?php echo number_format($topic->views); ?> views</li>
                                </ul>
                            </td>
                            <td class="col_f_post">

                                <span class="ipsUserPhotoLink left">
                                    <?php if ($topic->pp_thumb_photo) {
                                        if (strstr($topic->pp_thumb_photo, 'http')) { ?>
                                            <img src="<?php echo $topic->pp_thumb_photo; ?>" alt="profile picture" class="ipsUserPhoto ipsUserPhoto_mini">
                                        <?php
                                        } else { ?>
                                            <img src="/uploads/<?php echo $topic->pp_thumb_photo; ?>" alt="profile picture" class="ipsUserPhoto ipsUserPhoto_mini">
                                    <?php
                                        }
                                    } else { ?>
                                        <img src="/public/style_images/master/profile/default_large.png" alt="profile picture" class="ipsUserPhoto ipsUserPhoto_mini">
                                    <?php } ?>
                                </span>

                                <ul class="last_post ipsType_small">
                                    <li><em><span class="fn name  ___hover___member _hoversetup" title="" id="anonymous_element_6"><span itemprop="name"><?php echo $topic->starter_name; ?></span></em></li>
                                    <li>
                                            <?php echo $topic->start_date; ?>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <?php } ?>

                    </table>



                </div>
            </div>

            <br/>

            <br class='clear'/>
            <div id='forum_footer' class='statistics clear clearfix'>

            </div>
            <br class='clear'/>

            <select style='display:none' id='multiModOptions'>

            </select>
        </div>
        <!-- ::: FOOTER (Change skin, language, mark as read, etc) ::: -->
        <div id='footer_utilities' class='main_width clearfix clear'>


        </div>

        <div><img src='/index.php?app=core&amp;module=task' alt='' style='border: 0px;height:1px;width:1px;'/></div>



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
    <?php include('sections/google-analytics.php'); ?>
</body>
</html>