$( ".btn-filter" ).click(function() {
    var i = $(this).find("i");
    if (i.hasClass("fa-check-square")) {
        i.removeClass('fa-check-square').addClass('fa-square-o');
    }
    else {
        i.removeClass('fa-square-o').addClass('fa-check-square');
    }
});
