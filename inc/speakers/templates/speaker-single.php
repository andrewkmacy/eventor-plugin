<?php

get_header(); ?>
	<!-- main content area -->
	<div class="speaker_wrapper">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="speaker_content">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<h1><?php the_title(); ?></h1>

					<?php the_content(); ?>

				</article>	
				<!-- add featured image -->
				<div class="speaker_image"> <?php the_post_thumbnail(); ?></div>

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


