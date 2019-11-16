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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/css/app.css":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/js/app.js":
/***/ (function(module, exports) {

jQuery(document).ready(function ($) {
    $('[data-toggle=menu]').on('click', function () {
        $('#menu').slideToggle('fast', function () {
            $(this).css('display', 'flex');
        });
    });

    if (jQuery().magnificPopup) {
        $('.magnific').magnificPopup({ type: 'image' });
        $('.magnific').css('cursor', 'pointer');
    }

    if (jQuery().imgLazyLoad) {
        $('img[data-src]').imgLazyLoad({
            container: window,
            effect: 'fadeIn',
            speed: 600,
            delay: 400,
            callback: function callback() {}
        });
    }

    if (jQuery().jcarousel) {
        $('.jcarousel').jcarousel({
            wrap: 'circular'
        });

        $('.jcarousel').jcarouselAutoscroll({
            target: '+=3',
            interval: 4000,
            autostart: true
        });

        $('.carousel-clip').jcarousel({
            vertical: true,
            wrap: 'circular'
        });

        $('.carousel-prev').jcarouselControl({
            target: '-=4'
        });

        $('.carousel-next').jcarouselControl({
            target: '+=4'
        });
    }
});

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/js/app.js");
module.exports = __webpack_require__("./resources/css/app.css");


/***/ })

/******/ });