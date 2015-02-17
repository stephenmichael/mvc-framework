<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Css -->
    <?php Bundle::stylesDefault(); ?>
    <?php Bundle::stylesSite(); ?>
    <?php echo isset($viewData['pageCss']) ? Page::getPageCss($viewData['pageCss']) : ''; ?>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css" />

    <!--[if lt IE 9]><script src='http://html5shiv.googlecode.com/svn/trunk/html5.js'> </script><![endif]-->

	<meta name="google-site-verification" content="" />

    <title><?php echo isset($viewData['pageTitle']) ? Page::getPageTitle($viewData['pageTitle']) : SITE_NAME; ?></title>
    <meta name="description" content="<?php echo isset($viewData['pageDescription']) ? Page::getPageDescription($viewData['pageDescription']) : ''; ?>" />
</head>
<body>
    <header id="site-header" role="banner">
        <div id="site-header-wrapper">
            <div id="site-header-logo">
                <a href="<?php echo BASE_URL; ?>">
                    <h1>
                        <span class="invisible">SITE NAME</span>
                    </h1>
                </a>
            </div><!--/ #site-header-logo -->
            <nav id="site-header-nav" role="navigation">
                <ul>
                    <li>
                        <div id="site-header-search-form" role="search">
                            <form role="form"><input type="text" id="site-header-search-input" /></form>
                        </div>
                    </li>
                    <li<?php echo isset($viewData['pageSection']) && $viewData['pageSection'] == 'Home' ? ' class="active"' : ''; ?>><?php echo Html::actionLink('Home', 'index', 'home'); ?></li>
                    <li<?php echo isset($viewData['pageSection']) && $viewData['pageSection'] == 'Visit' ? ' class="active"' : ''; ?>><?php echo Html::actionLink('Visit', 'index', 'visit'); ?></li>
                    <li<?php echo isset($viewData['pageSection']) && $viewData['pageSection'] == 'About' ? ' class="active"' : ''; ?>><?php echo Html::actionLink('About', 'index', 'about'); ?></li>
                    <li<?php echo isset($viewData['pageSection']) && $viewData['pageSection'] == 'Groups' ? ' class="active"' : ''; ?>><?php echo Html::actionLink('Groups', 'index', 'groups'); ?></li>
                    <li<?php echo isset($viewData['pageSection']) && $viewData['pageSection'] == 'Connect' ? ' class="active"' : ''; ?>><?php echo Html::actionLink('Connect', 'index', 'connect'); ?></li>
                    <li<?php echo isset($viewData['pageSection']) && $viewData['pageSection'] == 'Resources' ? ' class="active"' : ''; ?>><?php echo Html::actionLink('Resources', 'index', 'resources'); ?></li>
                </ul>
            </nav><!--/ #site-header-nav -->
        </div><!--/ #site-header-wrapper -->
    </header><!--/ #site-header -->
    <main id="main" role="main">
        <?php require $pathToViewsFolder . $renderBody . '.php'; ?>
    </main>
    <footer id="site-footer" role="contentinfo">
        <div class="row">
        </div><!--/ .row -->
        
        <div class="row page-content">
            <div class="col text-center">
                <p class="text-copyright">&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.<br /><?php echo Html::actionLink('Terms of Use', 'terms', 'about'); ?> <?php echo Html::actionLink('Privacy Policy', 'privacy', 'about'); ?>
            </div><!--/ .col -->
        </div><!--/ .row -->
    </footer><!--/ #site-footer -->
    
    <!-- Js -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <?php Bundle::scriptsJquery(); ?>
    <?php Bundle::scriptsSite(); ?>
	<?php echo isset($viewData['pageJs']) ? Page::getPageJs($viewData['pageJs']) : ''; ?>
    
	<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
        ga('create', 'UA-XXXXXXX-X', 'auto');
		ga('require', 'linkid', 'linkid.js');
        ga('send', 'pageview');
    </script>
</body>
</html>
