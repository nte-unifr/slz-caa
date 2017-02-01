/* global $, _, CAATA, CAAFI */

window.CAAFI = {
  spr: 'DAF',
  fachbezug: [],
  asl: [],
  sprachniveau: [],
  fertigkeit: [],
  ausgangssprache: [],
  medium: [],
  jahr: 'all',
  install: false,
  setSpr: function (value) {
    CAAFI['spr'] = value
  },
  setValues: function (el, draw) {
    draw = typeof draw !== 'undefined' ? draw : true
    var identifier = el.data('identifier')
    var data = String(el.data('value'))
    var values = data.split(';')

    // we iterate in case there is more than 1 value, eg: Fachbezug
    $.each(values, function (index, value) {
      if (identifier === 'jahr') {
        CAAFI[identifier] = value
      } else if (identifier === 'install') {
        CAAFI[identifier] = !CAAFI[identifier]
      } else {
        if (el.hasClass('active')) {
          CAAFI[identifier].push(value)
        } else {
          CAAFI[identifier] = _.without(CAAFI[identifier], value)
        }
      }

      if (draw) {
        CAATA.draw()
      }
    })
  }
}
