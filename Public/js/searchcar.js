$(function(){


    //搜索按钮
    $("#success").dxButton({
        text: "Search",
        type: "success",
        onClick: function(e) {
            //检验是否信息没有填
            var datetime=$('#date-time').text();
            var location=$('#location').val();

                window.location.href="/home/index/playvideo";



        }
    });

    var now = new Date();
    //搜索video
    $("#date-time").dxDateBox({
        type: "datetime",
        value: now
    });



    var dataGrid = $("#gridContainer").dxDataGrid({
        dataSource: orders,
        filterRow: {
            visible: true,
            applyFilter: "auto"
        },
        searchPanel: {
            visible: false,
            width: 240,
            placeholder: "Search..."
        },
        headerFilter: {
            visible: true
        },
        columns: [{
            dataField: "CarID",
            width: 130,
            caption: "Car ID",
            headerFilter: {
                groupInterval: 10000
            }
        }, {
            dataField: "PurchaseDate",
            alignment: "right",
            dataType: "date",
            headerFilter: {
                dataSource: function(data) {
                    data.dataSource.postProcess = function(results) {
                        results.push({
                            text: "Weekends",
                            value: [[getOrderDay, "=", 0],
                                "or",
                                [getOrderDay, "=", 6]]
                        });

                        return results;
                    };
                }
            }
        }, {
            dataField: "Reference Prise",
            alignment: "right",
            format: "currency",
            headerFilter: {
                dataSource: [ {
                    text: "Less than $3000",
                    value: ["SaleAmount", "<", 3000]
                }, {

                    text: "$3000 - $5000",
                    value: [["SaleAmount", ">=", 3000], ["SaleAmount", "<", 5000]]
                }, {

                    text: "$5000 - $10000",
                    value: [["SaleAmount", ">=", 5000], ["SaleAmount", "<", 10000]]
                }, {

                    text: "$10000 - $20000",
                    value: [["SaleAmount", ">=", 10000], ["SaleAmount", "<", 20000]]
                }, {

                    text: "Greater than $20000",
                    value: ["SaleAmount", ">=", 20000]
                }]
            }
        }, "Total Mileage", {
            caption: "Gear Box",
            dataField: "Gear Box"
        }, {
            caption: "Brand",
            dataField: "Brand"
        }, {
            caption: "details",
            cellTemplate: function(container, options) {
                container.addClass("chart-cell");
                $("<div />").dxButton({
                    text: "check details",
                    type: "default",
                    onClick: function(e) {
                        //跳转到详细界面,查看车辆的报告
                        window.location.href="/home/insurance/GiveReport";

                    }
                }).appendTo(container);
            }
        },
            {
            caption: "action",
            cellTemplate: function(container, options) {
                container.addClass("chart-cell");
                $("<div />").dxButton({
                    text: "connect seller",
                    type: "default",
                    onClick: function(e) {
                        window.location.href="http://wpa.qq.com/msgrd?v=3&uin=1608500576&site=qq&menu=yes";

                    }
                }).appendTo(container);
            }
        }

        ]

    }).dxDataGrid('instance');

    var applyFilterTypes = [{
        key: "auto",
        name: "Immediately"
    }, {
        key: "onClick",
        name: "On Button Click"
    }];

    $("#useFilterApplyButton").dxSelectBox({
        items: applyFilterTypes,
        value: applyFilterTypes[0].key,
        valueExpr: "key",
        displayExpr: "name",
        onValueChanged: function(data) {
            dataGrid.option("filterRow.applyFilter", data.value);
        }
    });

    $("#filterRow").dxCheckBox({
        text: "Filter Row",
        value: true,
        onValueChanged: function(data) {
            dataGrid.clearFilter();
            dataGrid.option("filterRow.visible", data.value);
            $(".apply-filter-option").css("display", data.value ? "block" : "none");
        }
    });

    $("#headerFilter").dxCheckBox({
        text: "Header Filter",
        value: true,
        onValueChanged: function(data) {
            dataGrid.clearFilter();
            dataGrid.option("headerFilter.visible", data.value);
        }
    });

    function getOrderDay(rowData) {
        return (new Date(rowData.OrderDate)).getDay();
    }


});

