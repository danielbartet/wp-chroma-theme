//automatic image container padding helper function
function imageContainerPadding(element) {
    //if there"s nothing inside element then exit
    if (!element.children[0]) {
        return;
    }
    var figureParentWidth = parseInt(getComputedStyle(element.parentNode).width, 10);
    var figureWidthRatio = parseInt(getComputedStyle(element).width, 10);

    var imgH = parseFloat(getComputedStyle(element.children[0]).height, 10);
    var imgW = parseFloat(getComputedStyle(element.children[0]).width, 10);

    //image placeholder padding calculation
    var placeHolderPadding = ((figureWidthRatio / figureParentWidth) * (imgH / imgW) * 100);

    if (placeHolderPadding > 5) {
      element.style.paddingBottom = placeHolderPadding + "%";
    }
}

//insert padding to prefill image areas
if (document.getElementsByTagName("figure").length > 0) {

    var figures = document.getElementsByTagName("figure");

    for (var i = 0, j = figures.length; i < j; i++) {
        imageContainerPadding(figures[i]);
    }
}
