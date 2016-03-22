// simple timer used to delay the changes on filter
var typewatch = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

var filterChange = function(el, radio=false, draw=true) {
    var identifier = el.data('identifier');
    var value = el.data('value');

    if (radio) {
        CAAFI[identifier] = value;
    }
    else {
        if (el.hasClass('active')) {
            CAAFI[identifier].push(value);
        }
        else {
            CAAFI[identifier] = _.without(CAAFI[identifier], value);
        }
    }

    if (draw) {
        typewatch(function () {
            // executed only x ms after the last filterChange call.
            CAATA.table.draw();
        }, 1000);
    }
};

// change the appearance of the checkbox on click
var checkBox = function(el, force) {
    if (force === undefined) {
        if (el.hasClass('active')) {
            el.removeClass('active');
            el.find('i.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
        }
        else {
            el.addClass('active');
            el.find('i.fa-square').removeClass('fa-square').addClass('fa-check-square');
        }
    }
    else if (force) {
        el.addClass('active');
        el.find('i.fa-square').removeClass('fa-square').addClass('fa-check-square');
    }
    else if (!force) {
        el.removeClass('active');
        el.find('i.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
    }
    filterChange(el);
};

// change the appearance of radio on click
var checkRadio = function(el) {
    el.closest('.panel-body').find('.btn-filter').each(function() {
        $(this).removeClass('active');
        $(this).find('i.fa-check-circle').removeClass('fa-check-circle').addClass('fa-circle');
    });
    el.find('i.fa-circle').removeClass('fa-circle').addClass('fa-check-circle');
    el.addClass('active');
    filterChange(el, true);
};

$(document).ready(function() {

    // init values of filters and then table
    $('#filters-accordion .filter-checkbox').each(function() {
        if ($(this).hasClass("active")) {
            filterChange($(this), false, false);
        }
    });
    CAATA.initTable();

    // behaviour of buttons when selecting/deselecting options
    $('#filters-accordion .btn-filter').click(function() {
        if ($(this).hasClass('filter-checkbox')) {
            checkBox($(this));
        }
        else if ($(this).hasClass('filter-radio')) {
            checkRadio($(this));
        }
    });

    // select/deselect all options
    $('#filters-accordion a.select-all').click(function() {
        $(this).closest('.panel-body').find('.btn-filter:not(.hidden)').each(function() {
            checkBox($(this), true);
        });
    });
    $('#filters-accordion a.deselect-all').click(function() {
        $(this).closest('.panel-body').find('.btn-filter:not(.hidden)').each(function() {
            checkBox($(this), false);
        });
    });

    // show more/less options
    $('#filters-accordion a.show-more').click(function() {
        if ($(this).data("status") == "more") {
            $(this).closest('.panel-body').find('.btn-filter.hidden-default').removeClass('hidden');
            $(this).html('<i class="fa fa-minus-circle"></i> less');
            $(this).data("status", "less");
        }
        else {
            $(this).closest('.panel-body').find('.btn-filter.hidden-default').each(function() {
                $(this).addClass('hidden');
                checkBox($(this), false);
            });
            $(this).html('<i class="fa fa-plus-circle"></i> more');
            $(this).data("status", "more");
        }
    });

    // change chevron when opening/closing a filter panel
    $('#filters-accordion .filter-collapse').on('show.bs.collapse', function () {
        var $chevron = $(this).data('chevron');
        $($chevron).html("<i class='fa fa-chevron-up'></i>");
        $($chevron).closest('.panel-heading').css('cursor', 'n-resize');
    });
    $('#filters-accordion .filter-collapse').on('hide.bs.collapse', function () {
        var $chevron = $(this).data('chevron');
        $($chevron).html("<i class='fa fa-chevron-down'></i>");
        $($chevron).closest('.panel-heading').css('cursor', 's-resize');
    });
});
