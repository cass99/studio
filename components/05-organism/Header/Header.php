<header class="Header">
    <div class="Header__container">
        <div class="Header__top">
            <div class="Header__topContainer container container--wide">
                <?php if ($phone = get_field('options::header:phone', 'options')) : ?>
                    <a href="tel:<?= $phone; ?>" class="Header__phone"><?= $phone; ?></a>
                <?php endif; ?>
                <div>
                    <?php if ($facebook = get_field('options::header:facebook', 'options')) : ?>
                        <a href="<?= $facebook; ?>" target="blank" class="Header__facebook"></a>
                    <?php endif; ?>
                    <?php if ($instagram = get_field('options::header:instagram', 'options')) : ?>
                        <a href="<?= $instagram; ?>" target="blank" class="Header__instagram"></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="Header__bottom container container--wide">
            <a href="/" class="Header__logo"></a>
            <div class="Header__navigation">
                <?php getComponent('Navigation', ['class' => 'primary'])?>
            </div>
            <div class="Header__tools">
                <?php getComponent('Hamburger'); ?>
                <?php if ($phone = get_field('options::header:phone', 'options')) : ?>
                    <div class="Header__phoneDesktop">
                        <a href="tel:<?= $phone; ?>" class="Header__phone"><?= $phone; ?></a>
                    </div>
                <?php endif; ?>
                <?php if (have_rows('options::header:coursesButton', 'option')): ?>
                    <?php while (have_rows('options::header:coursesButton', 'option')): the_row(); 
                        $coursesText = get_sub_field('options::header:coursesButton:text');
                    ?>
                    <div class="Header__courses">
                        <span class="Header__coursesText"><?= $coursesText; ?></span>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</header>
