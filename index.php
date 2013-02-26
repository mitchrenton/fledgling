<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Fledgling
 * @since Fledgling 1.0
 */

get_header(); ?>

<?php if(have_posts()) : ?>

   <?php while(have_posts()) : the_post(); ?>
   
      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/BlogPosting">
      
         <a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="Permalink to: <?php the_title_attribute(); ?>">
         
            <h1 itemprop="name"><?php the_title(); ?></h1>
         
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
            
            <p itemprop="description"><?php echo get_the_excerpt(); ?></p>
            
         </a>
         
         <?php fledgling_entry_meta(); ?>
      
      </article>
   
   <?php endwhile; ?>
   
   <?php next_posts_link(); ?>
	
	<?php previous_posts_link(); ?>

<?php else : ?>

   <h1>No posts found</h1>

<?php endif; ?>

<?php get_footer(); ?>