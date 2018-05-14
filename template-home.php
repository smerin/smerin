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


			<?php $my_query = new WP_Query( 'post_type=post&posts_per_page=3' );
				if ( $my_query->have_posts() ) : ?>

				<div class="featured-posts">
					<div class="container">
						<div class="row">

							<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
								<div class="col-33">
									<div class="featured-posts__item">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('featured-thumbnail'); ?>
										</a>
										<h3>
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h3>
										<p><?php the_excerpt(); ?></p>
									</div>
								</div>
							<?php endwhile; ?>

						</div>
					</div>
				</div>

			<?php endif; ?>




		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
