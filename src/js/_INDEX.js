"use strict";

// Utility Functions
function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this, args = arguments;
    var later = function() {
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
  Array.prototype.forEach.call(menuButtons, function(e) {
    e.addEventListener('click', function() {
      if (backDropStyle == null) {
        backDropStyle = document.createElement('link');
        backDropStyle.href = '/wp-content/themes/chroma/dist/css/mobile-menu-background.css';
        backDropStyle.type = "text/css";
        backDropStyle.rel = "stylesheet";
        backDropStyle.media = "all";
        document.getElementsByTagName("head")[0].appendChild(backDropStyle);
      }
      let overlayMenu = document.getElementById('overlay-menu');
      Array.prototype.forEach.call(menuButtons, function(btn) {
        btn.classList.toggle('is-active');
      });
      overlayMenu.classList.toggle('overlay-menu-animation');
      document.body.classList.toggle('noscroll');
      document.documentElement.classList.toggle('noscroll');
      let navOpeners = overlayMenu.querySelectorAll('nav, .nav-social-portals');
      Array.prototype.forEach.call(navOpeners, function(el) {
        el.classList.toggle('open');
      });
      let menuStops = overlayMenu.querySelectorAll('nav li, .nav-social-portals');
      Array.prototype.forEach.call(menuStops, function(el) {
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
    document.attachEvent('onreadystatechange', function() {
      if (document.readyState !== 'loading')
        fn();
    });
  }
}

ready(main);

