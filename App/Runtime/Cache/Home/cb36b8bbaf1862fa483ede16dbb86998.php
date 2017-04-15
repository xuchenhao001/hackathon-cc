<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title>安游网信</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript" src="/v1.0.0/Public/html/js/jquery.min.js"></script>
    <script type="text/javascript" src="/v1.0.0/Public/html/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/v1.0.0/Public/html/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/v1.0.0/Public/html/css/bootstrap.offcanvas.min.css"/>
    <script src="/v1.0.0/Public/html/js/bootstrap.offcanvas.js"></script>
    <link href="/v1.0.0/Public/html/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/v1.0.0/Public/html/css/bootstrap-combined.min.css"/>
    <link rel="stylesheet" href="/v1.0.0/Public/html/css/default.css" media="screen"/>
    <link rel="stylesheet" href="/v1.0.0/Public/html/css/guiderece.css">
    <script type="text/javascript" src="https://cdn.goeasy.io/goeasy.js"></script>
    <script type="text/javascript" src="/v1.0.0/Public/html/js/json2.js"></script>
    <script type="text/javascript" src="/v1.0.0/Public/html/js/login.js"></script>
    <script type="text/javascript" src="/v1.0.0/Public/html/js/guiderece.js"></script>

</head>
<body id="container_body">
<div class="alert alert-error" id="alert_info" hidden></div>
<div id="header" class="container-fluid">
    <div id="navbar" style="margin-top: 20px;margin-left: 20px;margin-right: 20px">
        <div id="backicon" style="width: 100px;float: left">
            <i class="icon-arrow-left "></i>
            <img alt="40x40" src="/v1.0.0/Public/html/img/back.gif" class="img-rounded" onclick="goback()"/>
        </div>

        <div id="title" >
            导游待抢单
        </div>
        <div id="homecontent" style="width: 50px;float: right;">
            <a href="/v1.0.0/Public/html/index.html" style="color: #000000"><i class="icon-home icon-white"></i> 首页</a>

        </div>
    </div>
</div>
<div id="content" class="container-fluid">

    <?php if(is_array($order_list)): foreach($order_list as $key=>$v): ?><ul class="list-group">

        <li class="list-group-item">
            <div class="row-fluid">
                <div class="col-xs-2 span3">
                    <img alt="140x140" src="/v1.0.0/Public/html/img/icon.jpg" class="img-circle" />
                </div>
                <div >
                    <div  hidden> <?php echo ($v["user_id"]); ?></div>
                    <div  hidden><?php echo ($v["orderid"]); ?></div>
                </div>
                <div class="col-xs-6 span3">
                    <dl >
                        <script>

                            var nickname=unescape(unescape(<?php echo ($v["login_name"]); ?>));
                            document.write('美女游客'+ nickname) ;

                        </script>
                        </dt>
                        <dd>
                            出游8次
                        </dd>
                    </dl>
                </div>
                <div class="col-xs-2 span3">
                    <img alt="60x60" src="/v1.0.0/Public/html/img/phone_icon.gif" class="img-rounded" />
                </div>
                <div class="col-xs-2 span3">
                    <img alt="60x60" src="/v1.0.0/Public/html/img/info.gif" class="img-rounded" />
                </div>
            </div>
        </li>


        <li class="list-group-item">

            <div class="row-fluid">
                <div class="col-xs-5 span3">
                    <dl>
                        <dd ><?php echo ($v["start_time"]); ?></dd>
                        <dd ><label ><?php echo ($v["teamnumber"]); ?></label>人</dd>
                    </dl>

                </div>
                <div class="col-xs-2 span3">

                </div>
                <div class="col-xs-5 span3">
                    <dl>
                        <dd id="spendmoney"><?php echo ($v["spendmoney"]); ?>元</dd>

                    </dl>
                </div>
            </div>
        </li>
        <li class="list-group-item" id="paymoney_li" style="display: none;">

            <div class="row-fluid">
                <div class="col-xs-5 span3">
                    <dl>
                        <dd >支付费用</dd>
                        <dd ><label >旅费合计</label></dd>
                    </dl>

                </div>
                <div class="col-xs-2 span3">
                    <dl>
                        <dd><?php echo ($v["spendmoney"]); ?></dd>
                        <dd><?php echo ($v["spendmoney"]); ?></dd>
                    </dl>

                </div>
                <div class="col-xs-5 span3">
                    <dl>
                        <dd >等待支付</dd>
                        <dd>投诉</dd>
                    </dl>
                </div>
            </div>
        </li>

    </ul><?php endforeach; endif; ?>
    <div style="display: none;" id="together_btn">
        <a href="javascript:together()" style="color: #000000;" ><i class="icon-home icon-white"></i> 拼团</a>
    </div>

    <button id="startravel" type="button" class="btn btn-block btn-success" onclick="guide_start_travel()"  style="margin-bottom: 10px">GO</button>
    <button id="finishOrder" type="button" class="btn btn-block btn-success" onclick="guide_finish_order()"  style="display: none;">导游结束</button>
</div>
<div id="parentid" hidden><?php echo ($parentid); ?></div>
<div id="tag" hidden>list</div>
</body>
</html>