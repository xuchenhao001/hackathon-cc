<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Peanut</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- css -->
    <link href="/Public/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/Public/css/style.css" rel="stylesheet">
    <!-- skin color -->
    <link href="/Public/color/default.css" rel="stylesheet">
    <!--[if lt IE 7]>
    <link href="/Public/css/font-awesome-ie7.css" type="text/css" rel="stylesheet">
    <![endif]-->

    <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
<!-- navbar -->
<div class="navbar-wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <!-- Responsive navbar -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                        class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </a>
                <!--<h1 class="brand"><a href="/" tppabs="#">NUTS.COM</a></h1>-->
                <h1 class="brand"><img href="/" src="/Public/img/logomini.png" tppabs="#"/></h1>
                <!-- navigation -->
                <nav class="pull-right nav-collapse collapse">
                    <ul id="menu-main" class="nav">
                        <li><a title="services" href="#services">Services</a></li>
                        <li><a title="team" href="#about">About</a></li>
                        <li><a href="/home/index/jumpToRegister">Register</a></li>


                    </ul>


                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header area -->
<div id="header-wrapper" class="header-slider">
    <header class="clearfix">
        <div class="logo">
            <img src="/Public/img/logo.png" alt=""/>
        </div>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div id="main-flexslider" class="flexslider">
                        <ul class="slides">
                            <li>
                                <p class="home-slide-content">
                                    <strong>innovation</strong> and service
                                </p>
                            </li>
                            <li>
                                <p class="home-slide-content">
                                    Based on <strong>blockchain</strong>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!-- end slider -->
                </div>
            </div>
        </div>
    </header>
</div>

<!-- end spacer section -->
<!-- section: services -->
<section id="services" class="section orange">
    <div class="container">
        <h4>Services</h4>
        <!-- Four columns -->
        <div class="row">
            <div class="span3 animated-fast flyIn">
                <div class="service-box">
                    <img src="/Public/img/icons/insurance.png" alt="" onclick="jumpToInsurance()"/>
                    <h2>Insurance Company</h2>

                </div>
            </div>
            <div class="span3 animated flyIn">
                <div class="service-box">
                    <img src="/Public/img/icons/owner.png" alt="" onclick="jumpToCustomer()"/>
                    <h2>Driver</h2>
                </div>
            </div>
            <div class="span3 animated-fast flyIn">
                <div class="service-box">
                    <img src="/Public/img/icons/fixer.png" alt="" onclick="jumpToGarage()"/>
                    <h2>Garage</h2>
                </div>
            </div>
            <div class="span3 animated flyIn">
                <div class="service-box">
                    <img src="/Public/img/icons/traffic.png" alt="" onclick="jumpToTraffic()"/>
                    <h2>Traffic Control Department</h2>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- end section: team -->
<!-- section: team -->
<section id="about" class="section">
    <div class="container">
        <h4>Who We Are</h4>
        <div class="row">
            <div class="span4 offset1">
                <div>
                    <h2>We come from <strong>BIT</strong></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span2 offset1 flyIn">
                <div class="people">
                    <img class="team-thumb img-circle" src="/Public/img/team/img-1.jpg" alt=""/>
                    <h3>Haiying Che</h3>
                    <p>
                        Team Leader
                    </p>
                </div>
            </div>
            <div class="span2 flyIn">
                <div class="people">
                    <img class="team-thumb img-circle" src="/Public/img/team/img-2.jpg" alt=""/>
                    <h3>Krid</h3>
                    <p>
                        blockchain developer
                    </p>
                </div>
            </div>
            <div class="span2 flyIn">
                <div class="people">
                    <img class="team-thumb img-circle" src="/Public/img/team/img-3.jpg" alt=""/>
                    <h3>Eric</h3>
                    <p>
                        blockchain developer
                    </p>
                </div>
            </div>
            <div class="span2 flyIn">
                <div class="people">
                    <img class="team-thumb img-circle" src="/Public/img/team/img-4.jpg" alt=""/>
                    <h3>Tony</h3>
                    <p>
                        UI designer
                    </p>
                </div>
            </div>
            <div class="span2 flyIn">
                <div class="people">
                    <img class="team-thumb img-circle" src="/Public/img/team/img-5.jpg" alt=""/>
                    <h3>Kens</h3>
                    <p>
                        PHP designer
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- end section: team -->
</footer>
<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
<script src="http://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
<!-- nav -->
<script src="/Public/js/jquery.scrollTo.js"></script>
<script src="/Public/js/jquery.nav.js"></script>
<!-- localScroll -->
<script src="/Public/js/jquery.localscroll-1.2.7-min.js"></script>
<!-- bootstrap -->
<script src="/Public/js/bootstrap.js"></script>
<!-- prettyPhoto -->
<script src="/Public/js/jquery.prettyPhoto.js"></script>
<!-- Works scripts -->
<script src="/Public/js/isotope.js"></script>
<!-- flexslider -->
<script src="/Public/js/jquery.flexslider.js"></script>
<!-- inview -->
<script src="/Public/js/inview.js"></script>
<!-- animation -->
<script src="/Public/js/animate.js"></script>
<!-- twitter -->
<script src="/Public/js/jquery.tweet.js"></script>
<!-- contact form -->
<script src="/Public/js/validate.js"></script>
<!-- custom functions -->
<script src="/Public/js/custom.js"></script>
<script src="/Public/js/jquery.cookie.js"></script>

<script>
    function setTypeInsurance() {
        $.cookie('type', "insurance");
        window.location.href = '/home/index/jumpToLogin';
    }

    function setTypeCustomer() {
        $.cookie('type', "customer");
        window.location.href = '/home/index/jumpToLogin';
    }

    function setTypeTraffic() {
        $.cookie('type', "traffic");
        window.location.href = '/home/index/jumpToLogin';
    }

    function setTypeGarage() {
        $.cookie('type', "garage");
        window.location.href = '/home/index/jumpToLogin';
    }


    function jumpToInsurance() {
        location.href = "/home/index/jumpToInsurance";
    }
    function jumpToCustomer() {
        location.href = "/home/index/jumpToCustomer";
    }
    function jumpToTraffic() {
        location.href = "/home/TrafficeDepart/index";
    }
    function jumpToGarage() {
        location.href = "/home/index/jumpToGarage";
    }


</script>

</body>
</html>