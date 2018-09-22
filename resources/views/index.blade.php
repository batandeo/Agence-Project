<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Pages - Admin Dashboard UI Kit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />



    <link href="{{URL::asset('assets/css/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/css/jquery.scrollbar.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL::asset('assets/css/select2.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL::asset('assets/css/switchery.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL::asset('assets/css/nv.d3.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL::asset('assets/css/mapplic.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/rickshaw.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/css/datepicker3.css')}}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{URL::asset('assets/MetroJs.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL::asset('w<wassets/css/pages-icons.css')}}" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
    <link href="assets/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!--[if lt IE 9]>
    <link href="assets/css/mapplic-ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript">
        window.onload = function()
        {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
        }
    </script>
</head>
<body class="fixed-header  dashboard ">
<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-40"><img src="assets/img/demo/social_app.svg" alt="socail">
                </a>
            </div>
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-10"><img src="assets/img/demo/email_app.svg" alt="socail">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-40"><img src="assets/img/demo/calendar_app.svg" alt="socail">
                </a>
            </div>
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-10"><img src="assets/img/demo/add_more.svg" alt="socail">
                </a>
            </div>
        </div>
    </div>
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="assets/img/logo_white.png" data-src-retina="assets/img/logo_white_2x.png" width="78" height="22">
        <div class="sidebar-header-controls">
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
            </button>
            <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
            <li class="">
                <a href="javascript:;">
                    <span class="title">Forms</span>
                    <span class="arrow
             "></span>
                </a>
                <span class="icon-thumbnail"><i class="pg-form"></i></span>
                <ul class="sub-menu">
                    <li class="">
                        <a href="form_elements.html">Form Elements</a>
                        <span class="icon-thumbnail">fe</span>
                    </li>
                    <li class="">
                        <a href="form_layouts.html">Form Layouts</a>
                        <span class="icon-thumbnail">fl</span>
                    </li>
                    <li class="">
                        <a href="form_wizard.html">Form Wizard</a>
                        <span class="icon-thumbnail">fw</span>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;"><span class="title">Tables</span>
                    <span class=" arrow"></span></a>
                <span class="icon-thumbnail"><i class="pg-tables"></i></span>
                <ul class="sub-menu">
                    <li class="">
                        <a href="tables.html">Basic Tables</a>
                        <span class="icon-thumbnail">bt</span>
                    </li>
                    <li class="">
                        <a href="datatables.html">Data Tables</a>
                        <span class="icon-thumbnail">dt</span>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
