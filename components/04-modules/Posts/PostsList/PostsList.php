<?php
$items = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish'
]);
?>

<section class="PostsList Module">
    <div class="container container--wide">
        <?php if ($subheadline = get_field('postsList::subheadline')) : ?>
            <h6><?= $subheadline; ?></h6>
        <?php endif; ?>
        <?php if ($headline = get_field('postsList::headline')) : ?>
            <h1><?= $headline; ?></h1>
        <?php endif; ?>

        <?php if ($items->have_posts()) : ?>
            <div class="PostsList__slider Slider Slider--postsList">
                <div class="Slider__container">
                    <?php while ($items->have_posts()) : $items->the_post(); ?>
                        <?php getComponent('PostsTile'); ?>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>