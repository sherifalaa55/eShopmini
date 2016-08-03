<!DOCTYPE html>
<html ng-app="altairApp" document-events ng-click="onClick($event)" ng-keyup="onKeyUp($event)" ng-class="{ 'page_loading': pageLoading, 'page_loaded': pageLoaded, 'app_initialized': appInitialized && (!$state.is('login') && !$state.includes('error'))}">
<head>
    <meta charset="UTF-8">
    <title page-title ng-bind="page_title"></title>
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

    <!-- uikit  styles -->
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <!-- flag icons -->
    <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">

    <!-- JS -->
        <!-- common functions -->
        <script src="assets/js/common.min.js"></script>

    <!-- ANGULAR -->
        <script src="assets/js/angular_common.min.js"></script>
        <!-- altairApp combined -->
        <!-- <script src="assets/js/altair_app.min.js"></script> -->
        <script src="app/app.js"></script>
        <script src="app/app.factory.js"></script>
        <script src="app/app.service.js"></script>
        <script src="app/app.directive.js"></script>
        <script src="app/app.filters.js"></script>
        <script src="app/app.states.js"></script>
        <script src="app/app.controller.js"></script>
        <script src="app/app.oc_lazy_load.js"></script>

    <!-- main stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css" media="all" id="main_stylesheet">
</head>
<body class="{{main_theme}}" ng-class="{
    'sidebar_main_active': primarySidebarActive && !miniSidebarActive && !topMenuActive && (!$state.is('login') && !$state.includes('error')),
    'sidebar_main_open': primarySidebarOpen && !miniSidebarActive && !topMenuActive && largeScreen && (!$state.is('login') && !$state.includes('error')),
    'sidebar_mini': miniSidebarActive && largeScreen && (!$state.is('login') && !$state.includes('error')),
    'sidebar_main_hiding': primarySidebarHiding,
    'sidebar_secondary_active': secondarySidebarActive && (!$state.is('login') && !$state.includes('error')),
    'top_bar_active': toBarActive && (!$state.is('login') && !$state.includes('error')),
    'page_heading_active': pageHeadingActive && (!$state.is('login') && !$state.includes('error')),
    'header_double_height': headerDoubleHeightActive && (!$state.is('login') && !$state.includes('error')),
    'main_search_active': mainSearchActive && (!$state.is('login') && !$state.includes('error')),
    'header_full': fullHeaderActive && (!$state.is('login') && !$state.includes('error')),
    'boxed_layout': boxedLayoutActive && (!$state.is('login') && !$state.includes('error')),
    'login_page': $state.is('login'),
    'error_page': $state.includes('error'),
    'uk-height-1-1': page_full_height,
    'footer_active': footerActive,
}" content-sidebar>
    <div id="page_preloader" ng-hide="hidePreloader"><img src="assets/img/page_preloader.gif" alt=""/></div>

    <div ui-view="main_header"></div>
    <div ui-view id="main_view" ng-class="{'uk-height-1-1': page_full_height }"></div>
    <div ui-view="main_sidebar" ng-hide="topMenuActive"></div>

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
</body>
</html>
