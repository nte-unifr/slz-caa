var CAAFI = {
    spr: 'DAF',
    fachbezug: [],
    asl: [],
    sprachniveau: [],
    fertigkeit: [],
    ausgangssprache: [],
    medium: [],
    jahr: 'all',
    setSpr: function(value) {
        CAAFI['spr'] = value;
    },
    setValues: function(el, draw=true) {
        var identifier = el.data('identifier');
        var data = String(el.data('value'));
        var values = data.split(";");

        // we iterate in case there is more than 1 value, eg: Fachbezug
        $.each(values, function( index, value ) {
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
        });
    }
};
