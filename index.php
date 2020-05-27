<?php 
	get_header(); 
	the_post();
?>
	<div class="content-wrapper">
		<h2><?php the_title(); ?></h2>
		<div class="entry-content pt1">
			<?php the_content(); ?>
		</div>
	</div>
<?php get_footer(); ?>