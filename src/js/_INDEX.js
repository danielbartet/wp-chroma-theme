"use strict";
/* RUN MAIN */
function ready(fn) {
  if (document.readyState != 'loading')
    fn()
  else if (document.addEventListener)
    document.addEventListener('DOMContentLoaded', fn)
  else {
    document.attachEvent('onreadystatechange', () => {
      if (document.readyState != 'loading')
        fn()
    })
  }
}
//globals
var ct; //comment toggle
const main = () => {
  //Navigation
  menuNavigation()
  mobileMenuScrollFix()
  searchToggle()
  //UI
  enableActiveStateiOS()
  rippleClick()
  lightBox()
  sizeTable()
  footerMargin()
  WidthChange(1100)
  var anchorScroll = new scrollAnchors()
  scrollListenerCallBacks(scrollParam)
  anchorScroll.init()
  //Single Post
  if (typeof document.getElementsByClassName('single')[0] != 'undefined' && document.getElementsByClassName('single')[0] != null) {
    catchAsideAd()
    engagementBar()
    calculateSidebar(1100)
    ct = new commentToggle()
    //How To Posts
    var scrollParam = (typeof document.getElementsByClassName('how-to')[0] != 'undefined' && document.getElementsByClassName('how-to')[0] != null && window.innerWidth < 560)
      ? new anchorMapScroller()
      : null
    carouselNav()
  }
  //social
  if (document.getElementsByClassName('social-sharing-controller').length > 7) {
    new socialShareMaster()
    giveawayScroll()
  }
  //infinite scroll loader
  let loadBtn = document.querySelector('.load-more-wrap')
  if (loadBtn != null && typeof loadBtn != 'undefined') {
    new InfiniteScroll(loadBtn)
  }
}
ready(main)

/* Utility Functions */
//Check if an element is next to another element
function isAdjacent(elem1, elem2) {
  var e1 = document.querySelectorAll(elem1)[0],
      elemNext = document.querySelectorAll(elem1 + " + " + elem2)[0]
  if (e1.nextSibling.textContent.trim().length)
    return e1.nextSibling === elemNext
  else
    return e1.nextElementSibling === elemNext
}

function enableActiveStateiOS() {
  /* enable active state on iOS */
  if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
      var elements = document.querySelectorAll('html')
      var emptyFunction = function() {}
      for (var i = 0; i < elements.length; i++) {
          elements[i].addEventListener('touchstart', emptyFunction, false)
      }
  }
}
function debounce(func, wait, immediate) {
	var timeout
	return function() {
		var context = this, args = arguments
		var later = function() {
			timeout = null
			if (!immediate) func.apply(context, args)
		}
		var callNow = immediate && !timeout
		clearTimeout(timeout)
		timeout = setTimeout(later, wait)
		if (callNow) func.apply(context, args)
	}
}

function ForEach(collection, callBack) {
  for (var i = 0, l = collection.length; i < l; i++) {
    callBack(collection[i])
  }
}

/* User Experience */
function menuNavigation() {
  var menuButtons = document.getElementsByClassName('hamburger'),
      backDropStyle = null;
  [].forEach.call(menuButtons, (e) => {
    e.addEventListener('click', (event) => {
      if (backDropStyle == null) {
        backDropStyle = document.createElement('link')
        backDropStyle.href = '/wp-content/themes/chroma/dist/css/mobile-menu-background.css'
        backDropStyle.type = "text/css"
        backDropStyle.rel = "stylesheet"
        backDropStyle.media = "all"
        document.getElementsByTagName( "head" )[0].appendChild( backDropStyle );
      }
      let overlayMenu = document.getElementById('overlay-menu');
      [].forEach.call(menuButtons, (btn) => {
        btn.classList.toggle('is-active')
      })
      overlayMenu.classList.toggle('overlay-menu-animation')
      document.body.classList.toggle('noscroll')
      document.documentElement.classList.toggle('noscroll')
      let navOpeners = overlayMenu.querySelectorAll('nav, .nav-social-portals');
      [].forEach.call(navOpeners, (el) => {
        el.classList.toggle('open')
      })
      let menuStops = overlayMenu.querySelectorAll('nav li, .nav-social-portals');
      [].forEach.call(menuStops, (el) => {
        el.classList.toggle('menu-li-stop')
      })
      document.getElementById('main-nav-cont').classList.toggle('main-nav-hide')
    })
  })
}

