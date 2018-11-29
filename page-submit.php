<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>
        <!-- <i class="fas fa-quote-right"></i>
         <i class="fas fa-quote-left"></i>  -->
         <div id="primary" class="content-area">
               <main id="main" class="site-main" role="main">
                     <section>
                              <header>
                                 <h2><?php the_title(); ?></h2>
                              </header>
                              <?php if ( is_user_logged_in() ) : ?>
                                    <form name="quoteForm" id="quote-submission-form" method="post" class="submit-form">

                                        <label>Author of Quote</label>
                                        <input type="text" name="quote_author" id="quote-author" >
                                 
                                        <label>Quote</label>
                                        <textarea type="text" name="quote_content" id="quote-content" cols="20" rows="3"></textarea>
                             
                                        <label>Where did you find this quote?</label>
                                        <input type="text" name="quote_source" id="quote-source" >
                                   
                                        <label>Provide a url source of the quote?</label>
                                        <input type="text" name="quote_source_url" id="quote-source-url" >
                                        <input id="submit-quote-button" type="submit" value="Submit Quote" class="submit-button">
                                    </form>
                                    <p class="success-msg"> </p>
                                    <p class="sorry-msg"> </p>
                              <?php  else: ?>
                                    <p>Sorry, you must be logged in to submit a quote!</p>
                                    <a href="<?php echo wp_login_url(get_permalink());?>" title="login">Click here to login</a>
                              <?php endif; ?>
                              </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
