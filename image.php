<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    
<?php endwhile; ?>

<?php get_footer(); ?>
