<div class="PostsTile">
    <div class="PostsTile__container">
        <img class="PostsTile__image" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
        <div class="PostsTile__content">
            <div class="PostsTile__information">
                <div class="PostsTile__informationDate">
                    <span class="PostsTile__informationDateDay"><?= get_the_date('d'); ?></span>
                    <span class="PostsTile__informationDateYear"><?= ucfirst(get_the_date('M\'y')); ?></span>
                </div>
                <div class="PostsTile__informationCategory">
                    <?php
                        $categories = get_the_category();
                        $categoryNames = [];
                        foreach ($categories as $category) {
                            $categoryNames[] = $category->name;
                        }
                    ?>
                    <?= implode(', ', $categoryNames); ?>
                </div>
            </div>
            <div class="PostsTile__excerpt">
                <?= get_the_excerpt(); ?>
            </div>
            <a class="PostsTile__link" href="<?= get_permalink(); ?>"><?= __('Czytaj więcej', 'studio'); ?></a>
        </div>
    </div>
</div>