function searchToggle() {
  var searchButton = document.getElementById('search-button'),
      searchBar = document.querySelector('.search-bar'),
      searchFields = document.querySelectorAll('.search-bar input'),
      disabled = true
      Array.prototype.forEach.call(searchFields, el => {
        el.setAttribute('disabled', disabled)
      })
  if (searchButton && typeof searchButton != 'undefined') {
    searchButton.addEventListener('click', (event) => {
      searchButton.classList.toggle('is-active')
      searchBar.classList.toggle('is-active')
      disabled = !disabled
      if (disabled) {
        Array.prototype.forEach.call(searchFields, el => {
          el.setAttribute('disabled', disabled)
        })
      } else {
        Array.prototype.forEach.call(searchFields, el => {
          el.removeAttribute('disabled')
        })
      }
    })
  }
}
var commentToggle = function() {
  //create component
  var comments = null,
      comments_overlay = null,
      disqus_loaded = false
  this.createCommentComponent = (targetsParent) => {
    if (store.getState().commentStatus)
      return;
    store.dispatch({
      type : 'commentOn'
    })
    var commentsTitle = document.createElement('span'),
        commentsClose = document.createElement('button'),
        disqus = document.createElement('div'),
        body = document.getElementsByTagName('body')[0]
    disqus.id = 'disqus_thread'
    comments = document.createElement('div')
    comments.classList.add('comments-area')
    comments_overlay = document.createElement('div')
    comments_overlay.classList.add('comments_overlay')
    commentsTitle.classList.add('comments_title')
    commentsClose.setAttribute('class', 'comments_close box-shadow-default')
    commentsTitle.innerHTML = 'Comments'
    commentsTitle.appendChild(commentsClose)
    comments.appendChild(commentsTitle)
    comments.appendChild(disqus)
    comments.id = "comments"
    comments.setAttribute('name', 'comments')
    body.appendChild(comments_overlay)
    body.appendChild(comments)
    //create disqus script
    this.disqus()
    //comment close listeners
    commentsClose.addEventListener('click', (ev) => {
      comments.classList.toggle('is-active')
      comments_overlay.classList.toggle('is-active')
    })
    comments_overlay.addEventListener('click', (ev) => {
      comments.classList.toggle('is-active')
      comments_overlay.classList.toggle('is-active')
    })
  }

  this.disqus = () => {
    //disqus data is set up seperately via localize script
    let disqus_shortname = 'idropnews'
    if (!disqus_loaded)  {
      disqus_loaded = true
      var e = document.createElement("script")
      e.type = "text/javascript"
      e.async = true
      e.src = "//" + disqus_shortname + ".disqus.com/embed.js";
      (document.getElementsByTagName("head")[0] ||
      document.getElementsByTagName("body")[0])
      .appendChild(e);
    }
  }

  //comment button listener
  var commentTriggers = document.querySelectorAll('.comments-icon, #comments-anchor');
  if (doesExist(commentTriggers)) {
    [].forEach.call(commentTriggers, (e) => {
      //reposition comment icon if awkward
      if (e.id != 'comments-anchor') {
        if (e.nextSibling != null && e.nextSibling.nodeName != 'P')
          e.classList.add('expand')
        else if(e.parentNode.id !== 'content-main') {
          e.classList.add('expand')
          document.getElementById('content-main').appendChild(e)
        }
      }
      e.addEventListener('click', (ev) => {
        ev.preventDefault()
        this.createCommentComponent(ev.target.parentNode)
        if (comments != null) {
          comments.classList.toggle('is-active')
          comments_overlay.classList.toggle('is-active')
        }
      })
    })
  }
}

const engagementBar = () => {
  //engagebar
  if (document.getElementById('resize-plus') && typeof document.getElementById('resize-plus') != 'undefined') {
    //Font size resizer
    var resizerCount = 0,
        fontSize = 1.11563
    //Increase size
    document.getElementById('resize-plus').addEventListener('click', (e) => {
      if (resizerCount >= 2) {} else {
        if (resizerCount == 3)
            fontSize = (fontSize - .095);
        else
            fontSize = (fontSize + .095);
        resizerCount++;
        let texts = document.querySelectorAll('#content-main p, #content-main ol, #content-main ul');
        [].forEach.call(texts, (e) => {
          e.style.fontSize = fontSize + 'rem'
        })
      }
    })
    //Decrease size
    document.getElementById('resize-minus').addEventListener('click', (e) => {
        if (resizerCount <= -2) {} else {
          if (resizerCount == -3)
            fontSize = (fontSize + .095)
          else
            fontSize = (fontSize - .095)
          resizerCount--
          let texts = document.querySelectorAll('#content-main p, #content-main ol, #content-main ul');
          [].forEach.call(texts, (e) => {
            e.style.fontSize = fontSize + 'rem'
          })
        }
    })
  }
}