var orders = [{
    "ID": 1,
    "CarID": 35703,
    "PurchaseDate": "2014/04/10",
    "Reference Prise": 11800,
    "Terms": "15 Days",
    "Brand": "Audi",
    "Gear Box": "Auto",
    "Total Mileage": "5555km",
    "Operation":"Buy"
}, {
    "ID": 4,
    "CarID": 35711,
    "PurchaseDate": "2014/01/12",
    "Reference Prise": 16050,
    "Terms": "15 Days",
    "Brand": "Rolls-royce",
    "Gear Box": "Auto",
    "Total Mileage": "3232km",
    "Operation":"Buy"

}, {
    "ID": 5,
    "CarID": 35714,
    "PurchaseDate": "2014/01/22",
    "Reference Prise": 14750,
    "Terms": "15 Days",
    "Brand": "Rolls-royce",
    "Gear Box": "Auto",
    "Total Mileage": "1873km",
    "Operation":"Buy"
}, {
    "ID": 7,
    "CarID": 35983,
    "PurchaseDate": "2014/02/07",
    "Reference Prise": 3725,
    "Terms": "15 Days",
    "Brand": "BMW",
    "Gear Box": "Auto",
    "Total Mileage": "8773km",
    "Operation":"Buy"
}, {
    "ID": 9,
    "CarID": 36987,
    "PurchaseDate": "2014/03/11",
    "Reference Prise": 14200,
    "Terms": "15 Days",
    "Brand": "BMW",
    "Gear Box": "Auto",
    "Total Mileage": "11123km",
    "Operation":"Buy"
}, {
    "ID": 11,
    "CarID": 38466,
    "PurchaseDate": "2014/03/01",
    "Reference Prise": 7800,
    "Terms": "15 Days",
    "Brand": "BMW",
    "Gear Box": "Auto",
    "Total Mileage": "32322km",
    "Operation":"Buy"
}, {
    "ID": 14,
    "CarID": 39420,
    "PurchaseDate": "2014/02/15",
    "Reference Prise": 20500,
    "Terms": "15 Days",
    "Brand": "BMW",
    "Gear Box": "Auto",
    "Total Mileage": "12332km",
    "Operation":"Buy"
}, {
    "ID": 15,
    "CarID": 39874,
    "PurchaseDate": "2014/02/04",
    "Reference Prise": 9050,
    "Terms": "30 Days",
    "Brand": "BMW",
    "Gear Box": "Auto",
    "Total Mileage": "4232km",
    "Operation":"Buy"
}, {
    "ID": 18,
    "CarID": 42847,
    "PurchaseDate": "2014/02/15",
    "Reference Prise": 20400,
    "Terms": "30 Days",
    "Brand": "Mercedes-Benz",
    "Gear Box": "Auto",
    "Total Mileage": "1112km",
    "Operation":"Buy"
}, {
    "ID": 19,
    "CarID": 43982,
    "PurchaseDate": "2014/05/29",
    "Reference Prise": 6050,
    "Terms": "30 Days",
    "Brand": "Mercedes-Benz",
    "Gear Box": "Auto",
    "Total Mileage": "5253km",
    "Operation":"Buy"
}, {
    "ID": 29,
    "CarID": 56272,
    "PurchaseDate": "2014/02/06",
    "Reference Prise": 15850,
    "Terms": "30 Days",
    "Brand": "Mercedes-Benz",
    "Gear Box": "Auto",
    "Total Mileage": "5444km",
    "Operation":"Buy"
}, {
    "ID": 30,
    "CarID": 57429,
    "PurchaseDate": "2014/05/16",
    "Reference Prise": 11050,
    "Terms": "30 Days",
    "Brand": "Mercedes-Benz",
    "Gear Box": "Auto",
    "Total Mileage": "2213km",
    "Operation":"Buy"
}, {
    "ID": 32,
    "CarID": 58292,
    "PurchaseDate": "2014/05/13",
    "Reference Prise": 13500,
    "Terms": "15 Days",
    "Brand": "Mercedes-Benz",
    "Gear Box": "Auto",
    "Total Mileage": "6575km",
    "Operation":"Buy"
}, {
    "ID": 36,
    "CarID": 62427,
    "PurchaseDate": "2014/01/27",
    "Reference Prise": 23500,
    "Terms": "15 Days",
    "Brand": "CADILLAC",
    "Gear Box": "Auto",
    "Total Mileage": "7896km",
    "Operation":"Buy"
}, {
    "ID": 39,
    "CarID": 65977,
    "PurchaseDate": "2014/02/05",
    "Reference Prise": 2550,
    "Terms": "15 Days",
    "Brand": "CADILLAC",
    "Gear Box": "Auto",
    "Total Mileage": "6576km",
    "Operation":"Buy"
}, {
    "ID": 40,
    "CarID": 66947,
    "PurchaseDate": "2014/03/23",
    "Reference Prise": 3500,
    "Terms": "15 Days",
    "Brand": "CADILLAC",
    "Gear Box": "Auto",
    "Total Mileage": "3323km",
    "Operation":"Buy"
},  {
    "ID": 69,
    "CarID": 98477,
    "PurchaseDate": "2014/01/01",
    "Reference Prise": 23500,
    "Terms": "15 Days",
    "Brand": "Mazda",
    "Gear Box": "Auto",
    "Total Mileage": "1242km",
    "Operation":"Buy"
}, {
    "ID": 70,
    "CarID": 99247,
    "PurchaseDate": "2014/02/08",
    "Reference Prise": 2100,
    "Terms": "15 Days",
    "Brand": "Mazda",
    "Gear Box": "Manual",
    "Total Mileage": "5432km",
    "Operation":"Buy"
}, {
    "ID": 78,
    "CarID": 174884,
    "PurchaseDate": "2014/04/10",
    "Reference Prise": 7200,
    "Terms": "30 Days",
    "Brand": "Mazda",
    "Gear Box": "Manual",
    "Total Mileage": "7776km",
    "Operation":"Buy"
}, {
    "ID": 81,
    "CarID": 188877,
    "PurchaseDate": "2014/02/11",
    "Reference Prise": 8750,
    "Terms": "30 Days",
    "Brand": "Jaguar",
    "Gear Box": "Manual",
    "Total Mileage": "5542km",
    "Operation":"Buy"
}, {
    "ID": 82,
    "CarID": 191883,
    "PurchaseDate": "2014/02/05",
    "Reference Prise": 9900,
    "Terms": "30 Days",
    "Brand": "Jaguar",
    "Gear Box": "Manual",
    "Total Mileage": "8799km",
    "Operation":"Buy"
}, {
    "ID": 83,
    "CarID": 192474,
    "PurchaseDate": "2014/01/21",
    "Reference Prise": 12800,
    "Terms": "30 Days",
    "Brand": "Ford",
    "Gear Box": "Manual",
    "Total Mileage": "98764km",
    "Operation":"Buy"
}];