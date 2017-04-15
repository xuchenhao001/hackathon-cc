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
    <link rel="stylesheet" href="/v1.0.0/Public/html/css/order_list.css">
    <script type="text/javascript" src="https://cdn.goeasy.io/goeasy.js"></script>
    <script type="text/javascript" src="/v1.0.0/Public/html/js/json2.js"></script>
    <script type="text/javascript" src="/v1.0.0/Public/html/js/login.js"></script>
    <script type="text/javascript" src="/v1.0.0/Public/html/js/guiderece.js"></script>
    <script type="text/javascript" src="/v1.0.0/Public/html/js/order_list.js"></script>
    <link rel="stylesheet" href="/v1.0.0/Public/html/css/jquery-weui.css"/>
    <link rel="stylesheet" href="/v1.0.0/Public/html/css/weui.css"/>

</head>
<body id="container_body">
<div class="alert alert-error" id="alert_info" hidden></div>
<div id="header" class="container-fluid">
    <div id="navbar" style="margin-top: 20px;margin-left: 20px;margin-right: 20px">
        <div id="backicon" style="width: 100px;float: left">
            <i class="icon-arrow-left "></i>
            <img alt="40x40" src="/v1.0.0/Public/html/img/back.gif" class="img-rounded" onclick="order_list_goback()"/>
        </div>

        <div id="title">
            可选游客
        </div>
        <div id="homecontent" style="width: 50px;float: right;">
            <a href="/v1.0.0/Public/html/index.html" style="color: #000000"><i class="icon-home icon-white"></i> 首页</a>

        </div>
    </div>
</div>
<div id="content" class="container-fluid">

    <div>
        <label>
            <select>
                <option>智能排序</option>
                <option>按照时间排序</option>
                <option>按照距离排序</option>
            </select>
        </label>
    </div>

    <div id="parentid" hidden> <?php echo ($parentid); ?></div>

    <?php if(!empty($tourist_info)): if(is_array($tourist_info)): foreach($tourist_info as $key=>$v): ?><div class="weui_cell"><?php echo ($v["start_time"]); ?></div>

            <ul class="list-group">
                <li class="list-group-item ">

                    <div class="weui-row">

                        <div class="weui-col-50">
                            <div class="weui-col-50">

                                <img alt="140x140" src="/v1.0.0/Public/html/img/icon.jpg" class="img-circle"/>

                            </div>
                            <div class="weui-col-50">
                                <div>
                                    <script>

                                        var nickname = unescape(unescape(<?php echo ($v["login_name"]); ?>))
                                        ;
                                        document.write('美女游客' + nickname);

                                    </script>
                                </div>
                                <div><?php echo ($v["teamnumber"]); ?>人</div>
                                <div>线路<?php echo ($v["road_name"]); ?></div>
                            </div>
                        </div>
                        <div class="weui-col-50">
                            <div>
                                <img alt="60x60" src="/v1.0.0/Public/html/img/phone_icon.gif" class="img-rounded"/>
                                <img alt="60x60" src="/v1.0.0/Public/html/img/info.gif" class="img-rounded"/>
                            </div>

                           <?php if($type == 'guide_find_tour' ): ?><button type="button" class="btn " onclick="guide_rece_near_order(<?php echo ($v["pathid"]); ?>,'<?php echo ($v["login_name"]); ?>','<?php echo ($v["start_time"]); ?>',<?php echo ($v["createuserid"]); ?>, <?php echo ($v["id"]); ?>, <?php echo ($v["teamnumber"]); ?>)
                         ">抢单</a> </button>
                               <?php else: endif; ?>
                            <?php if( $type == 'guide_get_tourtogeinfo' ): ?><button type="button" class="btn " onclick="click_order(

                            <?php echo ($v["id"]); ?>,<?php echo ($parentid); ?>
                            )">立即抢单</a> </button><?php endif; ?>


                        </div>

                        <div>
                            <div id="tourid" hidden><?php echo ($v["createuserid"]); ?></div>
                            <div id="order_id" hidden><?php echo ($v["id"]); ?></div>
                        </div>

                    </div>
                </li>
            </ul><?php endforeach; endif; ?>

        <?php else: ?>
        <lable>查询结果不存在</lable><?php endif; ?>


</div>
<div id="tag" hidden>choose_toge_list</div>
</body>
</html>