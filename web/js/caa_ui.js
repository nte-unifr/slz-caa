/* global $ */

window.CAAUI = {
  toggleBox: function (el) {
    if (el.hasClass('active')) {
      el.removeClass('active')
      el.find('i.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
    } else {
      el.addClass('active')
      el.find('i.fa-square').removeClass('fa-square').addClass('fa-check-square')
    }
  },
  checkBox: function (el) {
    el.addClass('active')
    el.find('i.fa-square').removeClass('fa-square').addClass('fa-check-square')
  },
  uncheckBox: function (el) {
    el.removeClass('active')
    el.find('i.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
  },
  checkRadio: function (el) {
    el.closest('.panel-body').find('.btn-filter').each(function () {
      $(this).removeClass('active')
      $(this).find('i.fa-check-circle').removeClass('fa-check-circle').addClass('fa-circle')
    })
    el.find('i.fa-circle').removeClass('fa-circle').addClass('fa-check-circle')
    el.addClass('active')
  }
}

$(document).ready(function () {
  // change chevron when opening/closing a filter panel
  $('#filters-accordion .filter-collapse').on('show.bs.collapse', function () {
    var $chevron = $(this).data('chevron')
    $($chevron).html("<i class='fa fa-chevron-up'></i>")
    $($chevron).closest('.panel-heading').css('cursor', 'n-resize')
  })
  $('#filters-accordion .filter-collapse').on('hide.bs.collapse', function () {
    var $chevron = $(this).data('chevron')
    $($chevron).html("<i class='fa fa-chevron-down'></i>")
    $($chevron).closest('.panel-heading').css('cursor', 's-resize')
  })

  // use chosen for the spr select
  $('#select-spr').chosen()
})
