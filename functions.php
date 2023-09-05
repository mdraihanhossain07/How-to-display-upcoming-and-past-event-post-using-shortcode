<?php 

// Upcoming events
function p_upcoming_events( $atts, $content = null ) {


    $today = date('Ymd');
    $new_events = "";

      //New events
        $args = array( 'post_type' => 'event', 'posts_per_page' =>-1, 'meta_query' => array(
        array(
              'key'   => 'date',
              'compare' => '>=',
              'value'   => $today,
          )),
          'meta_key'      => 'date',
        'orderby'     => 'meta_value',
        // 'order'       => 'ASC'

      );
   
   $tmp = 0;

  //New events
    $loop = new WP_Query( $args );
      
    $new_events .= '<div class="upcomming-event-area">';
    while ( $loop->have_posts() ) : $loop->the_post(); 

      $date = get_field('date', false, false);
      $date = new DateTime($date);
      $date = $date->format('M j, Y');
      $tmp_class2 = "";
      if($tmp == 0){
            $tmp_class2 = "event-title";
            
      }else{
            $tmp_class2 = "event-title";
      }

        
        $new_events .= '<div class="single-event-item">';
            $new_events .= '<div class="single-event-item-inner">';

                $new_events .= '<div class="single-event-image">';
                    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                    $new_events .= '<a class="btn" href="'.get_permalink().'"><img src="'.$featured_image[0].'" class="event-image"></a>';
                $new_events .= '</div>';

                $new_events .= '<div class="single-event-item-inner-content">';

                    $new_events .= '<h3 class="event-title"><a class="btn" href="'.get_permalink().'">'.get_the_title().'</a></h3>';
                    $new_events .= '<p calss="date">' . get_field('date') . '</p>';
                $new_events .= '</div>';

            $new_events .= '</div>';
        $new_events .= '</div>';

        $tmp++;
    endwhile; 
    wp_reset_query(); 
    $new_events .= '</div>';


  return $new_events;
}
add_shortcode( 'upcoming_events', 'p_upcoming_events' );


//Past events
function p_past_events( $atts, $content = null ) {


    $today = date('Ymd');
   $new_events = "";

      //New events
        $args = array( 'post_type' => 'event', 'posts_per_page' =>-1, 'meta_query' => array(
        array(
              'key'   => 'date',
              'compare' => '<',
              'value'   => $today,
          )),
          'meta_key'      => 'date',
        'orderby'     => 'meta_value',
        // 'order'       => 'ASC'

      );
   
   $tmp = 0;

  //New events
    $loop = new WP_Query( $args );
      
    $new_events .= '<div class="upcomming-event-area">';
    while ( $loop->have_posts() ) : $loop->the_post(); 

      $date = get_field('date', false, false);
      $date = new DateTime($date);
      $date = $date->format('M j, Y');
      $tmp_class2 = "";
      if($tmp == 0){
            $tmp_class2 = "event-title";
            
      }else{
            $tmp_class2 = "event-title";
      }

        
        $new_events .= '<div class="single-event-item">';
            $new_events .= '<div class="single-event-item-inner">';

                $new_events .= '<div class="single-event-image">';
                    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                    $new_events .= '<a class="btn" href="'.get_permalink().'"><img src="'.$featured_image[0].'" class="event-image"></a>';
                $new_events .= '</div>';

                $new_events .= '<div class="single-event-item-inner-content">';

                    $new_events .= '<h3 class="event-title"><a class="btn" href="'.get_permalink().'">'.get_the_title().'</a></h3>';
                    $new_events .= '<p calss="date">' . get_field('date') . '</p>';
                $new_events .= '</div>';

            $new_events .= '</div>';
        $new_events .= '</div>';

        $tmp++;
    endwhile; 
    wp_reset_query(); 
    $new_events .= '</div>';


  return $new_events;
}
add_shortcode( 'past_events', 'p_past_events' );
