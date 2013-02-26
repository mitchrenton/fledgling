<?php
/**
 * The template for displaying Tag pages.
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fledgling
 * @subpackage Fledgling
 * @since Fledgling 1.0
 */

get_header(); ?>

<?php if(have_posts()) : ?>

   <h1><?php printf( __( 'Tag Archives: %s', 'fledgling' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
   
   <?php if ( tag_description() ) : ?>
		<?php echo tag_description(); ?>
	<?php endif; ?>
	
	<?php while(have_posts()) : the_post(); ?>
	
	  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">
      
         <h1 itemprop="name"><a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="Permalink to: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
         
         <?php if(has_post_thumbnail()) :
            $img_id = get_post_thumbnail_id($post->ID); 
            $image = wp_get_attachment_image_src($img_id, 'thumbnail');
            $img_url = $image['0'];
            $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
         ?>
            
         <figure itemprop="image">
         
            <img src="<? echo $img_url; ?>" itemprop="image" title="Article image: <? the_title_attribute(); ?>" alt="<? $alt_text; ?>" />
         
         </figure>
         
         <?php endif; ?>
         
         <?php fledgling_entry_meta(); ?>
         
         <p itemprop="description"><?php echo get_the_excerpt(); ?></p>
      
      </article>

	<?php endwhile; ?>
	
	<?php next_posts_link(); ?>
	
	<?php previous_posts_link(); ?>
	
<?php else : ?>

   <h1>No posts found for this tag</h1>
   
<?php endif; ?>

<?php get_footer(); ?>