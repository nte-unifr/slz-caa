/* global $, _, CAATA, Translator, CAAFI */

// simple timer used to delay the changes on filter
var typewatch = (function () {
  var timer = 0
  return function (callback, ms) {
    clearTimeout(timer)
    timer = setTimeout(callback, ms)
  }
})()

var translateTerms = function (data, separator, translations, keycase, label, isExport) {
  keycase = typeof keycase !== 'undefined' ? keycase : 'l'
  label = typeof label !== 'undefined' ? label : false
  isExport = typeof isExport !== 'undefined' ? isExport : false
  var result = ''
  var key = ''
  _.each(data, function (i) {
    key = keycase === 'u' ? i.toUpperCase() : i.toLowerCase()
    key = key === 'installed' && !isExport ? '<i class="fa fa-desktop" aria-hidden="true"></i>' : key
    if (result !== '') { result += separator }
    var trans = Translator.trans(key, {}, translations)
    result += label ? '<span class="label label-default">' + trans + '</span>' : trans
  })
  return result
}

var arrayToUpperCase = function (array) {
  _.each(array, function (element, index, tableData) {
    array[index] = element.toUpperCase()
  })
  return array
}

var isRowAllowed = function (tableData, filterData) {
  var intersection = _.intersection(arrayToUpperCase(tableData), arrayToUpperCase(filterData)) // get elements that are in both tables
  return !_.isEmpty(intersection) // we have at least an element
}

window.CAATA = {
  table: null,
  initTable: function () {
    // Get current lang
    var currentLang = $('html').attr('lang')
    var tableEl = $('#materials .table')
    var langUrl = tableEl.data('langen')
    if (currentLang === 'de') langUrl = tableEl.data('langde')
    else if (currentLang === 'fr') langUrl = tableEl.data('langfr')

    // Datatable init
    CAATA.table = tableEl.DataTable({
      'order': [[ 7, 'desc' ], [1, 'asc']],
      'rowId': 'id',
      'select': 'multi',
      'ajax': 'materials.json',
      'deferRender': true,
      'pageLength': 50,
      'scrollX': true,
      'columns': [
        {
          'name': 'id',
          'data': 'id',
          'visible': false
        },
        {
          'name': 'titel',
          'data': 'titel',
          'visible': true,
          'width': '20%'
        },
        {
          'name': 'sprachniveau',
          'data': 'sprachniveau',
          'render': {
            display: function (data, type, full, meta) { return translateTerms(data, ' ', 'sprachniveau', 'u', true) },
            export: function (data, type, full, meta) { return translateTerms(data, ', ', 'sprachniveau', 'u') }
          },
          'visible': true
        },
        {
          'name': 'fertigkeit',
          'data': 'fertigkeit',
          'render': {
            display: function (data, type, full, meta) { return translateTerms(data, ', ', 'fertigkeit') },
            export: function (data, type, full, meta) { return translateTerms(data, ', ', 'fertigkeit') }
          },
          'visible': true
        },
        {
          'name': 'fachbezug',
          'data': 'fachbezug',
          'render': {
            display: function (data, type, full, meta) { return translateTerms(data, ',<br>', 'fachbezug') },
            export: function (data, type, full, meta) { return translateTerms(data, ', ', 'fachbezug') }
          },
          'visible': false
        },
        {
          'name': 'ausgangssprache',
          'data': 'ausgangssprache',
          'render': {
            display: function (data, type, full, meta) { return translateTerms(data, ', ', 'ausgangssprache') },
            export: function (data, type, full, meta) { return translateTerms(data, ', ', 'ausgangssprache') }
          },
          'visible': true,
          'width': '10%'
        },
        {
          'name': 'medium',
          'data': 'medium',
          'render': {
            display: function (data, type, full, meta) { return translateTerms(data, ', ', 'medium') },
            export: function (data, type, full, meta) { return translateTerms(data, ', ', 'medium', 'l', false, true) }
          },
          'visible': false
        },
        {
          'name': 'jahr',
          'data': 'jahr',
          'visible': true
        },
        {
          'name': 'asl',
          'data': 'asl',
          'render': {
            display: function (data, type, full, meta) { return translateTerms(data, ', ', 'asl') },
            export: function (data, type, full, meta) { return translateTerms(data, ', ', 'asl') }
          },
          'visible': false
        },
        {
          'name': 'autor',
          'data': 'autor',
          'visible': false
        },
        {
          'name': 'code',
          'data': 'code',
          'visible': false
        },
        {
          'name': 'ble',
          'data': 'ble',
          'render': {
            display: function(data, type, full, meta) { return Translator.trans(data, {}, 'messages') },
            export: function(data, type, full, meta) { return Translator.trans(data, {}, 'messages') }
          },
          'visible': true
        },
        {
          'name': 'kommentar',
          'data': 'kommentar',
          'visible': true
        },
        {
          'name': 'spr',
          'data': 'spr',
          'render': { display: function (data, type, full, meta) { return translateTerms(data, ',<br>', 'spr', 'u') } },
          'visible': false
        },
        {
          'name': 'install',
          'data': 'install',
          'visible': false
        }
      ],
      'language': {
        'url': langUrl,
        'lengthMenu': '_MENU_'
      },
      'dom': "<'row well'<'col-md-6'i><'col-md-6 text-right'B>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row well'<'col-md-3'l><'col-md-9'p>>",
      'buttons': [
        {
          extend: 'selectNone',
          className: 'btn-actions'
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            modifier: {
              selected: true
            },
            columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ],
            orthogonal: 'export'
          },
          orientation: 'landscape',
          pageSize: 'LEGAL',
          className: 'btn-info btn-actions',
          customize : function(doc) {
            doc.content[1].table.widths = [ '15%', '4%', '7%', '8%', '6%', '5%', '3%', '6%', '6%', '6%', '3%', '31%'];
          }
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            modifier: {
              selected: true
            },
            columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ],
            orthogonal: 'export'
          },
          className: 'btn-info btn-actions'
        },
        {
          extend: 'csvHtml5',
          exportOptions: {
            modifier: {
              selected: true
            },
            columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ],
            orthogonal: 'export'
          },
          className: 'btn-info btn-actions'
        }
      ]
    })

    // Show/hide export buttons if row selected or not
    CAATA.table.on('draw', function () {
      var rows = CAATA.table.rows({ selected: true }).count()
      if (rows < 1) {
        $('.btn-actions').hide()
      }
    })
    CAATA.table.on('select', function (e, dt, type, indexes) {
      var rows = dt.rows({ selected: true }).count()
      if (rows > 0) {
        $('.btn-actions').fadeIn()
      }
    })
    CAATA.table.on('deselect', function (e, dt, type, indexes) {
      var rows = dt.rows({ selected: true }).count()
      if (rows < 1) {
        $('.btn-actions').fadeOut()
      }
    })
  },
  draw: function () {
    typewatch(function () {
      // executed only x ms after the last draw occured call.
      CAATA.table.draw()
    }, 1000)
  },
  toggleCol: function (colName) {
    var col = CAATA.table.column(colName)
    col.visible(!col.visible())
  }
}

