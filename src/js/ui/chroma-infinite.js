//infinite scroll object definition
const InfiniteScroll = function(loadBtn) {

  var infiniteArticles,
      infiniteCount = 0,
      infinitePrev = document.getElementById('prev-post'),
      infiniteUrl = (document.getElementById('prev-post')) ? document.getElementById('prev-post').getAttribute("infinite-source") : null,
      infiniteCheck = '',
      infiniteContainer = document.getElementById('infinite-data');

  //logic to load ads and content instead of the next post
  this.infiniteGetContent = (loadBtn, ev) => {
    if (infinitePrev == null || typeof infinitePrev == 'undefined') {
      this.errorMessage()
      return
    }
   infiniteCount++;
   //handle loader
   let loader = document.getElementById('infinite-loader')
   if (loader == null || typeof loader == 'undefined') {
    loader = document.createElement('div')
    loader.id = 'infinite-loader'
    loader.classList.add('infinite-loader')
    infiniteContainer.parentNode.insertBefore(loader,infiniteContainer.nextSibling)
   }
   //hide load button
   loader.classList.add('is-active')
   //fetch and append content from next page
   window.fetch(infiniteUrl)
    .then(response => response.text())
    .then(data => {
      let parser = new DOMParser()
      let dataHTML = parser.parseFromString(data, "text/html")
      infinitePrev.setAttribute("infinite-source", dataHTML.getElementById('prev-post').getAttribute("infinite-source"))
      let foundNodes = dataHTML.getElementById('infinite-data').children
      loader.classList.remove("is-active")
      Array.prototype.forEach.call(foundNodes, (node) => {
        let newNode = node.cloneNode(true)
        infiniteContainer.appendChild(newNode)
      })
      loadBtn.setAttribute('style', 'position: static; top: auto; left: auto; opacity: 1; transform: scale(1);')
      infiniteUrl = document.getElementById('prev-post').getAttribute("infinite-source")
    })
    .catch(error => {
      this.errorMessage()
      console.log('error is', error)
    })
  }

  this.errorMessage = () => {
    let noMore = document.createElement('span')
    noMore.innerText = 'All available posts have been loaded'
    noMore.classList.add('no-more-text')
    loadBtn.parentNode.replaceChild(noMore, loadBtn)
  }

  //init
  loadBtn.addEventListener('click', (ev) => {
    ev.preventDefault()
    this.infiniteGetContent(loadBtn, ev)
  })

}
