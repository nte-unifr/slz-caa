var storageAvailable = function (type) {
  try {
    var storage = window[type]
    var x = '__storage_test__'
    storage.setItem(x, x)
    storage.removeItem(x)
    return true
  } catch (e) {
    return false
  }
}

window.CAAST = {
  setItem: function (key, value) {
    if (storageAvailable('localStorage')) {
      window.localStorage.setItem(key, value)
    }
  },
  getItem: function (key) {
    if (storageAvailable('localStorage')) {
      return window.localStorage.getItem(key)
    }
  }
}
