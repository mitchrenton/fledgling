<?php
/**
 * The template for displaying Author Archive pages.
 *
 * Used to display archive-type pages for posts by an author.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Fledgling
 * @since Fledgling 1.0
 */
 
get_header(); ?>

<?php if ( have_posts() ) : the_post(); ?>

   <h1><?php printf( __( 'Author Archives: %s', 'fledgling' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
   
   <?php rewind_posts(); ?>
   
   <?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
      
      <?php echo get_avatar( get_the_author_meta( 'user_email' )); ?>
      
      <h3><?php printf( __( 'About %s', 'fledgling' ), get_the_author() ); ?></h3>
      
      <p><?php the_author_meta( 'description' ); ?></p>
      
      <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
         <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'fledgling' ), get_the_author() ); ?>
      </a>
         
   <?php endif; ?>
   
   <?php while(have_posts()) : the_post(); ?>
   
      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">
         
            <h1 itemprop="name"><a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="Permalink to: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            
            <?php fledgling_entry_meta(); ?>
            
            <p itemprop="description"><?php echo get_the_excerpt(); ?></p>
                     
         </article>
   
   <?php endwhile; ?>
   
   <?php next_posts_link(); ?>
	
	<?php previous_posts_link(); ?>

<? endif; ?>

<? get_footer(); ?>