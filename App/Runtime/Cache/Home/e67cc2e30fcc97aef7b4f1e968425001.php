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
    <link rel="stylesheet" type ="text/css" href ="/Public/css/toastr.css" />

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
                <h1 class="brand"><img href="/"  src="/Public/img/logomini.png" tppabs="#" /img></h1>
                <!-- navigation -->
                <nav class="pull-right nav-collapse collapse">
                    <ul id="menu-main" class="nav">
                        <li><a title="services" href="/">Home</a></li>
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
        <button type="button" class="btn btn-primary-alt" onclick="getData()">Read</button>
        <div class="form-group2">
            <label for="total_mileage">Total mileage:</label>
            <label type="text" class="form-control2" id="total_mileage">Data not read.</label>
        </div>
        <div class="form-group2">
            <label for="engine_condition">Engine condition:</label>
            <label type="text" class="form-control2" id="engine_condition">Data not read.</label>
        </div>
        <div class="form-group2">
            <label for="gear_box_condition">Gear-box condition:</label>
            <label type="text" class="form-control2" id="gear_box_condition">Data not read.</label>
        </div>
        <div class="form-group2">
            <label for="safety_air_bag_condition">Safety air bag condition:</label>
            <label type="text" class="form-control2" id="safety_air_bag_condition">Data not read.</label>
        </div>
        <div class="form-group2">
            <label for="structral_unit_condition">Structral unit condition:</label>
            <label type="text" class="form-control2" id="structral_unit_condition">Data not read.</label>
        </div>
        <div class="form-group2">
            <label for="tyre_condition">Tyre condition:</label>
            <label type="text" class="form-control2" id="tyre_condition">Data not read.</label>
        </div>
        <br/>
        <button type="button" class="btn btn-primary-alt" onclick="submit()">Submit</button>


    </form>
</div>


<script>
    function getData() {
        var orders = {
            "total_mileage": "Has been traveling 5000 km.",
            "engine_condition": "Original. Has been used 32 months.",
            "gear_box_condition": "Original. Has been used 32 months.",
            "safety_air_bag_condition": "Original. Has been used 32 months.",
            "structral_unit_condition": "Good condition.",
            "tyre_condition": "Secondhand. Has been used 11 months."
        };
        var data={
            iot:JSON.stringify(orders),
            id:'13',
            id_card:'沪8uc785',
            owner:'Krid',
            daycode:'20160812 15:00:00',
            location:'Shanghai',
            image:'car1.mp4',
            describe:'base info'
        };

        $("#total_mileage").text(orders.total_mileage);
        $("#engine_condition").text(orders.engine_condition);
        $("#gear_box_condition").text(orders.gear_box_condition);
        $("#safety_air_bag_condition").text(orders.safety_air_bag_condition);
        $("#structral_unit_condition").text(orders.structral_unit_condition);
        $("#tyre_condition").text(orders.tyre_condition);
        //上传信息到服务器
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "/home/index/PutEvent",
            async: false,
            data: data,
            success: function (data) {
                if (data.msg.result.status == "OK") {
                    alert('保存数据成功');
                }
                else {
                    alert('保存失败');
                }
            }
        });
    }


</script>
<script>
       function submit(){
toastr.success("Success!", 'Info');
}

</script>

<script src="/Public/js/jquery.js"></script>
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

<script src="/Public/js/toastr.js"></script>
</body>
<script>
function back(){
window.location.href = '/home/index/returnHome';
}
</script>
</html>