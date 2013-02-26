<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Fledgling
 * @since Fledgling 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

   <h1><?php printf( __( 'Search Results for: %s', 'fledgling' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
   
   <ol>
   
   <?php while ( have_posts() ) : the_post(); ?>
   
      <li>
         <article id="<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
            <a href="<?php the_permalink(); ?>" title="Permalink to: <?php the_title_attribute(); ?>" rel="bookmark" itemprop="title"><?php the_title(); ?></a>
            <span class="url" itemprop="url"><?php the_permalink(); ?></span>
            <p itemprop="description"><?php echo get_the_excerpt(); ?></p>
         </article>
      </li>
   
   <?php endwhile; ?>
   
   </ol>
   
   <?php next_posts_link(); ?>
   
   <?php previous_posts_link(); ?>
   
   <?php else : ?>
   
   <h1><?php _e( 'Nothing Found', 'fledgling' ); ?></h1>
   
   <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'fledgling' ); ?></p>
   <?php get_search_form(); ?>

<?php endif; ?>

<?php get_footer(); ?>