<!-- END SIDEBPANEL-->
<!-- START PAGE-CONTAINER -->
<div class="page-container">
    <!-- START HEADER -->
    <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <!-- LEFT SIDE -->
        <div class="pull-left full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="sm-action-bar">
                <a href="#" class="btn-link toggle-sidebar" data-toggle="sidebar">
                    <span class="icon-set menu-hambuger"></span>
                </a>
            </div>
            <!-- END ACTION BAR -->
        </div>
        <!-- RIGHT SIDE -->
        <div class="pull-right full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="sm-action-bar">
                <a href="#" class="btn-link" data-toggle="quickview" data-toggle-element="#quickview">
                    <span class="icon-set menu-hambuger-plus"></span>
                </a>
            </div>
            <!-- END ACTION BAR -->
        </div>
        <!-- END MOBILE CONTROLS -->

        <div class=" pull-right">
            <div class="header-inner">
                <a href="#" class="btn-link icon-set menu-hambuger-plus m-l-20 sm-no-margin hidden-sm hidden-xs" data-toggle="quickview" data-toggle-element="#quickview"></a>
            </div>
        </div>
        <div class=" pull-right">
            <!-- START User Info-->
            <div class="visible-lg visible-md m-t-10">
                <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
                    <span class="semi-bold">David</span> <span class="text-master">Nest</span>
                </div>
                <div class="dropdown pull-right">
                    <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="assets/img/profiles/avatar.jpg" alt="" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
            </span>
                    </button>
                    <ul class="dropdown-menu profile-dropdown" role="menu">
                        <li><a href="#"><i class="pg-settings_small"></i> Settings</a>
                        </li>
                        <li><a href="#"><i class="pg-outdent"></i> Feedback</a>
                        </li>
                        <li><a href="#"><i class="pg-signals"></i> Help</a>
                        </li>
                        <li class="bg-master-lighter">
                            <a href="#" class="clearfix">
                                <span class="pull-left">Logout</span>
                                <span class="pull-right"><i class="pg-power"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END User Info-->
        </div>
    </div>
    <!-- END HEADER -->
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content sm-gutter">
            <!-- START CONTAINER FLUID -->
            <div class="container-fluid padding-25 sm-padding-10">
                <!-- START ROW -->
                <div class="row">
                    <div class="col-md-6 col-xlg-5">
                        <div class="row">
                            <div class="col-md-12 m-b-10">
                                <div class="ar-3-2 widget-1-wrapper">
                                    <!-- START WIDGET -->

                                    <!-- END WIDGET -->
                                </div>
                            </div>
                        </div>

                        <!-- END CONTAINER FLUID -->
                    </div>
                    <!-- END PAGE CONTENT -->
                    <!-- START COPYRIGHT -->
                    <!-- START CONTAINER FLUID -->
                    <div class="container-fluid container-fixed-lg footer">
                        <div class="copyright sm-text-center">
                            <p class="small no-margin pull-left sm-pull-reset">
                                <span class="hint-text">Copyright © 2016 </span>
                                <span class="font-montserrat">BATANDEO Baoura</span>.
                                <span class="hint-text">All rights reserved. </span>
                                <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
                            </p>
                            <p class="small no-margin pull-right sm-pull-reset">
                                <a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- END COPYRIGHT -->
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>

            <!-- START OVERLAY -->
            <div class="overlay hide" data-pages="search">
                <!-- BEGIN Overlay Content !-->
                <div class="overlay-content has-results m-t-20">
                    <!-- BEGIN Overlay Header !-->
                    <div class="container-fluid">
                        <!-- BEGIN Overlay Logo !-->
                        <img class="overlay-brand" src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
                        <!-- END Overlay Logo !-->
                        <!-- BEGIN Overlay Close !-->
                        <a href="#" class="close-icon-light overlay-close text-black fs-16">
                            <i class="pg-close"></i>
                        </a>
                        <!-- END Overlay Close !-->
                    </div>
                    <!-- END Overlay Header !-->
                    <div class="container-fluid">
                        <!-- BEGIN Overlay Controls !-->
                        <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
                        <br>
                        <div class="inline-block">
                            <div class="checkbox right">
                                <input id="checkboxn" type="checkbox" value="1" checked="checked">
                                <label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
                            </div>
                        </div>
                        <div class="inline-block m-l-10">
                            <p class="fs-13">Press enter to search</p>
                        </div>
                        <!-- END Overlay Controls !-->
                    </div>
                    <!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
                    <div class="container-fluid">
          <span>
                <strong>suggestions :</strong>
            </span>
                        <span id="overlay-suggestions"></span>
                        <br>
                        <div class="search-results m-t-40">
                            <p class="bold">Pages Search Results</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- BEGIN Search Result Item !-->
                                    <div class="">
                                        <!-- BEGIN Search Result Item Thumbnail !-->
                                        <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                            <div>
                                                <img width="50" height="50" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
                                            </div>
                                        </div>
                                        <!-- END Search Result Item Thumbnail !-->
                                        <div class="p-l-10 inline p-t-5">
                                            <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>
                                            <p class="hint-text">via john smith</p>
                                        </div>
                                    </div>
                                    <!-- END Search Result Item !-->
                                    <!-- BEGIN Search Result Item !-->
                                    <div class="">
                                        <!-- BEGIN Search Result Item Thumbnail !-->
                                        <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                            <div>T</div>
                                        </div>
                                        <!-- END Search Result Item Thumbnail !-->
                                        <div class="p-l-10 inline p-t-5">
                                            <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related topics</h5>
                                            <p class="hint-text">via pages</p>
                                        </div>
                                    </div>
                                    <!-- END Search Result Item !-->
                                    <!-- BEGIN Search Result Item !-->
                                    <div class="">
                                        <!-- BEGIN Search Result Item Thumbnail !-->
                                        <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                            <div><i class="fa fa-headphones large-text "></i>
                                            </div>
                                        </div>
                                        <!-- END Search Result Item Thumbnail !-->
                                        <div class="p-l-10 inline p-t-5">
                                            <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>
                                            <p class="hint-text">via pagesmix</p>
                                        </div>
                                    </div>
                                    <!-- END Search Result Item !-->
                                </div>
                                <div class="col-md-6">
                                    <!-- BEGIN Search Result Item !-->
                                    <div class="">
                                        <!-- BEGIN Search Result Item Thumbnail !-->
                                        <div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
                                            <div><i class="fa fa-facebook large-text "></i>
                                            </div>
                                        </div>
                                        <!-- END Search Result Item Thumbnail !-->
                                        <div class="p-l-10 inline p-t-5">
                                            <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook</h5>
                                            <p class="hint-text">via facebook</p>
                                        </div>
                                    </div>
                                    <!-- END Search Result Item !-->
                                    <!-- BEGIN Search Result Item !-->
                                    <div class="">
                                        <!-- BEGIN Search Result Item Thumbnail !-->
                                        <div class="thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">
                                            <div><i class="fa fa-twitter large-text "></i>
                                            </div>
                                        </div>
                                        <!-- END Search Result Item Thumbnail !-->
                                        <div class="p-l-10 inline p-t-5">
                                            <h5 class="m-b-5">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
                                            <p class="hint-text">via twitter</p>
                                        </div>
                                    </div>
                                    <!-- END Search Result Item !-->
                                    <!-- BEGIN Search Result Item !-->
                                    <div class="">
                                        <!-- BEGIN Search Result Item Thumbnail !-->
                                        <div class="thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">
                                            <div><i class="fa fa-google-plus large-text "></i>
                                            </div>
                                        </div>
                                        <!-- END Search Result Item Thumbnail !-->
                                        <div class="p-l-10 inline p-t-5">
                                            <h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
                                            <p class="hint-text">via google plus</p>
                                        </div>
                                    </div>
                                    <!-- END Search Result Item !-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Overlay Search Results !-->
                </div>
                <!-- END Overlay Content !-->
            </div>
            <!-- END OVERLAY -->
            <!-- BEGIN VENDOR JS -->
            <script src="{{URL::asset('assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/jquery/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/modernizr.custom.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/boostrapv3/js/bootstrap.min.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/jquery/jquery-easy.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/jquery-unveil/jquery.unveil.min.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/jquery-bez/jquery.bez.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/jquery-actual/jquery.actual.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/plugins/bootstrap-select2/select2.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/plugins/classie/classie.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/switchery/js/switchery.min.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/nvd3/lib/d3.v3.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/nvd3/nv.d3.min.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/nvd3/src/utils.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/nvd3/src/tooltip.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/nvd3/src/interactiveLayer.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/nvd3/src/models/axis.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/nvd3/src/models/line.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/nvd3/src/models/lineWithFocusChart.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/mapplic/js/hammer.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/mapplic/js/jquery.mousewheel.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/mapplic/js/mapplic.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/rickshaw/rickshaw.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/jquery-metrojs/MetroJs.min.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('assets/plugins/skycons/skycons.js" type="text/javascript')}}"></script>
            <script src="{{URL::asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
            <!-- END VENDOR JS -->
            <!-- BEGIN CORE TEMPLATE JS -->
            <script src="pages/js/pages.min.js"></script>
            <!-- END CORE TEMPLATE JS -->
            <!-- BEGIN PAGE LEVEL JS -->
            <script src="assets/js/dashboard.js" type="text/javascript"></script>
            <script src="assets/js/scripts.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL JS -->
</body>
</html>