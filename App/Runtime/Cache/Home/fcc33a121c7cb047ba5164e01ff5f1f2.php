<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en"  ng-app="exchangeApp">
<head>
    <title>Peanut</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Public/css/bootstrap2.css" rel="stylesheet">


    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="/Public/js/jquery-1.11.2.js"></script>
    <script src="/Public/js/angular.js"></script>
    <script src="/Public/js/bootstrap.js"></script>
    <script src="/Public/js/script.js"></script>
    <script src="/Public/js/jquery.cookie.js"></script>
</head>

<body>

!-- navbar -->


<div class="navbar-wrapper">
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
                        <li><a title="services" href="#services">Home</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>




<div class="container">

    <div class="header">

        <!-- Navbar -->

        <!-- ********************************* ^ here ^ ********************************* -->
        <br>
        <br>
        <br>
        <h2 align="center">Fill More Detail</h2>
        <br>
        <form name="myForm" class="form-horizontal" enctype="multipart/form-data">
            <fieldset ng-controller="RegistrationController">

                <!-- UserName input-->
                <div class="form-group">
                    <label class="col-md-5 col-sm-4 col-xs-3 control-label" for="UserName"> Insurance Name
                    </label>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <input id="username" name="username"  onFocus = "TipForUsername()" type="text" placeholder="enter your garage name" ng-model="username" class="form-control input-sm input.ng-invalid" required>
                        <p class="required" id="usernameError"></p>
                    </div>
                    <div ng-show="nameNotValid">
                        <label  style="color:red" name ="usernameFiled">Field Insurance Name can not be empty</label>
                    </div>
                </div>

                <!-- Telephone input-->
                <div class="form-group">
                    <label class="col-md-5 col-sm-4 col-xs-3 control-label" for="Name"> Telephone*
                    </label>
                    <div class="col-md-2 col-sm-4 col-xs-6">

                        <input id="Telephone" name="Telephone" type="text" pattern="^([0|\+[0-9]{1,5})?([1-9][0-9]{10})$" placeholder="enter your Telephone" ng-model="phoneNumber" class="form-control input-sm" required>

                    </div>
                </div>

                <!-- Address input-->
                <div class="form-group">
                    <label class="col-md-5 col-sm-4 col-xs-3 control-label" for="Address"> Garage Address
                    </label>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <input id="Address" name="Address" type="text" placeholder="enter your Insurance Address" ng-model="shopaddress" class="form-control input-sm input.ng-invalid" required>
                    </div>
                    <div ng-show="nameNotValid">
                        <label  style="color:red">Field Name can not be empty</label>
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-5 col-sm-4 col-xs-3 control-label" for="textarea">Description of your Insurance.</label>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <textarea class="form-control" id="Description" name="Description"></textarea>
                    </div>
                </div>


                <!-- error label -->
                <div class="form-group">
                    <label class="col-md-5 col-sm-4 col-xs-3 control-label" for="validation">
                    </label>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <label ng-show="!myForm.$valid || passwordsNotEqual" class="errorValidation" name="formValidation"> {{errorTitle}}</label>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-5 col-sm-4 col-xs-3 control-label" for="registerbutton">
                    </label>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <button ng-disabled="!myForm.$valid" id="registerbutton" name="registerbutton" onclick="register()" class="btn btn-primary center-block"><span class="glyphicon glyphicon-user"></span> Register</button>
                    </div>
                </div>


            </fieldset>
        </form>

        <!-- message-->
        <div class="row">
            <div class="col-md-4 col-sm-3 col-xs-2">
            </div>
            <p class="col-md-4 col-sm-6 col-xs-8" id="message">
            </p>
        </div>
    </div>

    <script type="text/javascript">
function register(){
$.cookie('type',"insurance");
window.location.href='/home/index/jumpToLogin';
}

</script>

</body>

</html>