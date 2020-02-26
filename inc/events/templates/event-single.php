<?php

get_header(); ?>

	<div class="event_main" style="padding: 20px">
		<!-- main content area -->
		<div class="event_content">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<h1><?php the_title(); ?></h1>

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
					<div class="event_image"> <?php the_post_thumbnail(); ?></div>

			<?php comments_template(); ?>		
			<?php endwhile; endif; ?>
		
		</div>

	</div><!-- end of main div -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>	


