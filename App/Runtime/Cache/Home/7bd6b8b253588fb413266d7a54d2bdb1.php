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

    <!-- skin color -->
    <link href="/Public/color/default.css" rel="stylesheet">
    <!--[if lt IE 7]>
    <link href="/Public/css/font-awesome-ie7.css" type="text/css" rel="stylesheet">
    <![endif]-->

    <link rel="shortcut icon" href="/Public/img/favicon.ico">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />



    <link href="/Public/css/style.css" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/16.2.5/css/dx.spa.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/16.2.5/css/dx.common.css" />
    <link rel="dx-theme" data-theme="generic.light" href="https://cdn3.devexpress.com/jslib/16.2.5/css/dx.light.css" />

</head>
<body>
<!-- navbar -->


<div class="navbar-wrapper" style="position: static;margin-top: 70px">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <!-- Responsive navbar -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </a>
                <h1 class="brand"><img href="/"  src="/Public/img/logomini.png" tppabs="#" /></h1>
                <!-- navigation -->
                <nav class="pull-right nav-collapse collapse">
                    <ul id="menu-main" class="nav">
                        <li><a href="/home/index/returnHome">Return</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--展示主要的界面-->



<div class="container-fluid">
    <div class="row-fluid">


        <div class="span12">

            <div class="dx-fieldset-header" style="margin-left: 20px;margin-top: 20px">Base Information</div>
            <div class="row-fluid">

                <div class="span4">



                    <div class="demo-container" style="margin-top: 20px">
                        <div class="form" >
                            <div class="dx-fieldset" >

                                <div class="dx-field">
                                    <div class="dx-field-label">Full Name</div>
                                    <div class="dx-field-value-static"><?php echo ($baseinfo["Fullname"]); ?></div>

                                    <div class="dx-field-label">Factory</div>
                                    <div class="dx-field-value-static"><?php echo ($baseinfo["Factory"]); ?></div>


                                    <div class="dx-field-label">Position</div>
                                    <div class="dx-field-value-static"><?php echo ($baseinfo["Position"]); ?></div>


                                    <div class="dx-field-label">VIN</div>
                                    <div class="dx-field-value-static"><?php echo ($baseinfo["VIN"]); ?></div>
                                </div>


                            </div>


                        </div>


                    </div>

                </div>
                <div class="span4">
                    <div class="demo-container" style="margin-top: 20px">
                        <div class="form" >
                            <div class="dx-fieldset" >

                                <div class="dx-field">
                                    <div class="dx-field-label">DriverCard</div>
                                    <div class="dx-field-value-static"><?php echo ($baseinfo["DriverCard"]); ?></div>

                                    <div class="dx-field-label">CarType</div>
                                    <div class="dx-field-value-static"><?php echo ($baseinfo["CarType"]); ?></div>

                                  <!--  <div class="dx-field-label">UsingNature</div>
                                    <div class="dx-field-value-static"><?php echo ($baseifo["UsingNature"]); ?></div>-->


                                </div>

                            </div>


                        </div>


                    </div>

                </div>
                <div class="span4">
                    <div class="demo-container" style="margin-top: 20px">
                        <div class="form" >
                            <div class="dx-fieldset" >

                                <div class="dx-field">

                                </div>


                            </div>


                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<div style="margin: 20px">


    <!--保险记录-->

    <div class="demo-container" style="margin-top: 20px">
        <div class="dx-fieldset dx-fieldset-header" style="margin-left: 20px"> Accident Records</div>
        <div id="Insurance"></div>
    </div>


    <!--维修记录-->

    <div class="demo-container" style="margin-top: 20px" >
        <div class="dx-fieldset dx-fieldset-header" style="margin-left: 20px"> Repairation Records</div>
        <div id="Maintance"></div>
    </div>

    <!--违章记录-->

    <div class="demo-container" style="margin-top: 20px">
        <div class="dx-fieldset dx-fieldset-header" style="margin-left: 20px"> Violation of Regulation</div>
        <div id="IllegalRecord"></div>

    </div>
</div>

<!-- end section: team -->

<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>

<script src="http://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
<script src="https://cdn3.devexpress.com/jslib/16.2.5/js/dx.all.js"></script>
<script src="/Public/js/givereport.js"></script>
<!-- nav -->
<script src="/Public/js/jquery.scrollTo.js"></script>
<script src="/Public/js/jquery.nav.js"></script>
<!-- localScroll -->
<script src="/Public/js/jquery.localscroll-1.2.7-min.js"></script>
<!-- bootstrap -->
<script src="http://lib.sinaapp.com/js/bootstrap/latest/js/bootstrap.min.js"></script>
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
<!--<script src="/Public/js/custom.js"></script>-->



</body>
</html>