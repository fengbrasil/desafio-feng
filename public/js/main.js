/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 48);
/******/ })
/************************************************************************/
/******/ ({

/***/ 48:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(49);


/***/ }),

/***/ 49:
/***/ (function(module, exports) {

function setStorage(key, data) {
    localStorage.setItem(key, data);
}

function getStorage(key) {
    return localStorage.getItem(key);
}

function addItem() {
    var amount = $('#amount').val();
    var item = $('#item_id option:selected').val();
    item = JSON.parse(item);

    if (aux = getStorage(item.id)) {
        amount = parseInt(amount) + parseInt(aux);
        $('#item_' + item.id).remove();
    }

    $('#tableItems').append('\n        <tr id="item_' + item.id + '">\n            <td>' + item.name + '</td>\n            <td>' + amount + '</td>\n            <td>' + item.vl_unitary + '</td>\n            <td>' + amount * item.vl_unitary + '</td>\n            <td class="remover" data-id="' + item.id + '">Remover</td>\n        </tr>\n    ');
    setStorage(item.id, amount);
}

$(document).ready(function () {
    localStorage.clear();

    $('#addItem').click(function (e) {
        e.preventDefault();
        addItem();
    });

    $(document).on('click', '.remover', function (e) {
        e.preventDefault();
        var key = $(this).attr('data-id');
        $(this).parent().remove();
        localStorage.removeItem(key);
    });

    $('#storeOrder').click(function (e) {
        e.preventDefault();

        var item = new Array();
        for (i = 0; i < localStorage.length; i++) {
            var key = localStorage.key(i);
            item.push({ 'item_id': key, 'amount': localStorage.getItem(key) });
        }

        var data = {
            'dt_order': $('#dt_order').val(),
            'client_id': $('#client_id').val(),
            "_token": $('#token').val(),
            'item': item
        };

        $.post('/order', data).done(function (result) {
            window.location.href = '/order';
        });
    });
});

/***/ })

/******/ });