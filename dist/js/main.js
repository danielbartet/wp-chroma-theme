(self["webpackChunkiDrop"] = self["webpackChunkiDrop"] || []).push([[792],{

/***/ 253:
/***/ (() => {

"use strict";


// Utility Functions
function debounce(func, wait, immediate) {
  var timeout;
  return function () {
    var context = this,
      args = arguments;
    var later = function later() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}
function ForEach(collection, callBack) {
  for (var i = 0, l = collection.length; i < l; i++) {
    callBack(collection[i]);
  }
}

// DOM Manipulation functions
function isAdjacent(elem1, elem2) {
  var e1 = document.querySelectorAll(elem1)[0],
    elemNext = document.querySelectorAll(elem1 + " + " + elem2)[0];
  if (e1 && e1.nextSibling && e1.nextSibling.textContent.trim().length) {
    return e1.nextSibling === elemNext;
  } else {
    return e1 && e1.nextElementSibling === elemNext;
  }
}

// User Experience Functions
function menuNavigation() {
  var menuButtons = document.getElementsByClassName('hamburger'),
    backDropStyle = null;
  Array.prototype.forEach.call(menuButtons, function (e) {
    e.addEventListener('click', function () {
      if (backDropStyle == null) {
        backDropStyle = document.createElement('link');
        backDropStyle.href = '/wp-content/themes/chroma/dist/css/mobile-menu-background.css';
        backDropStyle.type = "text/css";
        backDropStyle.rel = "stylesheet";
        backDropStyle.media = "all";
        document.getElementsByTagName("head")[0].appendChild(backDropStyle);
      }
      var overlayMenu = document.getElementById('overlay-menu');
      Array.prototype.forEach.call(menuButtons, function (btn) {
        btn.classList.toggle('is-active');
      });
      overlayMenu.classList.toggle('overlay-menu-animation');
      document.body.classList.toggle('noscroll');
      document.documentElement.classList.toggle('noscroll');
      var navOpeners = overlayMenu.querySelectorAll('nav, .nav-social-portals');
      Array.prototype.forEach.call(navOpeners, function (el) {
        el.classList.toggle('open');
      });
      var menuStops = overlayMenu.querySelectorAll('nav li, .nav-social-portals');
      Array.prototype.forEach.call(menuStops, function (el) {
        el.classList.toggle('menu-li-stop');
      });
      document.getElementById('main-nav-cont').classList.toggle('main-nav-hide');
    });
  });
}

// Main Function
function main() {
  //Navigation
  menuNavigation();
  // More initialization code...
}

// Event Listener for DOMContentLoaded
function ready(fn) {
  if (document.readyState !== 'loading') {
    fn();
  } else if (document.addEventListener) {
    document.addEventListener('DOMContentLoaded', fn);
  } else {
    document.attachEvent('onreadystatechange', function () {
      if (document.readyState !== 'loading') fn();
    });
  }
}
ready(main);

/***/ }),

/***/ 617:
/***/ (() => {

"use strict";


function lazyLoadController(images) {
  function lazyLoadExecution(images) {
    images.forEach(function (image) {
      if (inView(image)) {
        lazyLoadImage(image);
        image.classList.remove('llreplace');
      }
    });
  }
  function inView(image) {
    var rect = image.getBoundingClientRect();
    return rect.top >= 0 && rect.left >= -100 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) + 620 && rect.right <= (window.innerWidth || document.documentElement.clientWidth) + 2640;
  }
  function lazyLoadImage(image) {
    if (image.getAttribute('data-srcset')) {
      image.setAttribute('srcset', image.getAttribute('data-srcset'));
      image.removeAttribute('data-srcset');
    }
    if (image.getAttribute('data-src')) {
      image.setAttribute('src', image.getAttribute('data-src'));
      image.removeAttribute('data-src');
    }
    image.classList.add('reveal');
  }

  // Agregar escucha de eventos aquí si es necesario, o asegurarse de que se llame a esta función correctamente
  window.addEventListener('scroll', function () {
    return lazyLoadExecution(images);
  });
  lazyLoadExecution(images); // Ejecutar inicialmente
}
document.addEventListener('DOMContentLoaded', function () {
  var allImages = document.getElementsByClassName('llreplace');
  console.log('Imágenes capturadas:', allImages.length);
  if (allImages.length > 0) {
    lazyLoadController(allImages);
  }
});

/***/ }),

/***/ 187:
/***/ (() => {

"use strict";


document.addEventListener("DOMContentLoaded", function () {
  'use strict';

  var socialShareMaster = function socialShareMaster() {
    var _this = this;
    //cache nodes and resources
    var socialButtons = document.querySelectorAll('.share-button'),
      postId = function () {
        try {
          //let bClass = Array.prototype.join.call(document.body.classList, ' ')
          var _bClass = document.body.classList ? Array.prototype.join.call(document.body.classList, ' ') : '';
          return _bClass.match(/postid-[0-9]*/g)[0].split('-')[1];
        } catch (err) {
          return null;
        }
      }();
    if (!(socialButtons.length > 0)) return;
    var shareTypeMsg = 'no type',
      shareThisUrl = null,
      selfRef = this;
    var linkLocation = encodeURIComponent(window.location.href),
      linkTitle = encodeURIComponent(document.title);
    if (document.getElementsByClassName('email-share').length > 0) document.getElementsByClassName('email-share')[0].href = 'mailto:?subject=' + linkTitle + '&body=' + linkLocation;
    for (var _i = 0, _l = socialButtons.length; _i < _l; _i++) {
      if (socialButtons[_i].getAttribute('data-has-listener') == null) {
        socialButtons[_i].addEventListener('click', function (event) {
          var hasOverride = this.parentNode.getAttribute('data-url-override');
          linkLocation = doesExist(hasOverride) ? encodeURIComponent(hasOverride) : encodeURIComponent(window.location.href);
          linkTitle = doesExist(hasOverride) ? encodeURIComponent(this.parentNode.getAttribute('data-title-override')) : encodeURIComponent(document.title);
          event.preventDefault();
          selfRef.shareRouter(this.getAttribute('data-share'));
        });
        socialButtons[_i].setAttribute('data-has-listener', 'true');
      }
    }
    var closeFlag = true;
    this.closeButtonToggle = function (e) {
      if (closeFlag) {
        document.getElementById('msc').addEventListener('click', function () {
          e.classList.toggle('is_active');
          document.documentElement.classList.toggle('noscroll');
        });
        closeFlag = false;
      }
    };
    this.feedbackMsg = function (msg) {
      var copyConfirm = document.createElement('div');
      copyConfirm.classList = 'copyconfirm box-shadow-nohover';
      copyConfirm.innerHTML = msg;
      document.body.appendChild(copyConfirm);
      setTimeout(function () {
        copyConfirm.remove();
      }, 850);
    };
    this['facebook'] = function () {
      shareThisUrl = 'https://www.facebook.com/sharer.php?u=' + linkLocation + '&amp;t=' + linkTitle, shareTypeMsg = 'Facebook';
    };
    this['twitter'] = function () {
      shareThisUrl = "https://twitter.com/intent/tweet?text=".concat(linkTitle, "&url=").concat(linkLocation);
      shareTypeMsg = 'Twitter';
    };
    this['email'] = function () {
      shareTypeMsg = 'Email';
      setTimeout(function () {
        window.location = document.getElementsByClassName('email-share')[0].href;
      }, 170);
      shareThisUrl = null;
    };
    this['reddit'] = function () {
      shareThisUrl = "https://www.reddit.com/submit?url='".concat(linkLocation);
      shareTypeMsg = 'Reddit';
    };
    this['flipboard'] = function () {
      shareThisUrl = 'https://share.flipboard.com/bookmarklet/popout?v=2' + '&title=' + linkTitle + '&url=' + linkLocation + '&utm_campaign=tools&utm_medium=article-share&utm_source=www.idropnews.com&t=' + Date.now();
      shareTypeMsg = 'Flipboard';
    };
    this['copylink'] = function () {
      var urlInput = document.createElement('input');
      urlInput.setAttribute('value', decodeURIComponent(linkLocation));
      urlInput.setAttribute('style', 'opacity: 0; position: absolute; top: 0px; z-index: -100; transform: translateX(-100vw);');
      document.body.appendChild(urlInput);
      urlInput.select();
      document.execCommand('copy');
      urlInput.remove();
      _this.feedbackMsg('Copied to clipboard.');
      shareThisUrl = null;
      shareTypeMsg = 'Copy Link';
    };
    this['more'] = function () {
      var moreSharing = document.getElementById('more-sharing');
      if (doesExist(moreSharing) === false) throw " No other sharing options are available.";
      moreSharing.classList.toggle('is_active');
      if (moreSharing.getAttribute('data-focus') == 'true') {
        moreSharing.setAttribute('data-focus', 'false');
        moreSharing.blur();
      } else {
        moreSharing.setAttribute('data-focus', 'true');
        moreSharing.focus();
      }
      document.documentElement.classList.toggle('noscroll');
      _this.closeButtonToggle(moreSharing);
      shareThisUrl = null;
      shareTypeMsg = 'More';
    };
    this['linkedin'] = function () {
      shareThisUrl = "https://www.linkedin.com/shareArticle?mini=true&url=".concat(linkLocation, "&title=").concat(linkTitle);
      shareTypeMsg = 'Linked In';
    };
    this['pinterest'] = function () {
      shareThisUrl = "https://www.pinterest.com/pin/create/bookmarklet/?url=".concat(linkLocation, "&media=").concat(encodeURIComponent(document.querySelector('meta[property="og:image"]').content), "&description=").concat(linkTitle);
      shareTypeMsg = 'Pinterest';
    };
    this['pocket'] = function () {
      shareThisUrl = "https://getpocket.com/save?url=".concat(linkLocation);
      shareTypeMsg = 'Pocket';
    };
    this['line'] = function () {
      shareThisUrl = "https://lineit.line.me/share/ui?url=".concat(linkLocation, "&text=").concat(linkTitle);
      shareTypeMsg = 'line';
    };
    this['print'] = function () {
      var moreSharing = document.getElementById('more-sharing');
      moreSharing.classList.toggle('is_active');
      window.print();
      shareThisUrl = null;
      shareTypeMsg = 'Print';
    };
    this['messenger'] = function () {
      if (!/Mobi|Android/i.test(navigator.userAgent)) {
        shareThisUrl = null;
        _this.feedbackMsg("Messenger is only available on mobile devices.");
        return;
      }
      if (!(chromaApp.fbAppID > 0)) {
        shareThisUrl = null;
        _this.feedbackMsg("API Uunavailable.");
        return;
      }
      shareThisUrl = "fb-messenger://share?link=".concat(linkLocation, "&app_id=").concat(encodeURIComponent(chromaApp.fbAppID));
      shareTypeMsg = 'FB Messenger';
    };
    this['whatsapp'] = function () {
      if (!/Mobi|Android/i.test(navigator.userAgent)) {
        shareThisUrl == null;
        _this.feedbackMsg("WhatsApp is only available on mobile devices.");
        return;
      }
      shareThisUrl = 'whatsapp://send?text=' + linkTitle + '%20' + linkLocation;
      shareTypeMsg = 'Whatsapp';
    };
    this['comment'] = function () {
      if (typeof ct == 'undefined') _this.feedbackMsg("Comments are currently unavailable.");else {
        ct.createCommentComponent();
        [].forEach.call(document.querySelectorAll('.comments_overlay, #comments'), function (e) {
          e.classList.toggle('is-active');
        });
        document.documentElement.classList.remove('noscroll');
        document.getElementById('more-sharing').classList.remove('is_active');
      }
      shareThisUrl = null;
      shareTypeMsg = 'Comment';
    };
    this.shareRouter = function (shareType) {
      try {
        //execute input function
        _this[shareType]();
        //execute window
        if (shareThisUrl != null) window.open(shareThisUrl, '_blank');
        //execute analytics
        if (window._gaq && window._gaq._getTracker) ga('send', 'socialShare', "".concat(shareTypeMsg, " social click"), linkLocation);
        var dataLayer = dataLayer || [];
        if (typeof dataLayer != 'undefined') {
          dataLayer.push({
            'event': {
              'eventName': 'socialShare',
              'shareType': "".concat(shareTypeMsg, " social click"),
              'originURL': linkLocation
            }
          });
          socialEvent("_".concat(shareTypeMsg.replace(' ', '_').toLowerCase(), "_click"), postId);
        }
      } catch (err) {
        _this.feedbackMsg('There was a problem sharing this content.' + err);
      }
    };
  };
  var socialEvent = function socialEvent() {
    var name = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
    var postID = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    if (name === null || name === '' || postID === null || postID === '') return;
    var dataBody = {
        name: name,
        postID: postID
      },
      formOptions = {
        method: 'post',
        headers: {
          'Content-type': 'application/json'
        },
        body: JSON.stringify(dataBody)
      },
      eventUrl = location.protocol + '//' + window.location.hostname + '/wp-json/chroma/cmevents/';
    fetch(eventUrl, formOptions).then(function (response) {
      return response.text();
    }).then(function (text) {
      console.log(formOptions.body + " | " + text);
    })["catch"](function (error) {
      return console.log('Event Error: ' + error);
    });
  };

  //Log a post view
  (function () {
    var postId = function () {
      try {
        //let bClass = Array.prototype.join.call(document.body.classList, ' ')
        var _bClass2 = document.body.classList ? Array.prototype.join.call(document.body.classList, ' ') : '';
        return _bClass2.match(/postid-[0-9]*/g)[0].split('-')[1];
      } catch (err) {
        return null;
      }
    }();
    if (doesExist(postId)) socialEvent('post_views', postId);
  })();
});

/***/ }),

/***/ 759:
/***/ (() => {

"use strict";


//init state
var initState = {
  commentStatus: false,
  commentAnimate: false
};
//store
var store = Redux.createStore(commentsTracker, initState);
function render() {
  console.log(store.getState().commentStatus);
  var renderState = store.getState();
}
store.subscribe(render);

//reducer
function commentsTracker(currentState, action) {
  var nextState = {
    commentStatus: currentState.commentStatus
  };
  switch (action.type) {
    case 'commentOn':
      nextState.commentStatus = true;
      return nextState;
      break;
    default:
      return currentState;
  }
}
//action handlers
// [].forEach.call(document.querySelectorAll('button[data-share="comment"]'), (e) => {
//   e.addEventListener('click', (ev) => {
//     store.dispatch({
//       type : 'commentOn'
//     })
//   })
// })

/***/ }),

/***/ 798:
/***/ ((__unused_webpack_module, __unused_webpack___webpack_exports__, __webpack_require__) => {

"use strict";

;// CONCATENATED MODULE: ./node_modules/@babel/runtime/helpers/esm/interopRequireDefault.js
function _interopRequireDefault(obj) {
  return obj && obj.__esModule ? obj : {
    "default": obj
  };
}
;// CONCATENATED MODULE: ./src/js/ui/chroma-scroll-anchors.js


var _classCallCheck2 = __webpack_require__(383);
var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);
var _createClass2 = __webpack_require__(579);
var _createClass3 = _interopRequireDefault(_createClass2);

document.addEventListener("DOMContentLoaded", function () {
  'use strict';

  var scrollAnchors = /*#__PURE__*/function () {
    function scrollAnchors() {
      (0, _classCallCheck3["default"])(this, scrollAnchors);
      this.scrollFD = window.scroll;
      this.mobileOffset = window.matchMedia("(max-width: 414px)").matches ? 336 : 90;
      this.scrollOffset = window.innerHeight / 1.05 - 115 - this.mobileOffset;
    }
    return (0, _createClass3["default"])(scrollAnchors, [{
      key: "init",
      value: function init() {
        var _this = this;
        if (this.scrollFD != null && typeof this.scrollFD != 'undefined') {
          var _aLinks = document.querySelectorAll('.anchor-nav__a, #contentmap a');
          //convert white spaces in a[Names]
          [].forEach.call(document.querySelectorAll('a[name]'), function (e) {
            e.setAttribute('name', e.getAttribute('name').replace(' ', "%20"));
          });
          if (_aLinks.length < 1) return;
          [].forEach.call(_aLinks, function (e) {
            e.addEventListener('click', function (ev) {
              ev.preventDefault();
              var topValue = document.querySelector("a[name=\"".concat(e.getAttribute('href').replace('#', ''), "\"]")).offsetTop + _this.scrollOffset;
              window.scroll({
                top: topValue,
                behavior: "smooth"
              });
            });
          });
        }
      }
    }]);
  }();
});

/***/ }),

/***/ 383:
/***/ ((module) => {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}
module.exports = _classCallCheck, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ 579:
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var toPropertyKey = __webpack_require__(736);
function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, toPropertyKey(descriptor.key), descriptor);
  }
}
function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  Object.defineProperty(Constructor, "prototype", {
    writable: false
  });
  return Constructor;
}
module.exports = _createClass, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ 45:
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var _typeof = (__webpack_require__(738)["default"]);
function toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
module.exports = toPrimitive, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ 736:
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var _typeof = (__webpack_require__(738)["default"]);
var toPrimitive = __webpack_require__(45);
function toPropertyKey(t) {
  var i = toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
module.exports = toPropertyKey, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ 738:
/***/ ((module) => {

function _typeof(o) {
  "@babel/helpers - typeof";

  return (module.exports = _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, module.exports.__esModule = true, module.exports["default"] = module.exports), _typeof(o);
}
module.exports = _typeof, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__(617), __webpack_exec__(187), __webpack_exec__(798), __webpack_exec__(759), __webpack_exec__(253));
/******/ }
]);