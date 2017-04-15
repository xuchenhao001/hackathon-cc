<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>DevExtreme Demo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="/Public/js/jquery-1.11.2.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/16.2.5/css/dx.spa.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/16.2.5/css/dx.common.css" />
    <link rel="dx-theme" data-theme="generic.light" href="https://cdn3.devexpress.com/jslib/16.2.5/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/16.2.5/js/dx.all.js"></script>
    <link rel="stylesheet" type ="text/css" href ="/Public/css/styles.css" />
</head>
<body class="dx-viewport">




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


</body>



</html>