document.addEventListener("DOMContentLoaded", function() {
  'use strict';
class scrollAnchors {
  constructor() {
    this.scrollFD = window.scroll
    this.mobileOffset = (window.matchMedia("(max-width: 414px)").matches) ? 336 : 90
    this.scrollOffset = window.innerHeight/1.05 - 115 - this.mobileOffset
  }
  init() {
    if (this.scrollFD != null && typeof this.scrollFD != 'undefined') {
      let aLinks = document.querySelectorAll('.anchor-nav__a, #contentmap a');
      //convert white spaces in a[Names]
      [].forEach.call(document.querySelectorAll('a[name]'), e => {
        e.setAttribute('name', e.getAttribute('name').replace(' ', "%20"))
      })
      if (aLinks.length < 1)
        return;
      [].forEach.call(aLinks, (e) => {
        e.addEventListener('click', (ev) => {
          ev.preventDefault()
          let topValue = document.querySelector(`a[name=\"${e.getAttribute('href').replace('#', '')}\"]`).offsetTop + this.scrollOffset
          window.scroll({
            top: topValue,
            behavior: "smooth"
          })
        })
      })
    }
  }
}
});