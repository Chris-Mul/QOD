<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

// code to set varibales to add source and source url (get_post_meta)

$source = get_post_meta(get_the_ID(), '_qod_quote_source',true );
$source_url = get_post_meta( get_the_ID(), '_qod_quote_source_url',true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<div class="entry-meta">
		<p> - <?php the_title(); ?></p>
		
	</div>
	<?php 
			
			//if the source and source url fields are not empty then show them echo in a tag
			 if($source && $source_url) : ?>
				<span class="source">
					<a class="sourceUrl" href="<?php echo $source_url; ?>">
						<?php echo $source; ?>
					</a>
				</span>
			<?php //else if the source has content show the source only echo in span ?>
			<?php elseif ($source) : ?>
				<span class=""><?php echo $source; ?></span>
			<?php //else show empty span ?>
			<?php else : ?>
				<span></span>
			<?php endif; ?>


	
</article><!-- #post-## -->



<?php if (is_home() || is_single()) : ?>
	<button class="new-quote-button">Show Me Another</button>
<?php endif; ?>