<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to fledgling_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Fledgling
 * @since Fledgling 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
 ?>
 
<div id="comments">
	<?php if ( post_password_required() ) : ?>
	<p>This post is password protected. Enter the password to view any comments</p>
</div>

<?php
   /* Stop the rest of comments.php from being processed,
   * but don't kill the script entirely -- we still have
   * to fully load the template.
   */
      return;
   endif;
?>

<?php // You can start editing here -- including this comment! ?>

<?php if ( have_comments() ) : ?>

   <h2><?php comments_number(); ?></h2>
   
   <ol>
      <?php wp_list_comments( array( 'callback' => 'fledgling_comment' ) ); ?>
   </ol>
   
   <?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
   
   <p>Comments are closed</p>

<?php endif; ?>

<?php comment_form(); ?>

</div><!-- #comments -->



