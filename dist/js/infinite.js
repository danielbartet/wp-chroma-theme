/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};


document.addEventListener("DOMContentLoaded", function () {
  'use strict';

  //infinite scroll object definition
  var InfiniteScroll = function InfiniteScroll(loadBtn) {
    var _this = this;
    var infiniteArticles,
      infiniteCount = 0,
      infinitePrev = document.getElementById('prev-post'),
      infiniteUrl = document.getElementById('prev-post') ? document.getElementById('prev-post').getAttribute("infinite-source") : null,
      infiniteCheck = '',
      infiniteContainer = document.getElementById('infinite-data');

    //logic to load ads and content instead of the next post
    this.infiniteGetContent = function (loadBtn, ev) {
      if (infinitePrev == null || typeof infinitePrev == 'undefined') {
        _this.errorMessage();
        return;
      }
      infiniteCount++;
      //handle loader
      var loader = document.getElementById('infinite-loader');
      if (loader == null || typeof loader == 'undefined') {
        loader = document.createElement('div');
        loader.id = 'infinite-loader';
        loader.classList.add('infinite-loader');
        infiniteContainer.parentNode.insertBefore(loader, infiniteContainer.nextSibling);
      }
      //hide load button
      loader.classList.add('is-active');
      //fetch and append content from next page
      window.fetch(infiniteUrl).then(function (response) {
        return response.text();
      }).then(function (data) {
        var parser = new DOMParser();
        var dataHTML = parser.parseFromString(data, "text/html");
        infinitePrev.setAttribute("infinite-source", dataHTML.getElementById('prev-post').getAttribute("infinite-source"));
        var foundNodes = dataHTML.getElementById('infinite-data').children;
        loader.classList.remove("is-active");
        Array.prototype.forEach.call(foundNodes, function (node) {
          var newNode = node.cloneNode(true);
          infiniteContainer.appendChild(newNode);
        });
        loadBtn.setAttribute('style', 'position: static; top: auto; left: auto; opacity: 1; transform: scale(1);');
        infiniteUrl = document.getElementById('prev-post').getAttribute("infinite-source");
      })["catch"](function (error) {
        _this.errorMessage();
        console.log('error is', error);
      });
    };
    this.errorMessage = function () {
      var noMore = document.createElement('span');
      noMore.innerText = 'All available posts have been loaded';
      noMore.classList.add('no-more-text');
      loadBtn.parentNode.replaceChild(noMore, loadBtn);
    };

    //init
    loadBtn.addEventListener('click', function (ev) {
      ev.preventDefault();
      _this.infiniteGetContent(loadBtn, ev);
    });
  };
});
/******/ })()
;