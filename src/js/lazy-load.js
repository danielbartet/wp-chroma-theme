function lazyLoadController(images) {
  function lazyLoadExecution(images) {
    images.forEach(image => {
      if (inView(image)) {
        lazyLoadImage(image);
        image.classList.remove('llreplace');
      }
    });
  }

  function inView(image) {
    const rect = image.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= -100 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) + 620 &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth) + 2640
    );
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
  window.addEventListener('scroll', () => lazyLoadExecution(images));
  lazyLoadExecution(images);  // Ejecutar inicialmente
}

document.addEventListener('DOMContentLoaded', () => {
  const allImages = document.getElementsByClassName('llreplace');
  console.log('Imágenes capturadas:', allImages.length);
  if (allImages.length > 0) {
    lazyLoadController(allImages);
  }
});
