<?php
$genreTerms = get_terms([
    'taxonomy' => 'genre',
    'order' => 'DESC',
    'hide_empty' => true,
]);
?>
<div class="CoursesList Module">
    <div class="container container--wide">
        <?php if ($subheadline = get_field('coursesList::subheadline')) : ?>
            <p class="CoursesList__subheadline">
                <?= $subheadline; ?>
            </p>
        <?php endif; ?>
        <?php if ($headline = get_field('coursesList::headline')) : ?>
            <h1><?= $headline; ?></h1>
        <?php endif; ?>
        <?php if ($genreTerms) : ?>
            <div class="CoursesList__genre">
                <?php foreach ($genreTerms as $key => $genre) : ?>
                    <span class="CoursesList__genreItem<?= $key === 0 ? ' CoursesList__genreItem--active' : ''; ?>" data-genre="<?= $genre->slug; ?>"><?= $genre->name; ?></span>
                <?php endforeach;?>
            </div>
            <?php foreach ($genreTerms as $key => $genre) : ?>
                <?php   
                    $coursesByTerm = new WP_Query([
                        'post_type' => 'courses',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'tax_query' => [
                            [
                                'taxonomy' => 'genre',
                                'terms' => $genre->term_id,
                            ]
                        ]
                    ]);
                ?>
                <div class="CoursesList__slider Slider Slider--coursesList <?= $key === 0 ? ' CoursesList__slider--active' : ''; ?>" data-genre="<?= $genre->slug; ?>">
                    <div class="Slider__container">
                        <?php while ($coursesByTerm->have_posts()) : $coursesByTerm->the_post(); ?>
                            <?php getComponent('CoursesTile', ['genreName' => $genre->name]); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
</div>