// Check each row to filter
$.fn.dataTable.ext.search.push(
  function (settings, searchData, index, rowData, counter) {
    // note : using slice to duplicate arrays
    var tableSpr = rowData['spr'].slice()
    var globalSpr = CAAFI['spr'].slice()

    var tableFachbezug = rowData['fachbezug'].slice()
    var globalFachbezug = CAAFI['fachbezug'].slice()

    var tableAsl = rowData['asl'].slice()
    var globalAsl = CAAFI['asl'].slice()

    var tableSprachniveau = rowData['sprachniveau'].slice()
    var globalSprachniveau = CAAFI['sprachniveau'].slice()

    var tableFertigkeit = rowData['fertigkeit'].slice()
    var globalFertigkeit = CAAFI['fertigkeit'].slice()

    var tableAusgangssprache = rowData['ausgangssprache'].slice()
    // check if uncommon sources is present in the data of table, if yes, simply add a "other" value to match the filter
    var uncommonSources = _.without(arrayToUpperCase(tableAusgangssprache), 'DEUTSCH', 'ENGLISCH', 'FRANZÖSISCH', 'ITALIENISCH', 'SPANISCH')
    if (!_.isEmpty(uncommonSources)) { tableAusgangssprache.push('other') }
    var globalAusgangssprache = CAAFI['ausgangssprache'].slice()

    var tableMedium = rowData['medium'].slice()
    var globalMedium = CAAFI['medium'].slice()

    var tableJahr = rowData['jahr']
    var globalJahr = CAAFI['jahr']

    var tableInstall = rowData['install']
    var globalInstall = CAAFI['install']

    var tableBle = rowData['ble']
    var globalBle = CAAFI['ble']

    if (!_.contains(arrayToUpperCase(tableSpr), globalSpr.toUpperCase())) { return false }
    if (!isRowAllowed(tableFachbezug, globalFachbezug)) {
      return false
    }
    if (!isRowAllowed(tableAsl, globalAsl)) {
      return false
    }
    if (!isRowAllowed(tableSprachniveau, globalSprachniveau)) {
      return false
    }
    if (!isRowAllowed(tableFertigkeit, globalFertigkeit)) {
      return false
    }
    if (!isRowAllowed(tableAusgangssprache, globalAusgangssprache)) {
      return false
    }
    if (!isRowAllowed(tableMedium, globalMedium)) {
      return false
    }
    if (globalJahr !== 'all' && tableJahr < globalJahr) { return false }
    if (globalInstall === true && tableInstall === false) { return false }
    if (globalBle === true && tableBle === false) { return false }

    return true
  }
)
