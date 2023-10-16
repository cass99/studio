<?php $genreName = get_query_var('genreName', '')?>
<div class="CoursesTile">
    <div class="CoursesTile__container">
        <div class="CoursesTile__genre"><?= $genreName; ?></div>
        <h4 class="CoursesTile__title"><?= get_the_title(); ?></h4>
        <div class="CoursesTile__dates">
            <div class="CoursesTile__datesTitle"><?= __('Daty rozpoczęcia kursów', 'studio'); ?></div>
            <?php if (have_rows('courses::startDates', get_the_ID())) : ?>
                <div class="CoursesTile__datesContainer">
                <?php while (have_rows('courses::startDates', get_the_ID())) : the_row(); ?>
                    <div class="CoursesTile__datesDate"><?= get_sub_field('courses::startDates:date'); ?></div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php getComponent('Button', ['buttonClass' => 'CoursesTile__button', 'buttonLink' => get_permalink(), 'buttonLinkTitle' => __('Więcej', 'studio')]); ?>
    </div>
</div>
<?php set_query_var('genreName', ''); ?>