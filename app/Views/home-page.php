<!DOCTYPE html>
<html lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta charset="UTF-8"/>
    <title>grocery CRUD forum</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" href="/favicon.png"/>
    <link rel="image_src" href='https://www.grocerycrud.com/assets/themes/default/images/forums-facebook-image.png'/>



    <style title="Main" media="screen,print">
        /* Inline CSS */

        /* CSS: ipb_help*/
        #help_topics {
            border: 1px solid #c9c9c9
        }

        #help_topics
        li {
            background-image: url(/public/style_images/master/help.png);
            background-repeat: no-repeat;
            background-position: 9px 12px;
            padding: 10px 32px;
            margin-bottom: 2px
        }

        #help_topics li
        h3 {
            padding: 2px 0 0 0
        }

        .help_doc {
            border: 1px solid #c9c9c9
        }

        #help_topics .help_doc ul,
        #help_topics .help_doc
        ol {
            padding: 8px 0
        }

        #help_topics .help_doc
        li {
            background: none;
            padding: 2px
        }

        .help_doc
        .input_submit {
            background: #dfdfdf;
            border: 0 !important;
            color: #000;
            font-weight: bold;
            font-size: inherit;
            padding: 1px 4px;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none
        }

        .help_doc .input_submit:hover {
            color: #000
        }
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


    <link rel="stylesheet" type="text/css" href="/css/main.css"/>


    <style type="text/css">
        /* Inline CSS */

        /* CSS: ipb_search*/

    </style>

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


    <meta name="identifier-url" content="Array"/>


    <meta property="og:url" content="Array"/>


    <link id="ipsCanonical" rel="canonical" href="https://forums.grocerycrud.com/"/>


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
    <!-- ::: TOP BAR: Sign in / register or user drop down and notification alerts ::: -->
    <div id='header_bar' class='clearfix'>
        <div class='main_width'>

            <div id='user_navigation' class='not_logged_in'>

            </div>
        </div>
    </div>
    <!-- ::: BRANDING STRIP: Logo and search box ::: -->
    <div id='branding'>
        <div class='main_width'>

            <?php include_once("sections/header.php"); ?>

            <!-- ::: CONTENT ::: -->


            <div id='board_index' class='ipsLayout ipsLayout_withright ipsLayout_largeright clearfix '>
                <div id='categories' class='ipsLayout_content clearfix'>
                    <!-- CATS AND FORUMS -->


                    <div id='category_3' class='category_block block_wrap'>
                        <h3 class='maintitle'>
                            Support
                        </h3>
                        <div class='ipsBox table_wrap'>
                            <div class='ipsBox_container'>
                                <table class='ipb_table' summary="Forums within the category 'Support'">
                                    <tr class='header hide'>
                                        <th scope='col' class='col_c_icon'>&nbsp;</th>
                                        <th scope='col' class='col_c_forum'>Forum</th>
                                        <th scope='col' class='col_c_stats stats'>Stats</th>
                                        <th scope='col' class='col_c_post'>Last Post Info</th>
                                    </tr>
                                    <!-- / CAT HEADER -->

                                    <tr class=''>
                                        <td class='col_c_icon'>

                                            <img src='/public/style_images/master/f_icon_read.png'/>

                                        </td>
                                        <td class='col_c_forum'>

                                            <h4>

                                                <a href="/forum/11-grocery-crud-enterprise/"
                                                   title='Grocery CRUD Enterprise'>Grocery CRUD Enterprise</a>
                                            </h4>


                                            <p class='desc __forum_desc ipsType_small'>Grocery CRUD Enterprise is the
                                                brand new framework agnostic CRUD. Any question for Grocery CRUD
                                                Enterprise will be answered here.</p>
                                        </td>
                                        <td class='col_c_stats ipsType_small'>
                                            <ul>
                                                <li><strong>302</strong> topics</li>
                                                <li><strong>628</strong> replies</li>
                                            </ul>
                                        </td>
                                        <td class='col_c_post'>
                                                    
    <span class='left'>

