var CAAFI = {
    spr: [],
    fachbezug: [],
    asl: [],
    sprachniveau: [],
    fertigkeit: [],
    ausgangssprache: [],
    medium: [],
    jahr: 'all',
    setValues: function(el, draw=true) {
        var identifier = el.data('identifier');
        var value = el.data('value');

        if (el.hasClass('active')) {
            if (el.hasClass('filter-checkbox')) {
                CAAFI[identifier].push(value);
            }
            else {
                CAAFI[identifier] = value;
            }
        }
        else {
            CAAFI[identifier] = _.without(CAAFI[identifier], value);
        }

        if (draw) {
            CAATA.draw();
        }
    }
};
