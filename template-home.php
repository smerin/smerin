<?php
/* Template Name: Homepage */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="home__hero">
					<div class="container">
						<h1><?php the_title(); ?></h1>
					</div><!-- .container -->
				</div>
					


			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
