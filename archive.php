<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Fledgling already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Fledgling
 * @since Fledgling 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
   
   <h1>
   <?php if ( is_day() ) :
      printf( __( 'Daily Archives: %s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
      elseif ( is_month() ) :
      printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
      elseif ( is_year() ) :
      printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
      else :
      _e( 'Archives', 'twentytwelve' );
   endif; ?>
   </h1>
   
   <?php while ( have_posts() ) : the_post(); ?>
   
      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/BlogPosting">
      
         <a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="Permalink to: <?php the_title_attribute(); ?>">
         
            <h1 itemprop="name"><?php the_title(); ?></h1>
            
            <p itemprop="description"><?php echo get_the_excerpt(); ?></p>
            
         </a>
         
         <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'fledgling' ) . '</span>', __( '1 Reply', 'fledgling' ), __( '% Replies', 'fledgling' ) ); ?>
         
         <?php fledgling_entry_meta(); ?>
      
      </article>

   
   <?php endwhile; ?>
   
   <?php next_posts_link(); ?>
	
	<?php previous_posts_link(); ?>
   
   <?php else : ?>
   
   <h1>No posts found for this archive</h1>
   
<?php endif; ?>

<?php get_footer(); ?>