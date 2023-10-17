<section class="Faq Module">
    <div class="container">
        <div class="Faq__header">
            <?php if ($subheadline = get_field('faq::subheadline')) : ?>
                <h6><?= $subheadline; ?></h6>
            <?php endif; ?>
            <?php if ($headline = get_field('faq::headline')) : ?>
                <h1><?= $headline; ?></h1>
            <?php endif; ?>
        </div>

        <?php if (have_rows('faq::items')) : ?>
            <div class="Accordion Faq__accordion">
                <?php while (have_rows('faq::items')) : the_row(); ?>
                    <div class="Accordion__item">
                        <div class="Accordion__head Faq__accordionHead">
                            <?= get_sub_field('faq::items:header'); ?>
                        </div>
                        <div class="Accordion__content">
                            <p class="Faq__accordionContent"><?= get_sub_field('faq::items:content'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>