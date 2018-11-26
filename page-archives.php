<?php
/**
 * The template for displaying all Archives.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


            <h1>Archives</h1>

            <h2>Quote Authors</h2>

			<section class="author-links">
                <!-- display authors links to show archive of single post by the author with 'show me another button'-->
                <?php
                //get_posts() with post_per_page as arg
                //foreach and setup_postdata

                
                    $args = array( 'posts_per_page' => -1);
                    $posts = get_posts( $args ); // returns an array of posts
                    ?>
                    <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                    
                    <a class="" href="<?php the_permalink();?>">
                    <?php the_title(); ?>
                    </a>
                   
                    <?php endforeach; wp_reset_postdata(); ?>

          


            </section>

             <h2>Categories</h2>

            <section class="category-links">
                    <!-- display category links to show archive of archive of post of this-->
            
                    
                      <?php wp_tag_cloud( array( 'taxonomy' => 'category',  
                                                    'smallest' => 16, 
                                                    'largest'  => 16,
                                                    'unit'     => 'px', )

                    
                    ); 
                    //alternative
                    //wp_list_categories();
                    
                    ?>

                     
                     
            </section>

            <h2>Tags</h2>

            <section class="tags">
                <!-- display tags links to show archive of posts of this tag -->
                <?php
             
                $args = array(
                    'taxonomy' => array( 'post_tag', 'category' ), 
                    'smallest' => 16, 
                    'largest'  => 16,
                    'unit'     => 'px', 
                ); 
            
                wp_tag_cloud( $args );
            ?>
               
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
