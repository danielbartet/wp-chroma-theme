document.addEventListener("DOMContentLoaded", function() {
    'use strict';
  
    const InfiniteScroll = function(loadBtn) {
      var infiniteCount = 0;
      var infinitePrev = document.getElementById('prev-post');
      var infiniteUrl = infinitePrev ? infinitePrev.getAttribute("infinite-source") : null;
      var infiniteContainer = document.getElementById('infinite-data');
  
      this.infiniteGetContent = function() {
        if (!infinitePrev || !infiniteUrl) {
          this.errorMessage(loadBtn);
          return;
        }
  
        infiniteCount++;
        let loader = document.getElementById('infinite-loader');
        if (!loader) {
          loader = document.createElement('div');
          loader.id = 'infinite-loader';
          loader.className = 'infinite-loader';
          infiniteContainer.parentNode.insertBefore(loader, infiniteContainer.nextSibling);
        }
  
        loader.classList.add('is-active');
  
        fetch(infiniteUrl)
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.text();
          })
          .then(data => {
            let parser = new DOMParser();
            let dataHTML = parser.parseFromString(data, "text/html");
            let newPrev = dataHTML.getElementById('prev-post');
            if (newPrev) {
              infinitePrev.setAttribute("infinite-source", newPrev.getAttribute("infinite-source"));
              infiniteUrl = newPrev.getAttribute("infinite-source");
            }
            Array.from(dataHTML.getElementById('infinite-data').children).forEach(node => {
              infiniteContainer.appendChild(node.cloneNode(true));
            });
            loader.classList.remove("is-active");
          })
          .catch(error => {
            console.error('Fetch error:', error);
            this.errorMessage(loadBtn);
          });
      }
  
      this.errorMessage = function(button) {
        let noMore = document.createElement('span');
        noMore.textContent = 'All available posts have been loaded';
        noMore.className = 'no-more-text';
        button.parentNode.replaceChild(noMore, button);
      }
  
      loadBtn.addEventListener('click', (ev) => {
        ev.preventDefault();
        this.infiniteGetContent();
      });
    }
  
    var loadButton = document.getElementById('load-more-btn');
    if (loadButton) {
      new InfiniteScroll(loadButton);
    }
  });
  