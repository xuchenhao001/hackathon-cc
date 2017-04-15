$(function () {

    //关于基本报告信息
    $("#address").dxTextBox({
        value: '424 N Main St.'
    });

    $("#city").dxTextBox({
        value: 'San Diego'
    });

    $("#notes").dxTextArea({
        value: "Kevin is our hard-working shipping manager and has been helping that department work like clockwork for 18 months. When not in the office, he is usually on the basketball court playing pick-up games.",
        height: 80
    });


    $.post('/home/index/insurance_event',null,function (response) {
        //事故记录
        $("#Accident").dxDataGrid({
            dataSource: {
                store: {
                    type: "array",
                    key: "ID",
                    data: JSON.parse(response)
                }
            },
            columns: [{
                dataField: "Prefix",
                caption: "Description",
                width: 70
            },
                "FirstName",
                "Position", {
                    dataField: "Position",
                    width: 170
                }, {
                    dataField: "State",
                    width: 125
                }, {
                    dataField: "Time",
                    dataType: "date"
                }
            ],
            masterDetail: {
                enabled: true,
                template: function (container, options) {
                    var currentEmployeeData = options.data;
                    //container.addClass("internal-grid-container");
                    $("<div>").text(currentEmployeeData.FirstName + " " + currentEmployeeData.LastName + "'s Tasks:").appendTo(container);
                    $("<div>")
                        .addClass("internal-grid")
                        .dxDataGrid({
                            columnAutoWidth: true,
                            columns: ["Subject", {
                                dataField: "StartDate",
                                dataType: "date"
                            }, {
                                dataField: "DueDate",
                                dataType: "date"
                            }, "Priority", {
                                caption: "Completed",
                                dataType: "boolean",
                                calculateCellValue: function (rowData) {
                                    return rowData.Status == "Completed";
                                }
                            }],
                            dataSource: currentEmployeeData.Tasks
                        }).appendTo(container);
                }
            }
        });
    });



    $.post('/home/index/maintenceevent',null,function (maintences) {
        var midobj=JSON.parse(maintences);
        var data=midobj.data;
        //违章记录
        $("#Maintance").dxDataGrid({
            dataSource: {
                store: {
                    type: "array",
                    key: "ID",
                    data:data
                }
            },
            columns: [
                {
                    dataField: "Time",
                    dataType: "date"
                },
                "Kilometers",
                {
                    dataField: "Type",
                    caption: "Type"

                },

                {
                    dataField: "Position"

                }
            ],
            masterDetail: {
                enabled: true,
                template: function (container, options) {
                    var currentEmployeeData = options.data;
                    // container.addClass("internal-grid-container");
                    $("<div>").text("Maintance Context:").appendTo(container);
                    $("<div>")
                        .addClass("internal-grid")
                        .dxDataGrid({
                            columnAutoWidth: true,
                            columns: [
                                "Subject",
                                "Material"
                            ],
                            dataSource: currentEmployeeData.Tasks
                        }).appendTo(container);
                }
            }
        });
    });

    $.post('/home/index/illegalrecord',null,function (response) {
        //违章记录
        $("#IllegalRecord").dxDataGrid({
            dataSource: {
                store: {
                    type: "array",
                    key: "ID",
                    data: JSON.parse(response)
                }
            },

            columns: [
                {
                    dataField: "ID",
                    caption: "ID",
                    width: 70
                },

                {
                    dataField: "State",
                    caption: "Place",
                    width: 125
                }, {
                    dataField: "Time",
                    dataType: "date"
                },
                "Point_reduced",
                "description",
                "Fine",
                "Status"


            ]

        });
    });

    $.post('/home/index/insurance_event',null,function (response) {

        //保险记录
        $("#Insurance").dxDataGrid({
            dataSource: {
                store: {
                    type: "array",
                    key: "ID",
                    data: JSON.parse(response)
                }
            },
            columns: [
                "Number",
                "Detail",
                {
                    dataField: "StartTime",
                    dataType: "date"
                },
                {
                    dataField: "EndTime",
                    dataType: "date"
                }
            ],
            masterDetail: {
                enabled: true,
                template: function (container, options) {
                    var currentEmployeeData = options.data;
                    //  container.addClass("internal-grid-container");
                    $("<div>").text("Accident  Record:").appendTo(container);
                    $("<div>")
                        .addClass("internal-grid")
                        .dxDataGrid({
                            columnAutoWidth: true,
                            columns: [
                                "ID",
                                {
                                    dataField:"time",
                                    dataType:"date"
                                },
                                "place",
                                "description",
                                "Accident_Type",
                                "DamageDegree",
                                {
                                    caption: "Video",
                                    cellTemplate: function(container, options) {
                                        container.addClass("chart-cell");
                                        $("<div />").dxButton({
                                            text: "see video",
                                            type: "default",
                                            onClick: function(e) {
                                                window.location.href="/home/index/playvideo";

                                            }
                                        }).appendTo(container);
                                    }
                                }
                            ],
                            dataSource: currentEmployeeData.Tasks
                        }).appendTo(container);
                }
            }
        });
    });

});
/**
 * Created by chenking on 2017/3/11.
 */