<img
    src='https://secure.gravatar.com/avatar/f9d5f7a0d4f28160857b04ea4340a56a?s=100&amp;d=https%3A%2F%2Fforums.grocerycrud.com%2Fpublic%2Fstyle_images%2Fmaster%2Fprofile%2Fdefault_large.png'
    alt='Newbie question about insta... - last post by daveoreardon' class='ipsUserPhoto ipsUserPhoto_mini'
    onerror='this.onerror=null;this.src="http://www.grocerycrud.com/forums/public/style_images/master/profile/default_large.png";'/>

    </span>

                                            <ul class='last_post ipsType_small'>
                                                <li>
                                                    <a href='/topic/139616-newbie-question-about-installing-grocery-crud-for-codeigniter-4/'
                                                       title='Newbie question about installing Grocery CRUD for CodeIgniter 4'>Newbie
                                                        question about insta...</a>
                                                </li>

                                                <li>By daveoreardon</li>


                                                <li class='desc lighter blend_links'><a
                                                        href='/topic/139616-newbie-question-about-installing-grocery-crud-for-codeigniter-4/?view=getlastpost'
                                                        title='View last post'>28 Nov 2021</a></li>

                                            </ul>
                                        </td>
                                    </tr>


                                    <tr class=''>
                                        <td class='col_c_icon'>

                                            <img src='/public/style_images/master/f_icon_read.png'/>

                                        </td>
                                        <td class='col_c_forum'>

                                            <h4>

                                                <a href="/forum/4-bugs-issues/" title='Bugs / Issues'>Bugs / Issues</a>
                                            </h4>


                                            <p class='desc __forum_desc ipsType_small'>Here you can post some Bugs or
                                                Issues that you have by using this library</p>
                                        </td>
                                        <td class='col_c_stats ipsType_small'>
                                            <ul>
                                                <li><strong>797</strong> topics</li>
                                                <li><strong>2,105</strong> replies</li>
                                            </ul>
                                        </td>
                                        <td class='col_c_post'>

                                            <span class='left'>

                                                <img
                                                    src='https://secure.gravatar.com/avatar/7c7949a13ac2be59fd97b9696b6e009a?s=100&amp;d=https%3A%2F%2Fforums.grocerycrud.com%2Fpublic%2Fstyle_images%2Fmaster%2Fprofile%2Fdefault_large.png'
                                                    alt='Try to &#34;CRUD&#34; from... - last post by majd94'
                                                    class='ipsUserPhoto ipsUserPhoto_mini'
                                                    onerror='this.onerror=null;this.src="http://www.grocerycrud.com/forums/public/style_images/master/profile/default_large.png";'/>

                                            </span>

                                            <ul class='last_post ipsType_small'>
                                                <li>
                                                    <a href='/topic/797-try-to-crud-from-a-view/'
                                                       title='Try to &#34;CRUD&#34; from a view'>Try to &#34;CRUD&#34;
                                                        from...</a>
                                                </li>

                                                <li>By majd94
                                                </li>


                                                <li class='desc lighter blend_links'><a
                                                        href='/topic/797-try-to-crud-from-a-view/?view=getlastpost'
                                                        title='View last post'>13 Apr 2021</a></li>

                                            </ul>
                                        </td>
                                    </tr>


                                    <tr class=''>
                                        <td class='col_c_icon'>

                                            <img src='/public/style_images/master/f_icon_read.png'/>

                                        </td>
                                        <td class='col_c_forum'>

                                            <h4>

                                                <a href="/forum/6-i-have-a-question/" title='I have a question'>I have a
                                                    question</a>
                                            </h4>


                                            <p class='desc __forum_desc ipsType_small'>You are not sure for something?
                                                Just ask your questions here</p>
                                        </td>
                                        <td class='col_c_stats ipsType_small'>
                                            <ul>
                                                <li><strong>3,168</strong> topics</li>
                                                <li><strong>7,651</strong> replies</li>
                                            </ul>
                                        </td>
                                        <td class='col_c_post'>

                                            <a href='/user/2875-dwdc/' class='ipsUserPhotoLink left'>

                                                <img
                                                    src='https://secure.gravatar.com/avatar/3e5f09970499d7751938a6cb9f42d695?s=100&amp;d=https%3A%2F%2Fforums.grocerycrud.com%2Fpublic%2Fstyle_images%2Fmaster%2Fprofile%2Fdefault_large.png'
                                                    alt='Confirmation Message on add... - last post by dwdc'
                                                    class='ipsUserPhoto ipsUserPhoto_mini'
                                                    onerror='this.onerror=null;this.src="http://www.grocerycrud.com/forums/public/style_images/master/profile/default_large.png";'/>

                                            </a>

                                            <ul class='last_post ipsType_small'>
                                                <li>
                                                    <a href='/topic/139615-confirmation-message-on-add-action/'
                                                       title='Confirmation Message on add_action ( )'>Confirmation
                                                        Message on add...</a>
                                                </li>

                                                <li>By dwdc
                                                </li>


                                                <li class='desc lighter blend_links'><a
                                                        href='/topic/139615-confirmation-message-on-add-action/?view=getlastpost'
                                                        title='View last post'>13 Aug 2021</a></li>

                                            </ul>
                                        </td>
                                    </tr>


                                    <tr class=''>
                                        <td class='col_c_icon'>

                                            <img src='/public/style_images/master/f_icon_read.png'/>

                                        </td>
                                        <td class='col_c_forum'>

                                            <h4>

                                                <a href="/forum/10-general/" title='General'>General</a>
                                            </h4>


                                            <p class='desc __forum_desc ipsType_small'>Discuss anything not related to
                                                grocery CRUD here. You can ask questions about Codeignter, PHP, J&#097;v&#097;script
                                                or anything else you like.</p>
                                        </td>
                                        <td class='col_c_stats ipsType_small'>
                                            <ul>
                                                <li><strong>171</strong> topics</li>
                                                <li><strong>460</strong> replies</li>
                                            </ul>
                                        </td>
                                        <td class='col_c_post'>

                                            <a href='/user/7789-joeybing/' class='ipsUserPhotoLink left'>

                                                <img
                                                    src='https://secure.gravatar.com/avatar/0a67f77001ecb7fc0a20bde6af80ceba?s=100&amp;d=https%3A%2F%2Fforums.grocerycrud.com%2Fpublic%2Fstyle_images%2Fmaster%2Fprofile%2Fdefault_large.png'
                                                    alt='image crud. Are there any i... - last post by joeybing'
                                                    class='ipsUserPhoto ipsUserPhoto_mini'
                                                    onerror='this.onerror=null;this.src="http://www.grocerycrud.com/forums/public/style_images/master/profile/default_large.png";'/>

                                            </a>

                                            <ul class='last_post ipsType_small'>
                                                <li>
                                                    <a href='/topic/139438-image-crud-are-there-any-install-instructs/'
                                                       title='image crud. Are there any install instructs?'>image crud.
                                                        Are there any i...</a>
                                                </li>

                                                <li>By
                                                    joeybing
                                                </li>


                                                <li class='desc lighter blend_links'><a
                                                        href='/topic/139438-image-crud-are-there-any-install-instructs/?view=getlastpost'
                                                        title='View last post'>19 Apr 2021</a></li>

                                            </ul>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <br/>
                    </div>


                    <div id='category_7' class='category_block block_wrap'>
                        <h3 class='maintitle'>
                            Development
                        </h3>
                        <div class='ipsBox table_wrap'>
                            <div class='ipsBox_container'>
                                <table class='ipb_table' summary="Forums within the category 'Development'">
                                    <tr class='header hide'>
                                        <th scope='col' class='col_c_icon'>&nbsp;</th>
                                        <th scope='col' class='col_c_forum'>Forum</th>
                                        <th scope='col' class='col_c_stats stats'>Stats</th>
                                        <th scope='col' class='col_c_post'>Last Post Info</th>
                                    </tr>
                                    <!-- / CAT HEADER -->

                                    <tr class=''>
                                        <td class='col_c_icon'>

                                            <img src='/public/style_images/master/f_icon_read.png'/>

                                        </td>
                                        <td class='col_c_forum'>

                                            <h4>

                                                <a href="/forum/8-extra-coding-plugins/" title='Extra coding / Plugins'>Extra
                                                    coding / Plugins</a>
                                            </h4>


                                            <p class='desc __forum_desc ipsType_small'>Do you want to share some code
                                                with the community? This is the right place to do it. </p>
                                        </td>
                                        <td class='col_c_stats ipsType_small'>
                                            <ul>
                                                <li><strong>185</strong> topics</li>
                                                <li><strong>1,202</strong> replies</li>
                                            </ul>
                                        </td>
                                        <td class='col_c_post'>

                                            <a href='/user/6010-daniilmedved/' class='ipsUserPhotoLink left'>

                                                <img
                                                    src='https://secure.gravatar.com/avatar/428190ece2c80a4351ac4b52cd999ea7?s=100&amp;d=https%3A%2F%2Fforums.grocerycrud.com%2Fpublic%2Fstyle_images%2Fmaster%2Fprofile%2Fdefault_large.png'
                                                    alt='How to pass extra data on a... - last post by daniilmedved'
                                                    class='ipsUserPhoto ipsUserPhoto_mini'
                                                    onerror='this.onerror=null;this.src="http://www.grocerycrud.com/forums/public/style_images/master/profile/default_large.png";'/>

                                            </a>

                                            <ul class='last_post ipsType_small'>
                                                <li>
                                                    <a href='/topic/1065-how-to-pass-extra-data-on-a-grocery-crud-view/'
                                                       title='How to pass extra data on a grocery crud view'>How to pass
                                                        extra data on a...</a>
                                                </li>

                                                <li>By daniilmedved</li>


                                                <li class='desc lighter blend_links'><a
                                                        href='/topic/1065-how-to-pass-extra-data-on-a-grocery-crud-view/?view=getlastpost'
                                                        title='View last post'>22 Dec 2021</a></li>

                                            </ul>
                                        </td>
                                    </tr>


                                    <tr class=''>
                                        <td class='col_c_icon'>

                                            <img src='/public/style_images/master/f_icon_read.png'/>

                                        </td>
                                        <td class='col_c_forum'>

                                            <h4>

                                                <a href="/forum/9-how-to-and-faqs/" title='How to and FAQs'>How to and
                                                    FAQs</a>
                                            </h4>


                                            <p class='desc __forum_desc ipsType_small'>Here you can see the most common
                                                requests organized in one single category.</p>
                                        </td>
                                        <td class='col_c_stats ipsType_small'>
                                            <ul>
                                                <li><strong>25</strong> topics</li>
                                                <li><strong>259</strong> replies</li>
                                            </ul>
                                        </td>
                                        <td class='col_c_post'>

                                            <a href='/user/7183-dmanolias/' class='ipsUserPhotoLink left'>

                                                <img
                                                    src='https://secure.gravatar.com/avatar/77e783326660723929f626400fc8ac2c?s=100&amp;d=https%3A%2F%2Fforums.grocerycrud.com%2Fpublic%2Fstyle_images%2Fmaster%2Fprofile%2Fdefault_large.png'
                                                    alt='[ANSWERED] set_relation and... - last post by dmanolias'
                                                    class='ipsUserPhoto ipsUserPhoto_mini'
                                                    onerror='this.onerror=null;this.src="http://www.grocerycrud.com/forums/public/style_images/master/profile/default_large.png";'/>

                                            </a>

                                            <ul class='last_post ipsType_small'>
                                                <li>
                                                    <a href='/topic/364-answered-set-relation-and-add-new-button-to-quick-insert/'
                                                       title='[ANSWERED] set_relation and &#34;Add New&#34; button to quick insert.'>[ANSWERED]
                                                        set_relation and...</a>
                                                </li>

                                                <li>By dmanolias</li>


                                                <li class='desc lighter blend_links'><a
                                                        href='/topic/364-answered-set-relation-and-add-new-button-to-quick-insert/?view=getlastpost'
                                                        title='View last post'>11 Nov 2020</a></li>

                                            </ul>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <br/>
                    </div>


                </div>
            </div>

            <div id='board_stats'>
                <ul class='ipsType_small ipsList_inline'>
                    <li class='clear'>
                        <span class='value'>16,967</span>
                        Total Posts
                    </li>
                    <li class='clear'>
                        <span class='value'>5,748</span>
                        Total Members
                    </li>
                </ul>
            </div>

        </div>
        <!-- ::: FOOTER (Change skin, language, mark as read, etc) ::: -->
        <div id='footer_utilities' class='main_width clearfix clear'>

        </div>



        <?php include('sections/google-analytics.php'); ?>
</body>
</html>
