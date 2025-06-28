/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/styles/single.scss":
/*!********************************!*\
  !*** ./src/styles/single.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://webpack/./src/styles/single.scss?");

/***/ }),

/***/ "./src/js/modules/custom-ajax.js":
/*!***************************************!*\
  !*** ./src/js/modules/custom-ajax.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   customAjax: () => (/* binding */ customAjax)\n/* harmony export */ });\nfunction customAjax() {\r\n    jQuery(document).ready(function ($) {\r\n        let flagClick = true;\r\n        $('.tutor__post-likes').each(function () {\r\n            let $button = $(this);\r\n            let postId = $button.data('post-id');\r\n            let cookieKey = 'liked_post_' + postId;\r\n\r\n            if (document.cookie.indexOf(cookieKey + '=1') !== -1) {\r\n                $button.addClass('liked');\r\n            }\r\n\r\n            $button.on('click', function () {\r\n                if (document.cookie.indexOf(cookieKey + '=1') !== -1) {\r\n                    return;\r\n                }\r\n                if(flagClick){\r\n                    $.ajax({\r\n                        url: themeVars.ajaxUrl,\r\n                        method: 'POST',\r\n                        data: {\r\n                            action: 'post_like',\r\n                            post_id: postId\r\n                        },\r\n                        success: function (response) {\r\n                            flagClick = true;\r\n                            if (response.success) {\r\n                                $button.addClass('liked');\r\n                                $button.find('span').text(number_format(response.data.likes));\r\n                                document.cookie = cookieKey + '=1; path=/; max-age=' + (60 * 60 * 24 * 365);\r\n                            } else {\r\n                                $button.removeClass('liked');\r\n                                console.log('Error: ' + response.data);\r\n                            }\r\n                        }\r\n                    });\r\n\r\n                }\r\n\r\n                flagClick = false;\r\n            });\r\n        });\r\n\r\n        function number_format(number, decimals = 0, dec_point = '.', thousands_sep = ',') {\r\n            number = Number(number).toFixed(decimals);\r\n            const parts = number.split('.');\r\n            parts[0] = parts[0].replace(/\\B(?=(\\d{3})+(?!\\d))/g, thousands_sep);\r\n            return parts.join(dec_point);\r\n        }\r\n    })\r\n};\n\n//# sourceURL=webpack://webpack/./src/js/modules/custom-ajax.js?");

/***/ }),

/***/ "./src/js/single.js":
/*!**************************!*\
  !*** ./src/js/single.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _styles_single_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../styles/single.scss */ \"./src/styles/single.scss\");\n/* harmony import */ var _modules_custom_ajax__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/custom-ajax */ \"./src/js/modules/custom-ajax.js\");\n\r\n\r\n\r\n(0,_modules_custom_ajax__WEBPACK_IMPORTED_MODULE_1__.customAjax)();\n\n//# sourceURL=webpack://webpack/./src/js/single.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/js/single.js");
/******/ 	
/******/ })()
;