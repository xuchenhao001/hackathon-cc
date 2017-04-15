<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>garage add information</title>
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
    <link href="/Public/css/addinfo.css" type="text/css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/16.2.5/css/dx.spa.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/16.2.5/css/dx.common.css" />
    <link rel="dx-theme" data-theme="generic.light" href="https://cdn3.devexpress.com/jslib/16.2.5/css/dx.light.css" />
</head>
<body>
<!-- navbar -->
<div class="navbar-wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <!-- Responsive navbar -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </a>
                <h1 class="brand"><a href="/" tppabs="#">HuaSheng.COM</a></h1>
                <!-- navigation -->
                <nav class="pull-right nav-collapse collapse">
                    <ul id="menu-main" class="nav">
                        <li><a title="services" href="#services">Services</a></li>
                        <li><a title="team" href="#about">About</a></li>
                        <li><a href="/home/index/jumpToLogin">Login</a></li>
                        <li><a href="#">Register</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!--添加信息-->

<!--<div class="demo-container" style="margin-top: 100px">
    <div id="form-demo">
        <div class="form-container">
            <div id="form"></div>
        </div>

    </div>
</div>-->




<div class="demo-container">
    <div class="long-title_garage"><h3>Car Maintenance Record:</h3></div>
    <div id="form-container_garage">
        <div id="form"></div>
    </div>
</div>

<script>

    var employee = {
        "Car ID": "Fill in your Car ID",
        "Garage ID": "2100123",
        "Garage Location": "Beijing *****",
        "Position": "CEO",
        "BirthDate": "1964/03/16",
        "HireDate": "1995/01/15",
        "Notes": "You need to fill in the detailed maintenance report.",
        "Address": "351 S Hill St., Los Angeles, CA",
        "Phone": "360-684-1334"
    };

    var types = [
        "Repair",
        "Overhaul",
        "Upkeep",
        "Accident"
    ];


    $(function(){
        $("#form").dxForm({
            colCount: 2,
            formData: employee,
            items: ["Car ID", {
                dataField: "Garage ID",
                editorOptions: {
                    disabled: false
                }
            }, {
                dataField: "Garage Location",
                editorOptions: {
                    disabled: false
                }
            }, {
                dataField: "Type",
                editorType: "dxSelectBox",
                editorOptions: {
                    items: types,
                    value: ""
                },
                validationRules: [{
                    type: "required",
                    message: "You need to choose type of maintenance"
                }]
            }, {
                dataField: "Time to Garage",
                editorType: "dxDateBox",
                editorOptions: {
                    disabled: false
                }
            }, {
                dataField: "Time out of Garage",
                editorType: "dxDateBox",
                editorOptions: {
                    value: null
                },
                validationRules: [{
                    type: "required",
                    message: "Time out of Garage is required"
                }]
            }, {
                colSpan: 2,
                dataField: "Maintenance content",
                editorType: "dxTextArea",
                editorOptions: {
                    height: 90
                }
            }, "Address", {
                dataField: "Phone",
                editorOptions: {
                    mask: "+1 (X00) 000-0000",
                    maskRules: {"X": /[02-9]/}
                }
            }
            ]
        });

        $("#form").dxForm("instance").validate();
    });
</script>



<!-- end section: team -->
<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>

<script src="http://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
<script src="https://cdn3.devexpress.com/jslib/16.2.5/js/dx.all.js"></script>

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
<script src="/Public/js/addinfo.js"></script>
</body>
</html>