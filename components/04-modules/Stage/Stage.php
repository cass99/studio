<section class="Stage Module">
    <div class="Stage__container container container--wide">
        <div class="Stage__slider container container--wide container--positionUnset">
            <div class="Stage__sliderWrapper Slider Slider--stage">
                <div class="Slider__container">
                    <?php foreach (get_field('stage::banners') as $banner) : ?>
                        <img class="Stage__sliderImage" src="<?= $banner; ?>" alt="">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="Stage__content container container--wide">
            <div class="Stage__contentContainer">
                <?= get_field('stage::text'); ?>
                <?php getComponent('Button', ['buttonClass' => 'Stage__button']); ?>
            </div>
        </div>
        <div class="Stage__icons">
            <?php if ($facebook = get_field('options::header:facebook', 'options')) : ?>
                <a href="<?= $facebook; ?>" target="blank" class="Stage__icon Header__facebook"></a>
            <?php endif; ?>
            <?php if ($instagram = get_field('options::header:instagram', 'options')) : ?>
                <a href="<?= $instagram; ?>" target="blank" class="Stage__icon Header__instagram"></a>
            <?php endif; ?>
        </div>
    </div>
</section>