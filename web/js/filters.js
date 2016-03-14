$(document).ready(function() {

    $( '.btn-filter' ).click(function() {
        var $i = $(this).find('i');
        if ($i.hasClass('fa-check-square')) {
            $i.removeClass('fa-check-square').addClass('fa-square');
            $(this).removeClass('active');
        }
        else if ($i.hasClass('fa-square')) {
            $i.removeClass('fa-square').addClass('fa-check-square');
            $(this).addClass('active');
        }
        else if ($i.hasClass('fa-circle')) {
            $(this).closest('.panel-body').find('.btn-filter').removeClass('active');
            $(this).closest('.panel-body').find('.btn-filter i.fa-check-circle').removeClass('fa-check-circle').addClass('fa-circle');
            $i.removeClass('fa-circle').addClass('fa-check-circle');
            $(this).addClass('active');
        }
    });

    $('.filter-collapse').on('show.bs.collapse', function () {
      var $chevron = $(this).data('chevron');
      $($chevron).html("<i class='fa fa-chevron-up'></i>");
    });
    $('.filter-collapse').on('hide.bs.collapse', function () {
      var $chevron = $(this).data('chevron');
      $($chevron).html("<i class='fa fa-chevron-down'></i>");
    });
});
