<?php

get_header(); ?>

<div id="main">
	
	<section id="content">
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<h1><?php the_title(); ?></h1>
			
			<?php the_content(); ?>
            <!-- show event info -->
                <ul>
                    <li><strong>Date: </strong><?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_date_set', true ) ); ?></li>
                    <li><strong>Time: </strong><?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_time_set', true ) ); ?></li>
                    <li><strong>Location: </strong><?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_location_set', true ) ); ?></li>
                </ul>
			
			
									
			<nav class="post-navigation">
				<div class="nav-previous"><?php previous_post_link( '&laquo; %link' ); ?></div>
				<div class="nav-next"><?php next_post_link( '%link &raquo;' ); ?></div>
			</nav>
			
		</article>

	  <?php comments_template(); ?>
	
		<?php endwhile; endif; ?>
	
	</section>

</div><!-- end of main div -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>	


