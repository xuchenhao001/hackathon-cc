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
    <script type="text/javascript" src="/v1.0.0/Public/html/js/tour_wait_guide.js"></script>


</head>
<body id="container_body">
<div id="header" class="container-fluid">
    <div id="navbar" style="margin-top: 20px;margin-left: 20px;margin-right: 20px">
        <div id="backicon" style="width: 100px;float: left">
            <i class="icon-arrow-left "></i>
            <img alt="40x40" src="/v1.0.0/Public/html/img/back.gif" class="img-rounded" onclick="goback()"/>
        </div>

        <div id="title">
            等待讲解员接单
        </div>
        <div id="homecontent" style="width: 50px;float: right;">
            <a href="/v1.0.0/Public/html/index.html" style="color: #000000"><i class="icon-home icon-white"></i> 首页</a>

        </div>
    </div>
</div>
<div id="content" class="container-fluid">

    <ul class="list-group">

          <li class="list-group-item"  id="guide_info_list" style="display: none">
              <div class="row-fluid" >
                  <div class="col-xs-2 span3">
                      <img alt="140x140" src="/v1.0.0/Public/html/img/icon.jpg" class="img-circle" />
                  </div>
                  <div class="col-xs-6 span3">
                      <dl>
                          <dt id="guide_nickname">
                              美女游客A
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
              <div class="row-fluid">
                  <label id="alert_guide_info">请尽快与导游电话联系，确认见面地点</label>
              </div>
          </li>

        <li class="list-group-item">

            <div class="row-fluid">
                <div class="col-xs-5 span3">
                    <dl>
                        <dd id="order_time"><?php echo ($start_time); ?></dd>
                        <dd id="teamnumber"><?php echo ($teamnumber); ?>人,线路<?php echo ($pathid); ?></dd>
                    </dl>

                </div>
                <div class="col-xs-2 span3">

                </div>
                <div class="col-xs-5 span3">
                    <dl>
                        <dd id="time">15分钟</dd>

                    </dl>
                </div>
            </div>
        </li>

        <li  class="list-group-item" style="min-height: 200px" id="notification_intro">
            <div class="row-fluid" >
                <div class="col-xs-12 span6" align="center" style="font-size: 0.9em">
                    <dl>
                        <dd >正在通知专业讲解员</dd>
                        <dd >一般需要等待15分钟，请游客耐心等待</dd>
                        <dd>一路成行，有你相伴，真好！</dd>
                    </dl>
                </div>
            </div>
        </li>
    </ul>

    <label id="fee_info">本次行程共收费</label><label id="money"><?php echo ($money); ?></label><label id="unit_yuan">元</label>
    <button type="button" class="btn btn-success" id="paymoney" onclick="paymoney()" style="display: none">支付完成</button>
</div>
<div id="guideid"  hidden></div>
<div id="content_hidden"  hidden>'+message.content+'</div>
</body>
<script type="text/javascript">

    var goEasy = new GoEasy({
        appkey: 'a7f08aeb-3ac9-4831-a1d2-d8b88737e541'
    });

    function initServerSendEvent() {
        goEasy.subscribe({
            channel: getCookie('name'),
            onMessage: function(message){
                //得到接单之后，游客的反应

                var content=message.content.replace(new RegExp('&quot;',"gm"),'\"');
                //接受到的json串再传回去
                var contenttran=JSON.parse(content);
                var type=contenttran.MsgType;

                //如果传输的频道是导游接受了游客的订单，则有下面的函数
                if(type=='push_guideinfo') {

                    $('#guide_info_list').show();
                    $('#notification_intro').hide();
                    $('#fee_info').hide();
                    $('#money').hide();
                    $('#unit_yuan').hide();
                    $('#title').text('进行中');
                    //获取导游的id
                    var guideid=contenttran.guideid;
                    $('#guideid').text(guideid);
                    $('#guide_nickname').text('导游' + contenttran.login_name);
                }
                else if(type=='guideFinishOrder'){
                    //导游结束订单，游客开始付钱
                    $('#title').text('支付旅费');
                    $('#notification_intro').hide();
                    $('#fee_info').hide();
                    $('#alert_guide_info').hide();
                    $('#money').hide();
                    $('#paymoney').show();

                }
                else if(type=='pay_money'){
                    //支付完成
                    window.location.href='../../../../Public/evaluate.html';
                }else if(type=='guide_start_travel'){
                    //导游点击出发
                    alert('go');
                }

            }
        });
    }
    initServerSendEvent();

</script>

</html>