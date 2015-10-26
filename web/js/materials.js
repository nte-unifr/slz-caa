// Define every Filters
// var filtersMedia = $("#filtersMedia");
// var filtersDate = $("#filtersDate");
// var filtersLanguage = $("#filtersLanguage");
var fiLanguage      = $("#fiLanguage");
var fiTheme         = $("#fiTheme");
var fiModality      = $("#fiModality");
var fiVocabulary    = $("#fiVocabulary");
var fiReading       = $("#fiReading");
var fiListening     = $("#fiListening");
var fiSpeaking      = $("#fiSpeaking");
var fiPronunciation = $("#fiPronunciation");
var fiWriting       = $("#fiWriting");
var fiSpelling      = $("#fiSpelling");
var fiGrammar       = $("#fiGrammar");
var fiTests         = $("#fiTests");
var fiSource        = $("#fiSource");
var fiType          = $("#fiType");
var fiYear          = $("#fiYear");

// Allow to format the lang level to include label class instead of pure text
var formatLangLevel = function(data) {
    var formatted = "";
    $.each(data, function(index, value) {
        formatted = formatted + '<span class="label label-primary">' + value + '</span>&nbsp;';
    });
    return formatted;
};
var filterTable = function(table, col, value) {
    value = value.toLowerCase() == "all" ? "" : value;
    table.columns(col).search(value).draw();
};
// used for date
// $.fn.dataTable.ext.search.push(
//     function(settings, data, dataIndex) {
//
//         // Filters medias
//         var filtersMediaValue = filtersMedia.data("value");
//         var media = data[filtersMedia.data("col")];
//         //console.log(filtersMediaValue);
//         //console.log(media);
//
//         // Filters date
//         var filtersDateValue = parseInt(filtersDate.data("value"), 10);
//         var year = parseFloat(data[filtersDate.data("col")]) || 0;
//
//         if (
//             (isNaN(filtersDateValue) || filtersDateValue <= year) &&
//             (isNaN(filtersMediaValue) || $.inArray(media, filtersMediaValue))
//            )
//         {
//             return true;
//         }
//         return false;
//     }
// )


$(document).ready(function() {
    // Datatable init
    materialsTable = $("#materials .table").DataTable({
        "select": true,
        "ajax": "/materials.json",
        "deferRender": true,
        "fixedHeader": true,
        "columns": [
            { "data": "title" },
            { "data": "lang_level", "render": function (data, type, full, meta) { return formatLangLevel(data) } },
            { "data": "skills[, ]" },
            { "data": "thematic[<br> ]" },
            { "data": "lang_source[, ]" },
            { "data": "medium", "render": function (data, type, full, meta) { return data[0] } },
            { "data": "lang_target", "visible": false },
            { "data": "year", "visible": false }
        ],
        "language": {
            loadingRecords: '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%"><span class="sr-only">45% Complete</span></div></div>'
        }
    });

    // Chosen init
    $(".js-chosen").chosen({width: "95%"});

    // // Selectize init
    // filtersLanguage.selectize({
    //     onChange : function(value) {
    //         filterTable(materialsTable, filtersLanguage.data("col"), value);
    //     }
    // });
    //
    // filtersMedia.selectize({
    //     onChange : function(value) {
    //         filtersMedia.data("value", value);
    //         materialsTable.draw();
    //     }
    // });
    //
    // filtersDate.selectize({
    //     onChange : function(value) {
    //         filtersDate.data("value", value);
    //         materialsTable.draw();
    //     }
    // });
    //
    // var filtersSource = $("#filtersSource");
    // filtersSource.selectize({
    // });
} );
