<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package iCare
 */

get_header();
get_template_part('breadcrumbs'); ?>
  <div class="container mt-thirty mb-thirty pt-thirty pb-thirty">
	<div class="row">
	  <div class="col-md-9">
		<div class="blog-posts">
		  <div class="col-md-12">
			<div class="row list-dotted">
			  
			  <?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
			</div>
		  </div>
		  <?php icare_pagination(); ?>
		</div>
	  </div>
		  <?php get_sidebar(); ?>
	</div>
  </div>
</section>
<?php get_footer(); ?>
