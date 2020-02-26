<?php
/* 
Template Name: Archives
*/
get_header(); ?>
    <header class="page-header" role="banner">
    <h1><?php wp_title(); ?></h1>
    </header><!-- .page-header -->

    <div class="archive_event_main">
      <!-- main content area -->
      <div class="archive_event_content">
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <div class="single_event">

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              
              <h1><?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?></h1>

                  <!-- show event info -->	
                  <ul>			
                    <li><strong>Date: </strong><?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_date_set', true ) ); ?></li>
                    <li><strong>Time: </strong><?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_time_set', true ) ); ?></li>
                    <li><strong>Location: </strong><?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_location_set', true ) ); ?></li>
                  </ul>
                  
                  <!-- add text content -->
              <?php the_content(); ?>
                
              <nav class="post-navigation">
                <div class="nav-previous"><?php previous_post_link( '&laquo; %link' ); ?></div>
                <div class="nav-next"><?php next_post_link( '%link &raquo;' ); ?></div>
              </nav>
              
            </article>

            <!-- add featured image -->
            <div class="archive_event_image"> <?php the_post_thumbnail(); ?></div>

          </div> <!-- single event -->

            <?php endwhile; endif; ?>
      
      </div>

    </div><!-- end of main div -->

<?php get_footer(); ?>	
