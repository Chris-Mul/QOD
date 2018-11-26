<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<section>

            <header>
            
            <?php the_title(); ?>

            </header>


            <?php //if user is logged in & can edit post ?>

            <!-- display form html -->
                  <form action="">

                  
                  </form>

            <?php  //else disply ?>

            Sorry you must be logged in to submit a quote!

            <?php //endif ?>


         </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