/* DOM Manipulation functions */
//calculate sidebar height based on what is adjacent
function calculateSidebar(breakPoint) {
  if (window.matchMedia(`(min-width: ${breakPoint}px)`).matches) {
    var adjacentElementHeight,
        sideBar = document.getElementById('sidebar')
    if (sideBar == null || typeof sideBar == 'undefined')
        return
    if (document.getElementsByClassName('single').length > 0 )
      adjacentElementHeight = document.getElementById('the-post-content').offsetHeight
    if (sideBar != null && typeof sideBar != 'undefined')
      sideBar.style.minHeight = adjacentElementHeight + "px"
  } else if (document.getElementById('sidebar') != null && typeof document.getElementById('sidebar') != 'undefined')
      document.getElementById('sidebar').style.minHeight = 'auto'
}
function footerMargin() {
  let isException = document.querySelector('.category-giveaways')
  if (isException != null && typeof isException != 'undefined')
    return
  if (
    document.querySelector('.site') != null
    && typeof document.querySelector('.site') != 'undefined'
    && document.getElementById('foot-wrap') != null
    && typeof document.getElementById('foot-wrap') != 'undefined'
  )
    document.querySelector('.site').style.marginBottom = document.getElementById('foot-wrap').clientHeight + "px"
}
// media query change
function WidthChange(breakPoint) {
  //widow resize listener usingg setTimeout as a sorta debounce
  var resizeTimer
  window.addEventListener("resize", debounce(function(e) {
    clearTimeout(resizeTimer)
    resizeTimer = setTimeout(function() {
      // Run code here, resizing has "stopped"
        calculateSidebar(breakPoint)
        footerMargin()
    }, 75)
  }, 250))
}



const anchorScroll= () => {
  let aNames = document.querySelectorAll('a[name]');
  [].foreach.call(aNames, (e) => {
    e.classList.add('anchor')
  })
  let anchors = document.querySelectorAll('#content-main a[href^=\\#]');
  [].foreach.call(anchors, (e) => {
    e.addEventListener('click', (ev) => {
      anchorScroll.preventDefault()
      let scrollName = ev.target.getAttribute('href').replace("'", "\'").replace("#", ""),
          scrollDestOffset = document.querySelector('a[name="' + scrollName + '"]')
      if  (document.getElementsByClassName("anchor").length > 0) {}
        //animate scroll
    })
  })
}

