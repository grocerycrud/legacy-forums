<?php
/* @var array $forum */
?><div id='logo'>

    <a href='/' title='Go to community index' rel="home" accesskey='1'><img
            src='/public/style_images/18_grocery-crud-logo.png'
            alt='Logo'/></a>

</div>

<?php if ($_ENV['SHOW_ADS']) { ?>
<!-- AdPacks.com Zone Code -->
<div style="float:right;width:300px;margin-top:-21px;margin-right:-8px;margin-left:10px;">

    <div class="ads">
        <script
            async
            type="text/javascript"
            src="//cdn.carbonads.com/carbon.js?zoneid=1673&serve=C6AILKT&placement=wwwgrocerycrudcom"
            id="_carbonads_js"
            onerror="setTimeout(function () { adblock_detected() }, 1000);"></script>
    </div>
    <div id="adblock-detected"
         style="background: white;margin-top: 5px; border-radius: 10px 10px 0px 0px; padding-bottom: 10px;display: none">
        <div
            style="float:left; padding-top: 5px; padding-left: 5px; background: #f9f9f9; border-radius: 10px 0px 0px 0px">
            <a target="_blank" href="/bootstrap-theme/">
                                <span class="bsa_it_i">
                                    <img height="100" width="130" alt=""
                                         src="https://www.grocerycrud.com/v1.x/assets/uploads/general/bootstrap-theme-ad.png">
                                </span>
            </a>
        </div>
        <div
            style="float:left; margin-left: 10px;width: 140px; font-size: 12px; font-weight: bold; padding-top: 10px">
            <p>
                <a target="_blank" href="https://www.grocerycrud.com/bootstrap-theme/"
                   style="text-decoration: none">
                                <span class="bsa_it_d">
                                    Bootstrap Theme<br/><br/>Simply the best theme for Grocery CRUD!
                                </span>
                </a>
            </p><br/><br/>
            <p style='text-align:right'>
                <a target="_blank" href="https://www.grocerycrud.com/bootstrap-theme/">View More &raquo;
                </a>
            </p>

        </div>
        <div style="clear: both"></div>
    </div>
    <!-- End AdPacks.com Zone Code -->
    <?php } ?>
</div>
</div>
<!-- ::: APPLICATION TABS ::: -->
<div id='primary_nav' class='clearfix'>
    <div class='main_width'>

    </div>
</div>

<!-- ::: MAIN CONTENT AREA ::: -->
<div id='content' class='clearfix'>
    <!-- ::: NAVIGATION BREADCRUMBS ::: -->

    <?php if (!empty($forum)) { ?>
    <div id='secondary_navigation' class='clearfix'>
        <ol class='breadcrumb top ipsList_inline left'>
            <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href='/' itemprop="url">
                    <span itemprop="title">grocery CRUD forum</span>
                </a>
                <span class="nav_sep">&rarr;</span>
            </li>
                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a href='/forum/<?php echo $forum['id']; ?>-<?php echo $forum['name_seo']; ?>' itemprop="url">
                        <span itemprop="title"><?php echo $forum['name']; ?></span>
                    </a>
                </li>
        </ol>
    </div>
    <?php } ?>
    <br/>

    <noscript>
        <div class='message error'>
            <strong>Javascript Disabled Detected</strong>
            <p>You currently have javascript disabled. Several functions may not work. Please re-enable
                javascript to access full functionality.</p>
        </div>
        <br/>
    </noscript>