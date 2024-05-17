document.addEventListener('DOMContentLoaded', function() {
  if (document.getElementsByClassName('llreplace').length > 0) {
    var allimages = document.getElementsByClassName('llreplace');
    lazyLoadController(allimages); // Iniciar controlador en el DOMContentLoaded
  }
});

function lazyLoadController(allimages) {
  // Asegúrate de que se llame a la función solo después de que el DOM esté completamente cargado.
  lazyLoadExecution(allimages); // Ejecutar una vez antes del listener de scroll

  if (allimages.length > 0) {
    window.addEventListener('scroll', function () {
      lazyLoadExecution(allimages);
    });
  }
}

function lazyLoadExecution(allimages) {
  var imgCount = 0;
  while (imgCount < allimages.length) {
    if (inView(allimages[imgCount])) {
      lazyLoadImage(allimages[imgCount]);
      allimages[imgCount].classList.remove('llreplace');
    } else {
      imgCount++;
    }
  }
}

function inView(element) {
  var elementSize = element.getBoundingClientRect();
  var html = document.documentElement;
  return (
    elementSize.top >= 0 &&
    elementSize.left >= -100 &&
    elementSize.bottom <= (620 + (window.innerHeight || html.clientHeight)) &&
    elementSize.right <= (2640 + (window.innerWidth || html.clientWidth))
  );
}

function lazyLoadImage(element) {
  if (element.getAttribute('data-srcset')) {
    element.setAttribute('srcset', element.getAttribute('data-srcset'));
    element.removeAttribute('data-srcset');
  }
  if (element.getAttribute('data-src')) {
    element.setAttribute('src', element.getAttribute('data-src'));
    element.removeAttribute('data-src');
  }
  if (element.classList) {
    element.classList.add('reveal');
  }
}