function catchAsideAd() {
  //Conditional logic to catch ad - layout issues
  if (document.getElementsByClassName("asideAd").length > 0) {
    var mainContent = document.getElementById('content-main')
    if (isAdjacent(".asideAd", "img") || isAdjacent(".asideAd", "figure") || isAdjacent(".asideAd", "iframe") || isAdjacent(".asideAd", ".video-container") || isAdjacent(".asideAd", "center") || isAdjacent(".asideAd", "center") || isAdjacent(".asideAd", ".twitter-tweet") || isAdjacent(".asideAd", ".twitter-block") || isAdjacent(".asideAd", "h3")) {
      let asideAd = document.getElementById('asideAd'),
          previousParagraph = mainContent.querySelector("p:nth-of-type(2)")
      asideAd.parentNode.insertBefore(asideAd, previousParagraph)
    }
    if (isAdjacent(".asideAd", "ol") || isAdjacent(".asideAd", "ul")) {
      let lists = mainContent.querySelectorAll('ul, ol');
      [].forEach.call(lists, (e) => {
        e.classList.add('clearfix')
      })
    }
  }
}
//responsive tables
function sizeTable() {
  var tables = document.querySelectorAll('table')
  if (!doesExist(tables))
    return
  var i = 1
  function buildTable(e) {
    e.id = `tab-${i}`
    var breakSizeByCount = 1 / e.children[0].children[0].children.length * 100,
    sheet = document.styleSheets[0],
    containerComputedWidth = parseInt(window.getComputedStyle(e.parentNode).getPropertyValue('max-width')),
    containerMaxes = containerComputedWidth / e.children[0].children[0].children.length,
    tableRule = `#tab-${i} th, #tab-${i} td { width: ${breakSizeByCount}%; min-width: ${containerMaxes}px;}`,
    tableWrap = document.createElement('div');
    tableWrap.classList = 'table-wrap'
    e.parentNode.insertBefore(tableWrap, e)
    tableWrap.appendChild(e)
    sheet.insertRule(tableRule, sheet.cssRules.length)
    i++
  }
  ForEach(tables, buildTable)
}
//carousel nav
const carouselNav = () => {
  if (typeof document.getElementById('carousel-nav-controller') != undefined && document.getElementById('carousel-nav-controller') != null) {
    let cNavController = document.getElementById('carousel-nav-controller')
    cNavController.addEventListener('click', () => {
      let cNav = document.getElementById('carousel-nav')
      cNavController.classList.add('is-active')
      cNav.classList.add('is-active')
    })
  }
}
//open lightbox for content images
var lightBox = () => {
  var triggers = document.getElementsByClassName('lightbox_trigger')
  if (triggers && typeof triggers != 'undefined') {
    [].forEach.call(triggers, (tr) => {
      tr.addEventListener('click', (ev) => {
        ev.preventDefault
        var lightbox = document.getElementById('lightbox')
        let lightbox_href = ev.target.getAttribute('src'),
             lightbox_srcset = ev.target.getAttribute('srcset') || ev.target.getAttribute('src')
        if (lightbox != null && typeof lightbox != 'undefined') {
          let img = document.createElement('img')
          img.setAttribute('src', lightbox_href)
          img.setAttribute('srcset', lightbox_srcset)
          img.setAttribute('class', 'lightbox-view')
          document.documentElement.classList.add('noscroll')
          document.body.classList.add('noscroll')
          document.getElementById('content').innerHTML = img
        } else {
          lightbox =document.createElement('div')
          lightbox.id = 'lightbox'
          lightbox.classList.add('lightbox')
          lightbox.innerHTML = '<p class="lightbox_p">Done</p><div id="lb_content" class="lightbox_box"><img class="lightbox_img" src="' + lightbox_href + '" srcset="' + lightbox_srcset + '"/></div>'
          document.body.appendChild(lightbox)
          lightbox.classList.add('lightbox-view')
        }
        lightbox.addEventListener('click', (ev) => {
          lightbox.classList.remove('lightbox-view')
          document.body.classList.remove('noscroll')
          lightbox.remove(lightbox)
        })
      })
    })
  }
}
const scrollListenerCallBacks = (anchorScroll) => {
  //elements
  var nav = document.getElementById('main-nav-cont'),
      headerImg = document.getElementById('header-content'),
      parallaxMove = document.querySelector('.parallax-move'),
      socialShare = document.getElementById('social-share'),
      reviewWidget = doesExist(document.getElementsByClassName('review_cta')[0]) ? document.getElementsByClassName('review_cta')[0] : false,
      //calculations
      st = window.pageYOffset || document.documentElement.scrollTop,
      stPrev = st,
      stPrevPadding = window.innerHeight * 0.5625,
      headerImgOffset = (headerImg != null && typeof headerImg != 'undefined')
        ? headerImg.offsetTop
        : 0,
      navFadeOutPoint = (doesExist(nav)) ? headerImgOffset + nav.clientHeight * 1.5 : 0,
      headerOffset = (headerImg != null && typeof headerImg != 'undefined')
        ? headerImg.offsetTop + headerImg.clientHeight
        : 0,
      calcHeader = ( doesExist(document.getElementById('post-header')))
        ? document.getElementById('post-header').clientHeight * 1.25 + document.getElementById('post-header').offsetTop
        : 0,
      shareFadeOutOffset = (document.getElementById('content-main') != null && typeof document.getElementById('content-main') != 'undefined')
        ? document.getElementById('content-main').offsetTop + document.getElementById('content-main').clientHeight
        : 1000,
      //flags
      parallaxMoveFlag = (parallaxMove != null && typeof parallaxMove != 'undefined'),
      elementsAvailable = (socialShare != null && typeof socialShare != 'undefined'),
      isVideo = (doesExist(document.querySelector('.single-format-video')) && ((window.matchMedia('(max-width: 768px)').matches)) )
        ? true
        : false

  function parallaxAnimation(st) {
    if (parallaxMoveFlag) {
      //parallax effect for featured image
      if (st >= calcHeader && !(st > headerOffset) ) {
        parallaxMove.style.opacity = 1 - ((st - calcHeader) * .0014)
      } else if (st < calcHeader)
        parallaxMove.style.opacity = 1;
    }
  }

  function socialView(st) {
    if (elementsAvailable) {
      //scroll effect for social share button and footer
      if (st < shareFadeOutOffset) {
        socialShare.classList.remove("fade-out")
        socialShare.classList.add("fade-in")
        if (reviewWidget !== false) {
          reviewWidget.classList.remove("fade-out")
          reviewWidget.classList.add("fade-in")
        }
      }
      if (st > shareFadeOutOffset) {
        socialShare.classList.remove("fade-in")
        socialShare.classList.add("fade-out")
        if (reviewWidget !== false) {
          reviewWidget.classList.remove("fade-in")
          reviewWidget.classList.add("fade-out")
        }
      }
    }
  }

  function navController(st, stPrev) {
    if (st > navFadeOutPoint && st > stPrev)
      nav.style.top = '-64px'
    else
      nav.style.top = '0px'
  }

  //main window event listener
  window.addEventListener('scroll', function() {
    st = window.pageYOffset || document.documentElement.scrollTop
    socialView(st)
    parallaxAnimation(st)
    //anchor scroll trigger
    if (anchorScroll != null)
      anchorScroll.trigger()
    if (isVideo)
      navController(st, stPrev)
    stPrev = st
  })
}

