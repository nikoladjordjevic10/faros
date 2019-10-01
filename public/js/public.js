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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/public.js":
/*!********************************!*\
  !*** ./resources/js/public.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Admin Panel - Adding dynamic text to custom file input fields 
$(document).ready(function () {
  $('#image').on("change", function (e) {
    var files = $(this)[0].files;

    if (files.length >= 2 && files.length < 5) {
      var allFiles = [];

      for (i = 0; i < files.length; i++) {
        allFiles[i] = files[i].name;
      }

      allFilesList = allFiles.toString().replace(/,/g, "; ");
      $('.custom-text-label').text(allFilesList);
    } else if (files.length >= 5) {
      $('.custom-text-label').text(files.length + " files selected");
    } else {
      var filename = e.target.value.split('\\').pop();
      $('.custom-text-label').text(filename);
    }
  });
}); // Slideshow

$(document).ready(function () {
  $('.previous').on('click', function () {
    $('#img_' + currentImage).stop().fadeOut(1);
    decreaseImage();
    $('#img_' + currentImage).stop().fadeIn(1).attr('style', 'display: flex;');
  });
  $('.next').on('click', function () {
    $('#img_' + currentImage).stop().fadeOut(1);
    increaseImage();
    $('#img_' + currentImage).stop().fadeIn(1).attr('style', 'display: flex;');
  });
  var currentImage = 1;
  var totalImages = 3;

  function increaseImage() {
    ++currentImage;

    if (currentImage > totalImages) {
      currentImage = 1;
    }
  }

  function decreaseImage() {
    --currentImage;

    if (currentImage < 1) {
      currentImage = totalImages;
    }
  } // window.setInterval(function() {
  //   $('.next').click();
  // }, 10000);

});
$(document).ready(function () {
  $(window).resize(function () {
    $(".imageBig img").css("transform", "translateX(0px)");
  });
  $(".imagesNav").on('click', 'img', function () {
    var indexImg = $(this).parent().index();
    var imgWidth = $(".imageBig img").width() + 16;
    $(".imageBig img").css("transform", "translateX(" + indexImg * -imgWidth + "px)"); // $(".imageBig img").eq(newImage).addClass("opaque");

    $(".imagesNav img").removeClass("selected");
    $(this).addClass("selected");
  });
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/public.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\faros\resources\js\public.js */"./resources/js/public.js");


/***/ })

/******/ });