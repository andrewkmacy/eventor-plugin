<?php
/* 
Template Name: Archives
*/
get_header(); ?>
    <header class="page-header" role="banner">
		<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="archive-description">', '</div>' );
		?>
    </header><!-- .page-header -->

 
<div id="primary" class="site-content">
<div id="content" role="main">
 
<?php while ( have_posts() ) : the_post(); ?>
                 
<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

<!-- show event info -->
<ul>
    <li><strong>Date: </strong><?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_date_set', true ) ); ?></li>
    <li><strong>Time: </strong><?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_time_set', true ) ); ?></li>
    <li><strong>Location: </strong><?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_location_set', true ) ); ?></li>
</ul>
 
<div class="entry-content">
 
<?php the_content(); ?>
 
</div><!-- .entry-content -->
 
<?php endwhile; // end of the loop. ?>
 
</div><!-- #content -->
</div><!-- #primary -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>