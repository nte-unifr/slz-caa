var CAATA = {
    table: null,
    initTable: function() {
        // Get current lang
        var currentLang = $("html").attr("lang");
        var langUrl = "//cdn.datatables.net/plug-ins/1.10.10/i18n/English.json";
        if (currentLang == "de") langUrl = "//cdn.datatables.net/plug-ins/1.10.10/i18n/German.json";
        else if (currentLang == "fr") langUrl = "//cdn.datatables.net/plug-ins/1.10.10/i18n/French.json";

        // Datatable init
        CAATA.table = $('#materials .table').DataTable({
            'order': [[ 2, 'asc' ]],
            'rowId': 'id',
            'select': true,
            'ajax': 'materials.json',
            'deferRender': true,
            'fixedHeader': true,
            'pageLength': 25,
            'columns': [
                { 'data': 'id', 'visible': false },
                {
                    'data': null,
                    'defaultContent': '<button type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>',
                    'searchable': false,
                    'orderable': false
                },
                { 'data': 'titel' },
                {
                    'data': 'spr',
                    'render': { display: function (data, type, full, meta) { return translateTerms(data, ',<br>', 'spr', 'u') } }
                },
                {
                    'data': 'fachbezug',
                    'render': { display: function (data, type, full, meta) { return translateTerms(data, ',<br>', 'fachbezug') } }
                },
                {
                    'data': 'asl',
                    'render': { display: function (data, type, full, meta) { return translateTerms(data, ', ', 'asl') } }
                },
                {
                    'data': 'sprachniveau',
                    'render': { display: function (data, type, full, meta) { return translateTerms(data, ' ', 'sprachniveau', 'u', true) } }
                },
                {
                    'data': 'fertigkeit',
                    'render': { display: function (data, type, full, meta) { return translateTerms(data, ', ', 'fertigkeit') } }
                },
                {
                    'data': 'ausgangssprache',
                    'render': { display: function (data, type, full, meta) { return translateTerms(data, ', ', 'ausgangssprache') } }
                },
                {
                    'data': 'medium',
                    'render': { display: function (data, type, full, meta) { return translateTerms(data, '', 'medium') } }
                },
                { 'data': 'jahr' },
                { 'data': 'autor', 'visible': false },
                { 'data': 'code', 'visible': false },
                { 'data': 'kommentar', 'visible': false }
            ],
            'language': {
                'url': langUrl,
                'loadingRecords': '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%"><span class="sr-only">45% Complete</span></div></div>',
            },
            'dom': "<'row well'<'col-sm-6'l i><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row well'<'col-sm-5'l i><'col-sm-7'p>>",
        });
    }
};

var CAAFI = {
    spr: [],
    fachbezug: [],
    asl: [],
    sprachniveau: [],
    fertigkeit: [],
    ausgangssprache: [],
    medium: [],
    jahr: 'all'
};

var translateTerms = function(data, separator, translations, keycase='l', label=false) {
    var result = '';
    var key = '';
    _.each(data, function(i) {
        key = keycase == 'u' ? i.toUpperCase() : i.toLowerCase();
        result = (result == '') ? result : result+separator;
        result += label ? '<span class="label label-default">' : '';
        result += Translator.trans(key, {}, translations);
        result += label ? '</span>' : '';
    });
    return result;
}

var arrayToUpperCase = function(array) {
    _.each(array, function(element, index, tableData) {
        array[index] = element.toUpperCase();
    });
    return array;
}

var isRowAllowed = function(tableData, filterData, wildcard) {
    wildcard = typeof wildcard !== 'undefined' ? wildcard.toUpperCase() : null; // define wildcard if not set
    var intersection = _.intersection(arrayToUpperCase(tableData), arrayToUpperCase(filterData)); // get elements that are in both tables
    return !_.isEmpty(intersection) || _.contains(filterData, wildcard); // we have at least an element or filter is set to wildcard
}

// Check each row to filter
$.fn.dataTable.ext.search.push(
    function(settings, searchData, index, rowData, counter) {

        var tableSpr = rowData['spr'].slice();
        var globalSpr = CAAFI['spr'].slice();

        var tableFachbezug = rowData['fachbezug'].slice();
        var globalFachbezug = CAAFI['fachbezug'].slice();
        globalFachbezug[_.indexOf(globalFachbezug, 'no')] = ""; // replace 'no particular theme' with actual value of nothing

        var tableAsl = rowData['asl'].slice();
        var globalAsl = CAAFI['asl'].slice();

        var tableSprachniveau = rowData['sprachniveau'].slice();
        var globalSprachniveau = CAAFI['sprachniveau'].slice();

        var tableFertigkeit = rowData['fertigkeit'].slice();
        var globalFertigkeit = CAAFI['fertigkeit'].slice();

        var tableAusgangssprache = rowData['ausgangssprache'].slice();
        // check if uncommon sources is present in the data of table, if yes, simply add a "other" value to match the filter
        var uncommonSources = _.without(arrayToUpperCase(tableAusgangssprache), "DEUTSCH", "ENGLISCH", "FRANZÖSISCH", "ITALIENISCH", "SPANISCH");
        if (!_.isEmpty(uncommonSources)) { tableAusgangssprache.push("other"); }
        var globalAusgangssprache = CAAFI['ausgangssprache'].slice();

        var tableMedium = rowData['medium'].slice();
        var globalMedium = CAAFI['medium'].slice();

        var tableJahr = rowData['jahr'];
        var globalJahr = CAAFI['jahr'];

        if (!isRowAllowed(tableSpr, globalSpr)) { return false; }
        if (!isRowAllowed(tableFachbezug, globalFachbezug, 'no')) { return false; }
        if (!isRowAllowed(tableAsl, globalAsl)) { return false; }
        if (!isRowAllowed(tableSprachniveau, globalSprachniveau)) { return false; }
        if (!isRowAllowed(tableFertigkeit, globalFertigkeit)) { return false; }
        if (!isRowAllowed(tableAusgangssprache, globalAusgangssprache)) { return false; }
        if (!isRowAllowed(tableMedium, globalMedium)) { return false; }
        if (globalJahr != 'all' && tableJahr < globalJahr) { return false; }

        return true;
    }
)


$(document).ready(function() {

    // On click
    $('#materials .table tbody').on( 'click', 'button', function () {
        var data = CAAFI.materialsTable.row( $(this).parents('tr') ).data();
        console.log(data.ausgangssprache);
        $('#materialModal #titel').html(data.titel);
        $('#materialModal #autor').html(data.autor);
        $('#materialModal #jahr').html(data.jahr);
        $('#materialModal #sprachniveau').html(data.sprachniveau.display);
        $('#materialModal #fertigkeit').html(data.fertigkeit.display);
        $('#materialModal #fachbezug').html(data.fachbezug.display);
        $('#materialModal #ausgangssprache').html(data.ausgangssprache);
        $('#materialModal #medium').html(data.medium.display);
        $('#materialModal #signatur').html(data.code);
        $('#materialModal #beschreibung').html(data.kommentar);
        $('#materialModal').modal('show');
    } );
})
