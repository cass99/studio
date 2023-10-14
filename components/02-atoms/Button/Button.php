<?php $class = get_query_var('buttonClass', ''); ?>
<?php if (have_rows('clone::button')) : ?>
    <?php while (have_rows('clone::button')) : the_row(); ?>
        <?php
            $type = get_sub_field('clone::button:type');
            $classes = ['Button'];

            if ($type != 'primary') {
                $classes[] = 'Button--' . $type;
            }

            if (!empty($class)) {
                $classes[] = $class;
            }
        ?>
        <?php if ($link = get_sub_field('clone::button:link')) : ?>
            <a class="<?= implode(' ', $classes); ?>" 
               href="<?= $link['url']; ?>" 
               target="<?= $link['target'] ? $link['target'] : '_self'; ?>">
               <?= $link['title']; ?>
            </a>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php set_query_var('buttonClasses', ''); ?>