<?php
	/* Template Name: Image Slider
        Template Post Type: post, page */
        
        // import global variables to be used to track initial page || view all page 
        global $page, $pages, $numpages, $multipage;
get_header();
// if page is equal to initial page, render wondersliderplugin initial slider
if ($page === 1): ?>
<div class="centerSlider"> 
    <div class="imageSliderContainer">
        <div class="image-slider-left">
            <div class="image-slider-header">
            <?php // gets the post header w/ title, author info, subtitle, publish date
            get_template_part( 'template-parts/post/imageSlider-header' );
            ?>
            </div>
            <?php
            // the image slider
            echo the_content();
            ?>
            <!-- button that sends user to second page in url to create 'view all' -->
            <!-- <div class= "viewAllBox">
                <a class="viewAllBtn" href = <?php the_permalink(); echo $numpages + 1; ?>><span>View All</span></a>
            </div> -->
        </div>
        <!-- post side bar -->
        <div class="image-slider-right">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php else:
    // if page != initial page --> creates a new template using data from <ul> element of wondersliderplugin
    echo "<div class='centerSlider'>";
    echo "<div class='vaContainer'>";
    echo "<div class='image-slider-left'>";
    echo "<div class='image-slider-header'";
    get_template_part( 'template-parts/post/imageSlider-header' );
    echo "</div>";
    echo "<div class='image-slider-block'></div>";
    echo "<div class='removeContent'>";
    echo the_content();
    echo "</div>";
    echo "</div>";
    echo "<div class='image-slider-right'>";
    get_sidebar();
    echo "</div>";
    echo "</div>";
    echo "</div>";
?>
<script>
    // function that recreates and renders the 'view all' template
    function viewAll() {
        // retrieves initial ul element to extract data and store into an array
        let amazingSlides = document.querySelector('.amazingslider-slides');
        let totalElements = Array.prototype.slice.call(amazingSlides.children);
        let imageBlock = document.querySelector('.image-slider-block');
        // loop over our data for each <li> element, create a new block with necessary info (image, title, description)
        for(let i = 0; i < totalElements.length; i++) {
            let blockInfo = Array.prototype.slice.call(totalElements[i].children);
            let elemContainer = document.createElement('div');
            console.log(blockInfo);
            elemContainer.setAttribute('class', 'elemContainer');
            let blockImage = document.createElement('img');
            blockImage.classList.add('blockImage');
            let blockTitle = document.createElement('h1');
            let description = document.createElement('p');
            // if blockInfo[0] src exists set blockImage src to existing src, else search for dataset attribute and use that instead
            {blockInfo[0].src !== '' ? blockImage.src = blockInfo[0].src : blockImage.src = blockInfo[0].dataset.src;}
            blockTitle.innerHTML = '<div class="titleContainer"><div class="numBubble"><span>' + (i + 1) + "</span></div>" + '<h1>' + blockInfo[0].title + "</h1></div>";
            description.innerHTML = '<div class="descriptionBlock">' + blockInfo[0].dataset.description + "</div>";
            // append the necessary info to our container (which will render a block for each slide)
            elemContainer.append(blockImage, blockTitle, description);
            // append each elemContainer to the DOM element created above
            imageBlock.appendChild(elemContainer);
        }
    }
    viewAll();
    // function that will hide the wondersliderplugin element on 'view all' page
    function space() {
        let space = document.querySelector('.addMargin');
        space.style.display = 'block';
        space.style.lineHeight = '0';
        space.style.height = '0 !important';
        space.style.visibility = 'hidden';
        space.dataHeight = '0';
        space.style.margin = '0';
        space.style.position = 'absolute !important';
        space.style.top = '0';
    }
    space();
</script>

<?php endif; ?>


<?php 
get_footer();
?>

<script>
    // get ul element containing our data which wondersliderplugin generates the slides
    let amazingSlides = document.querySelector('.amazingslider-slides');
    let totalElements = Array.prototype.slice.call(amazingSlides.children);
    // loop over elements and set according slide to index / total length of slides and reset the title
    // necessary because numbering initially wouldn't show up on mobile devices
    for(let i = 0; i < totalElements.length; i++) {
        let len = totalElements.length;
        let num = (i + 1) + ' / ' + len;
        totalElements[i].children[0].title = num + ' ' + totalElements[i].children[0].title;
    }
</script>