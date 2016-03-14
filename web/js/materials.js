// Format medium to translate ugly acronyms
var formatMedium = function(data) {
    var formatted = "";
    $.each(data, function(index, value) {
        formatted = formatted + Translator.trans(value, {}, 'medias');
    });
    return formatted;
}

var isRowAllowed = function(tableData, filterData, wildcard) {
    wildcard = typeof wildcard !== 'undefined' ? wildcard : null; // define wildcard if not set

    _.each(tableData, function(element, index, tableData){ tableData[index] = element.toUpperCase(); }); // uppercase every element of the table
    _.each(filterData, function(element, index, filterData){ filterData[index] = element.toUpperCase(); }); // uppercase every element of the table
    var intersection = _.intersection(tableData, filterData); // get elements that are in both tables
    return intersection.length > 0 || _.contains(filterData, wildcard); // we have at least an element or filter is set to wildcard
}

// Check each row to filter
$.fn.dataTable.ext.search.push(
    function(settings, searchData, index, rowData, counter) {

        // language / spr
        var tableSpr = rowData.spr;
        var filterSpr = [$("#fiLanguage").chosen().val()];
        if (!isRowAllowed(tableSpr, filterSpr, "ALL")) {
            return false;
        }

        // theme / fachbezug
        if ($("#fiTheme_chosen").is(":visible")) {
            var tableFachbezug = rowData.fachbezug.data;
            var filterFachbezug = $("#fiTheme").chosen().val();
            if (!isRowAllowed(tableFachbezug, filterFachbezug)) {
                return false;
            }
        }

        // modality / asl
        var tableAsl = rowData.asl;
        var filterAsl = $("#fiModality").chosen().val();
        if (!isRowAllowed(tableAsl, filterAsl)) {
            return false;
        }

        // levels / sprachniveau
        var tableSprachniveau = rowData.sprachniveau.data;
        var filterSprachniveau = $("#fiLevel").chosen().val();
        if (!isRowAllowed(tableSprachniveau, filterSprachniveau)) {
            return false;
        }

        // skills / fertigkeit
        var tableFertigkeit = rowData.fertigkeit.data;
        var filterFertigkeit = $("#fiSkills").chosen().val();
        if (!isRowAllowed(tableFertigkeit, filterFertigkeit)) {
            return false;
        }

        // source / ausgangssprache
        var tableAusgangssprache = rowData.ausgangssprache.data;
        var filterAusgangssprache = $("#fiSource").chosen().val();
        _.each(tableAusgangssprache, function(element, index, tableData){ tableData[index] = element.toUpperCase(); });
        var uncommonSources = _.without(tableAusgangssprache, "DEUTSCH", "ENGLISCH", "FRANZÖSISCH", "ITALIENISCH", "SPANISCH");
        if (uncommonSources.length > 0) {
            tableAusgangssprache.push("other");
        }
        if (!isRowAllowed(tableAusgangssprache, filterAusgangssprache)) {
            return false;
        }

        // type / type
        var tableType = rowData.type;
        var filterType = $("#fiType").chosen().val();
        if (!isRowAllowed(tableType, filterType)) {
            return false;
        }

        // year / jahr
        var tableJahr = rowData.jahr;
        var filterJahr = $("#fiYear").chosen().val();
        if (filterJahr != "all" && tableJahr < filterJahr) {
            return false;
        }

        return true;
    }
)


$(document).ready(function() {

    // Get current lang
    var currentLang = $("html").attr("lang");
    var langUrl = "//cdn.datatables.net/plug-ins/1.10.10/i18n/English.json";
    if (currentLang == "de") langUrl = "//cdn.datatables.net/plug-ins/1.10.10/i18n/German.json";
    else if (currentLang == "fr") langUrl = "//cdn.datatables.net/plug-ins/1.10.10/i18n/French.json";

    // Datatable init
    var materialsTable = $("#materials .table").DataTable({
        "order": [[ 2, "asc" ]],
        "rowId": "id",
        "select": true,
        "ajax": "materials.json",
        "deferRender": true,
        "fixedHeader": true,
        "pageLength": 25,
        "columns": [
            {
                "data": null,
                "defaultContent": '<button type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>',
                "searchable": false,
                "orderable": false
            },
            { "data": "id", "visible": false },
            { "data": "titel" },
            { "data": "autor", "visible": false },
            {
                "data": "sprachniveau",
                render: { _: 'data', display: 'display' },
            },
            {
                "data": "fertigkeit",
                render: { _: 'data', display: 'display' },
            },
            {
                "data": "fachbezug",
                render: { _: 'data', display: 'display' },
            },
            {
                "data": "ausgangssprache",
                render: { _: 'data', display: 'display' },
            },
            { "data": "spr", "visible": false },
            { "data": "medium", "render": function (data, type, full, meta) { return formatMedium(data) } },
            { "data": "jahr" },
            { "data": "code", "visible": false },
            { "data": "kommentar", "visible": false },
            { "data": "asl", "visible": false },
            { "data": "type", "visible": false }
        ],
        "language": {
            "url": langUrl,
            "loadingRecords": '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%"><span class="sr-only">45% Complete</span></div></div>',
        },
        "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row well'<'col-sm-5'i><'col-sm-7'p>>",
    });

    // Chosen init
    $(".js-chosen").chosen({width: "95%"}).change(function () {
        materialsTable.draw();
    });

    // On click
    $('#materials .table tbody').on( 'click', 'button', function () {
        var data = materialsTable.row( $(this).parents('tr') ).data();
        $("#materialModal #titel").html(data.titel);
        $("#materialModal #autor").html(data.autor);
        $("#materialModal #jahr").html(data.jahr);
        $("#materialModal #sprachniveau").html(data.sprachniveau.display);
        $("#materialModal #fertigkeit").html(data.fertigkeit.display);
        $("#materialModal #fachbezug").html(data.fachbezug.display);
        $("#materialModal #ausgangssprache").html(data.ausgangssprache.display);
        $("#materialModal #medium").html(formatMedium(data.medium));
        $("#materialModal #signatur").html(data.code);
        $("#materialModal #beschreibung").html(data.kommentar);
        $("#materialModal").modal("show");
    } );
    $("#fiTheme_chosen").hide();
    $("#fiThemeAll").change(function () {
        $("#fiTheme_chosen").hide();
        materialsTable.draw();
    });
    $("#fiThemeSelect").change(function () {
        $("#fiTheme_chosen").show();
        materialsTable.draw();
    });
})