//anchor map for how tos
function anchorMapScroller() {
  //check if anchor is in view
  function anchorInView(element) {
      var elementSize = element.getBoundingClientRect()
      return (
          elementSize.top >= 80 &&
          elementSize.bottom <= ((window.innerHeight * .5) || (document.documentElement.clientHeight * .5))
      )
  }

  if (document.querySelector('#contentmap') !== null) {
    var contentMap = document.querySelector('#contentmap'),
          allAnchors = document.querySelectorAll("a[name]"),
          anchorCountLength = allAnchors.length,
          anchorSwitch = false
    this.trigger = () => {
      for (let anchorCount = 0; anchorCount < anchorCountLength; anchorCount++) {
        if (anchorInView(allAnchors[anchorCount])) {
            if (anchorCount == 0 || anchorSwitch !== true) {
                contentMap.scrollTo(0, 0)
                anchorSwitch = true
            } else {
                //we find the sibling because we want to scroll the perfect distance to move desired selector into the viewport
                var anchorBeforeSibling = (anchorCount - 1)
                var scrollName = allAnchors[anchorBeforeSibling].name.replace("'", "\'")
                var anchorNavElements = contentMap.querySelectorAll('[href="#' + scrollName + '"]')
                var anchorNavPos = anchorNavElements[0].offsetLeft + anchorNavElements[0].offsetWidth + 20
                contentMap.scrollTo(anchorNavPos, 0)
            }
        }
      }
    }
    var mapComments = document.getElementById('comments-anchor')
    if (doesExist(mapComments)) {
      mapComments.addEventListener('click', (ev) => {
        ev.preventDefault()
        ct.createCommentComponent()
      })
    }
  }
}

function mobileMenuScrollFix() {
  //scroll fix on mobile menu
  var body = document.body,
      overlay = document.querySelector('.overlay-menu'),
      overlayBtts = document.querySelectorAll('fly-but-wrap');

  [].forEach.call(overlayBtts, function(btt) {
    btt.addEventListener('click', function() {
      /* Detect the button class name */
      var overlayOpen = this.className === 'fly-but-wrap'
      /* Toggle the aria-hidden state on the overlay and the
         no-scroll class on the body */
      overlay.setAttribute('aria-hidden', !overlayOpen)
      body.classList.toggle('noscroll', overlayOpen)
      /* On some mobile browser when the overlay was previously
         opened and scrolled, if you open it again it doesn't
         reset its scrollTop property */
      overlay.scrollTop = 0
    }, false)
  })
}

function rippleClick() {
  var rippleButtons = document.querySelectorAll('button, .ripple, .alt-cat-post, .resizertriggers span, #search-button, .featured');
  [].forEach.call(rippleButtons, (e) => {
    e.addEventListener('click', (ev) => {
      var rippleDiv = document.createElement('ins'),
          rippleHeight = e.clientHeight,
          elBounding = e.getBoundingClientRect(),
          yPos = ev.clientY - elBounding.top,
          xPos = ev.clientX - elBounding.left
      rippleDiv.classList.add('ripple-effect')
      rippleDiv.setAttribute('style', `transform: translateZ(0); position: absolute; height: ${rippleHeight}px; width: ${rippleHeight}px; top: ${yPos}px; left: ${xPos}px;`)
      e.setAttribute('style', 'position: relative; overflow: hidden')
      e.appendChild(rippleDiv)
      window.setTimeout(function() {
        rippleDiv.remove(rippleDiv)
      }, 800)
    })
  })
}


function giveawayScroll() {
  const slider = document.querySelector('.dragScroll');
  let isDown = false;
  let startX;
  let scrollLeft;
  
  slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });
  slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');
  });
  slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
  });
  slider.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 3; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
  });
}

