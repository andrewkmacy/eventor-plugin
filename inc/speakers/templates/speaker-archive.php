
<?php
/* 
Template Name: Archives
*/
get_header(); ?>
  <header class="page-header" role="banner">
    <h1><?php wp_title(); ?></h1>
  </header><!-- .page-header -->

<div class="speaker_archive_main">
		
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
      <div class="speaker_archive_content">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
          <h1><?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?></h1>
    
          <?php the_content(); ?>

        </article>	
            <!-- add featured image -->
        <div class="speaker_image"> <?php the_post_thumbnail(); ?></div>
          <nav class="post-navigation">
            <div class="nav-previous"><?php previous_post_link( '&laquo; %link' ); ?></div>
            <div class="nav-next"><?php next_post_link( '%link &raquo;' ); ?></div>
          </nav>

  <?php endwhile; endif; ?>	

</div>

<?php get_footer(); ?>
