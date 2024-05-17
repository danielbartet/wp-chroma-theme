document.addEventListener('DOMContentLoaded', function() {
  if (document.getElementsByClassName('llreplace').length > 0) {
    var allimages = document.getElementsByClassName('llreplace');
    console.log("Imágenes capturadas: ", allimages.length); // Ver cuántas imágenes captura
    lazyLoadController(allimages);
  }
});

function lazyLoadController(allimages) {
  lazyLoadExecution(allimages);
  window.addEventListener('scroll', function () {
    lazyLoadExecution(allimages);
  });
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
  var visible = elementSize.top >= 0 &&
    elementSize.left >= -100 &&
    elementSize.bottom <= (620 + (window.innerHeight || html.clientHeight)) &&
    elementSize.right <= (2640 + (window.innerWidth || html.clientWidth));

  console.log("Elemento en vista:", visible); // Verificar si está en vista
  return visible;
}

function lazyLoadImage(element) {
  console.log("Cargando imagen:", element); // Ver qué elemento está procesando
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
