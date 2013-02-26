<?php
/**
 * Flefgling functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Fledgling
 * @since Fledgling 1.0
 */

/* Custom <title> tag */
function fledgling_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'fledgling' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'fledgling_wp_title', 10, 2 );

if ( ! function_exists( 'fledgling_entry_meta' ) ) :

   function fledgling_entry_meta() {
   	// Translators: used between list items, there is a space after the comma.
   	$categories_list = get_the_category_list( __( ', ', 'fledgling' ) );
   
   	// Translators: used between list items, there is a space after the comma.
   	$tag_list = get_the_tag_list( '', __( ', ', 'fledgling' ) );
   
   	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark" pubdate><time datetime="%3$s">%4$s</time></a>',
   		esc_url( get_permalink() ),
   		esc_attr( get_the_time() ),
   		esc_attr( get_the_date( 'c' ) ),
   		esc_html( get_the_date() )
   	);
   
   	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
   		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
   		esc_attr( sprintf( __( 'View all posts by %s', 'fledgling' ), get_the_author() ) ),
   		get_the_author()
   	);
   
   	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
   	if ( $tag_list ) {
   		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'fledgling' );
   	} elseif ( $categories_list ) {
   		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'fledgling' );
   	} else {
   		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'fledgling' );
   	}
   
   	printf(
   		$utility_text,
   		$categories_list,
   		$tag_list,
   		$date,
   		$author
   	);
   }
endif;

// Display word count of post
function fledgling_wcount(){
   ob_start();
   the_content();
   $content = ob_get_clean();
   return sizeof(explode(" ", $content));
}

// Custom output for comments
function fledgling_comment( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment; ?>

<?php if ( $comment->comment_approved == '1' ): ?>	
   <li id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/UserComments">
      <?php echo get_avatar( $comment ); ?>
      <h4><?php comment_author_link() ?></h4>
      <time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
      <?php comment_text() ?>
<?php endif;
}