/* global $, CAAFI, CAATA, CAAUI, CAAST */

$(document).ready(function () {
  // init values of filters and then table
  $('#filters-accordion .filter-checkbox').each(function () {
    if ($(this).hasClass('active')) {
      CAAFI.setValues($(this), false)
    }
  })
  CAATA.initTable()

  // behaviour of filters when selecting/deselecting options
  $('#filters-accordion .btn-filter').click(function () {
    if ($(this).hasClass('filter-checkbox')) {
      CAAUI.toggleBox($(this))
    } else {
      CAAUI.checkRadio($(this))
    }
    CAAFI.setValues($(this))
  })

  // select/deselect all options
  $('#filters-accordion a.select-all').click(function () {
    $(this).closest('.panel-body').find('.btn-filter:not(.hidden)').each(function () {
      CAAUI.checkBox($(this))
      CAAFI.setValues($(this))
    })
  })
  $('#filters-accordion a.deselect-all').click(function () {
    $(this).closest('.panel-body').find('.btn-filter:not(.hidden)').each(function () {
      CAAUI.uncheckBox($(this))
      CAAFI.setValues($(this))
    })
  })

  // reset all filters
  $('#filters-accordion a.reset-filters').click(function () {
    $('#filters-accordion .btn-filter.filter-checkbox').each(function () {
      CAAUI.checkBox($(this))
      CAAFI.setValues($(this))
    })
    var radio = $('#filters-accordion .filter-radio-all').first()
    CAAUI.checkRadio(radio)
    CAAFI.setValues(radio)
  })

  // behaviour of buttons to show/hide cols
  $('#filters-accordion .btn-toggle-col').click(function () {
    CAAUI.toggleBox($(this))
    CAATA.toggleCol($(this).data('field') + ':name')
  })

  // behaviour for the search input
  $('#mainSearch').on('keyup', function () {
    CAATA.table.search(this.value)
    CAATA.draw()
  })

  // behaviour of the spr select
  $('#select-spr').chosen().change(function () {
    var val = $('#select-spr').chosen().val()
    CAAFI.setSpr(val)
    CAATA.table.draw() // use direct draw : speedy
  })

  // behaviour of the info-combi (alert)
  if (CAAST.getItem('caa.unifr.ch.dismissInfoCombi') !== 'true') {
    $('#info-combi').removeClass('hidden')
  }
  $('#info-combi').on('closed.bs.alert', function () {
    CAAST.setItem('caa.unifr.ch.dismissInfoCombi', 'true')
  })
})
