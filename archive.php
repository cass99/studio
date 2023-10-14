<?php
/**
 *  The template for displaying archive pages
 *
 *  @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *  @package WordPress
 *  @subpackage Twenty_Nineteen
 *  @since Twenty Sixteen 1.0
 */
?>
<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

    <?php endwhile; ?>

<?php else : ?>

<?php endif; ?>

<?php get_footer(); ?>
