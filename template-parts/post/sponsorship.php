<style>
  .post_sponsorship {
    border-top: 1.5px solid lightgrey;
    border-bottom: 1.5px solid lightgrey;
    width: 100%;
    display: flex;
  }

  .post_sponsorship p { 
    color: #00ce83;
    font-style: italic;
  }

  .post_sponsorship h3 {
    color: rgba(72,49,255,0.88);
  }

  .post_sponsorship img {
    max-height: 300px;
    max-width: 300px;
  }

  .post_sponsorship_link {
    display: flex;
  }

  @media(min-width: 320px) and (max-width: 480px) {
      .post_sponsorship_link {
          flex-direction: column;
          align-items: center;
      }

      .post_sponsorship img {
          max-height: 200px;
          max-width: 200px;
      }

      .post_sponsorship h3 {
          font-size: 1.2em;
          text-align: center;
      }

      .post_sponsorship p {
          font-size: 1em;
          text-align: center;
      }
  }
</style>

<?php 
add_filter( 'the_content', 'sponsorship_content' );
function sponsorship_content( $content ) {
        
    //We don't want to modify the_content in de admin area
    if( !is_admin() ) {
        $sponsorship_title = get_field("sponsorship_title", 48301);
        $sponsorship_image = get_field("sponsorship_image", 48301);
        $sponsorship_link = get_field("sponsorship_link", 48301);
        $sponsorship_paragraph_number = get_field("sponsorship_paragraph_number", 48301);
        $sponsorship_description = get_field("sponsorship_description", 48301);
        $sponsorship_post_number = get_field("post_sponsorship_paragraph_number");
        $sponsorship = "
        <div class='post_sponsorship'>
        <a class='post_sponsorship_link' href=" . $sponsorship_link . " target='_blank'>
            <div>
                <h3> " . $sponsorship_title . "</h3>
                <p> " . $sponsorship_description . " </p>
            </div>
            <img src=" . $sponsorship_image . " />
        </a>
        </div>";
        $p_array = explode('</p>', $content );

        if( !empty( $p_array ) ){
            if($sponsorship_post_number) {
              array_splice( $p_array, $sponsorship_post_number, 0, $sponsorship );
            } else {
              array_splice( $p_array, $sponsorship_paragraph_number, 0, $sponsorship );
            }
            $output = '';

            foreach( $p_array as $key=>$value ){

                $output .= $value;

             }
        }

    }

    return $output;

}