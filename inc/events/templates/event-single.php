<?php

get_header(); ?>
	<!-- main content area -->
	<div class="event_wrapper">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="event_content">

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

				</article>	
				<!-- add featured image -->
				<div class="event_image"> <?php the_post_thumbnail(); ?></div>

			</div>

		<nav class="post-navigation">
			<div class="nav-previous"><?php previous_post_link( '&laquo; %link' ); ?></div>
			<div class="nav-next"><?php next_post_link( '%link &raquo;' ); ?></div>
		</nav>
					
		<?php comments_template(); ?>		
		<?php endwhile; endif; ?>
	
	</div>


<?php get_sidebar(); ?>

<?php get_footer(); ?>	


