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

    <link rel="shortcut icon" href="/Public/img/favicon.ico">
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
                <h1 class="brand"><img href="/"  src="/Public/img/logomini.png" tppabs="#" /></h1>
                <!-- navigation -->
                <nav class="pull-right nav-collapse collapse">
                    <ul id="menu-main" class="nav">
                        <li><a href="/home/index/returnHome">Return</a></li>
                        <li><a href="/home/index/jumpToRegister">Register</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="lt-from lt-box2">
    <form role="form">
        <br>
        <br>
        <br>
        <div class="form-group2">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control2" id="exampleInputEmail1" placeholder="Email">
        </div>
        <div class="form-group2">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control2" id="exampleInputPassword1" placeholder="Password">
        </div>
        <br/>
        <button type="button" class="btn btn-primary-alt" onclick="login()">Submit</button>

        <br>

    </form>
</div>



<script src="/Public/js/jquery-1.11.2.js"></script>
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
    function login() {

        var type = $.cookie("type");

        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "/home/index/check",
            data: {type: type},
            async: false,
            success: function (data) {
                if (data.RESULT == "garage") {
                    location.href = "/home/index/jumpToGarage";
                }
                else if (data.RESULT == "insurance") {
                    location.href = "/home/index/jumpToInsurance";
                } else if(data.RESULT == "customer"){
                    location.href = "/home/index/jumpToCustomer";
                }else{
                    location.href="/home/TrafficeDepart/index";
                }
            }
        });
    }
</script>

</body>
</html>