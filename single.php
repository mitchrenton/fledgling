<?php
/**
* The Template for displaying all single posts
*
*
* @package 	WordPress
* @subpackage 	Fledgling
* @since 		Fledgling 1.0
*/
get_header(); ?>

<?php while(have_posts()) : the_post(); ?>

   <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
   
      <h1><?php the_title(); ?></h1>
      
      <?php if(has_post_thumbnail()) :
         $img_id = get_post_thumbnail_id($post->ID); 
         $image = wp_get_attachment_image_src($img_id, 'large');
         $img_url = $image['0'];
         $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
      ?>
         
      <figure itemprop="image">
      
         <img src="<? echo $img_url; ?>" itemprop="image" title="Article image: <? the_title_attribute(); ?>" alt="<? $alt_text; ?>" />
      
      </figure>
      
      <?php endif; ?>
      
      <?php fledgling_entry_meta(); ?>
      
      <div itemprop="articleBody">
         <?php the_content(); ?>
      </div>
            
      <?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
      
         <?php echo get_avatar( get_the_author_meta( 'user_email' )); ?>
         
         <h4 itemprop="author"><?php printf( __( 'About %s', 'fledgling' ), get_the_author() ); ?></h4>
         
         <p><?php the_author_meta( 'description' ); ?></p>
         
         <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
            <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'fledgling' ), get_the_author() ); ?>
         </a>
            
      <?php endif; ?>
      
      <?php previous_post_link(); ?>
      <?php next_post_link(); ?>
      
      <?php comments_template( '', true ); ?>
   
   </article>

<?php endwhile; ?>

<?php get_footer(); ?>