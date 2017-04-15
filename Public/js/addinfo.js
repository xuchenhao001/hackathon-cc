

var companies = [{
    "ID": 1,
    "CompanyName": "Super Mart of the West",
    "Address": "702 SW 8th Street",
    "City": "Bentonville",
    "State": "Arkansas",
    "Zipcode": 72716,
    "Phone": "(800) 555-2797",
    "Fax": "(800) 555-2171",
    "Website": "http://www.nowebsitesupermart.com"
}, {
    "ID": 2,
    "CompanyName": "Electronics Depot",
    "Address": "2455 Paces Ferry Road NW",
    "City": "Atlanta",
    "State": "Georgia",
    "Zipcode": 30339,
    "Phone": "(800) 595-3232",
    "Fax": "(800) 595-3231",
    "Website": "http://www.nowebsitedepot.com"
}, {
    "ID": 3,
    "CompanyName": "K&S Music",
    "Address": "1000 Nicllet Mall",
    "City": "Minneapolis",
    "State": "Minnesota",
    "Zipcode": 55403,
    "Phone": "(612) 304-6073",
    "Fax": "(612) 304-6074",
    "Website": "http://www.nowebsitemusic.com"
}, {
    "ID": 4,
    "CompanyName": "Tom's Club",
    "Address": "999 Lake Drive",
    "City": "Issaquah",
    "State": "Washington",
    "Zipcode": 98027,
    "Phone": "(800) 955-2292",
    "Fax": "(800) 955-2293",
    "Website": "http://www.nowebsitetomsclub.com"
}];


$(function(){
    var form = $("#form").dxForm({
        formData: companies[0],
        readOnly: false,
        showColonAfterLabel: true,
        labelLocation: "top",
        minColWidth: 300,
        colCount: 2
    }).dxForm("instance");

    $("#select-company").dxSelectBox({
        displayExpr: "CompanyName",
        dataSource: companies,
        value: companies[0],
        onValueChanged: function(data) {
            form.option("formData", data.value);
        }
    });

    $("#label-location").dxSelectBox({
        items: ["left", "top"],
        value: "top",
        onValueChanged: function(data) {
            form.option("labelLocation", data.value);
        }
    });

    $("#columns-count").dxSelectBox({
        items: ["auto", 1, 2, 3],
        value: 2,
        onValueChanged: function(data) {
            form.option("colCount", data.value);
        }
    });

    $("#min-column-width").dxSelectBox({
        items: [150, 200, 300],
        value: 300,
        onValueChanged: function(data) {
            form.option("minColWidth", data.value);
        }
    });

    $("#width").dxNumberBox({
        value: undefined,
        max: 550,
        onValueChanged: function(data) {
            form.option("width", data.value);
        }
    });

    $("#read-only").dxCheckBox({
        text: "readOnly",
        value: false,
        onValueChanged: function(data) {
            form.option("readOnly", data.value);
        }
    });

    $("#show-colon").dxCheckBox({
        text: "showColonAfterLabel",
        value: true,
        onValueChanged: function(data) {
            form.option("showColonAfterLabel", data.value);
        }
    });
});/**
 * Created by chenking on 2017/3/11.
 */


