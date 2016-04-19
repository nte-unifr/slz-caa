var storageAvailable = function(type) {
    try {
		var storage = window[type],
			x = '__storage_test__';
		storage.setItem(x, x);
		storage.removeItem(x);
		return true;
	}
	catch(e) {
		return false;
	}
}

var CAAST = {

    setItem: function(key, value) {
        if (storageAvailable('localStorage')) {
            localStorage.setItem(key, value);
        }
    },
    getItem: function(key) {
        if (storageAvailable('localStorage')) {
            return localStorage.getItem(key);
        }
    }
}
