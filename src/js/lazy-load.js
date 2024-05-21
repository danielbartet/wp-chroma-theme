document.addEventListener('DOMContentLoaded', function () {
  var allImages = document.querySelectorAll('.llreplace'); // Usar querySelectorAll y convertir a Array
  console.log('#######')
  console.log('total images: ',allImages)
  if (allImages.length > 0) {
    allImages[allImages.length - 1].addEventListener('load', lazyLoadController); // Pasar referencia, no invocar la función
  }
});

function lazyLoadController() {
  var allImages = Array.from(document.querySelectorAll('.llreplace')); // Convertir NodeList a Array
  lazyLoadExecution(); // Ejecutar una vez antes de añadir el listener de scroll

  // Agregar listener de scroll con debouncer
  let timeout;
  window.addEventListener('scroll', function () {
    clearTimeout(timeout);
    timeout = setTimeout(lazyLoadExecution, 100); // Debouncer para mejorar rendimiento
  });

  function lazyLoadExecution() {
    allImages.forEach((img, index) => {
      if (inView(img)) {
        lazyLoadImage(img);
        allImages.splice(index, 1); // Remover imagen de la lista una vez cargada
      }
    });
  }
}

function inView(element) {
  var elementSize = element.getBoundingClientRect();
  var html = document.documentElement;
  return (
    elementSize.top >= 0 &&
    elementSize.left >= -100 &&
    elementSize.bottom <= 620 + (window.innerHeight || html.clientHeight) &&
    elementSize.right <= 2640 + (window.innerWidth || html.clientWidth)
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
  element.classList.add('reveal'); // Asegurar que element.classList existe es innecesario en navegadores modernos
}
