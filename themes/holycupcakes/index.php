<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Holy_Cupcakes
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- container for blogs page  -->
		<div class="grid-container">
			<div class="grid-x">
				<!-- sidebar box -->
				<div class="large-4 grid-margin-x show-for-large sidebar-box">
					<?php
					// loading sidebar
					get_sidebar();
					?>
				</div>


				<div class="large-8 medium-12 small-12 grid-x align-justify blog-posts-box">
					<?php
					if (have_posts()) :
						// loading header if page is not the homepage
						if (is_home() && !is_front_page()) :
					?>
							<header class="large-12 medium-12 small-12">
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								<hr class="blogHr">
							</header>
							<!-- blog grid box -->
						<?php
						endif;

						/* Start the Loop */
						while (have_posts()) :
							the_post();

						?>

							<!-- container for blog card -->
							<div class="card large-5 medium-5 small-10 blogCard">

								<?php
								// loading post thumbnail image
								if (has_post_thumbnail()) {
								?>
									<div class="thumbnail-img">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_post_thumbnail_caption(); ?>" />
									</div>
								<?php
								} ?>
								<!-- loading blog excerpt -->
								<div class="card-section blogExcerpt">
									<h3><?php the_title(); ?> </h3>
									<p>
										<?php
										the_excerpt();
										?>
									</p>
									<!-- link to the post -->
									<a class="blogBtn" href="<?php echo get_post_permalink(); ?>">continue reading</a>
								</div>
							</div>

					<?php


						/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/


						endwhile;

						the_posts_navigation();

					else :

						get_template_part('template-parts/content', 'none');

					endif;
					?>
				</div><!-- cell large-8 -->
			</div><!-- .grid-x -->
		</div><!-- .grid-container -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
