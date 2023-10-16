<?php 
$class = get_query_var('buttonClass', ''); 
$customLink = get_query_var('buttonLink', '');
$customLinkTitle = get_query_var('buttonLinkTitle', '');

$classes = ['Button'];
if (!empty($class)) {
    $classes[] = $class;
}
?>

<?php if (have_rows('clone::button')) : ?>
    <?php while (have_rows('clone::button')) : the_row(); ?>
        <?php
            $type = get_sub_field('clone::button:type');

            if ($type != 'primary') {
                $classes[] = 'Button--' . $type;
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
<?php elseif (!empty($customLink) && !empty($customLinkTitle)) : ?>
    <a class="<?= implode(' ', $classes); ?>" 
        href="<?= $customLink; ?>">
        <?= $customLinkTitle; ?>
    </a>
<?php endif; ?>

<?php 
set_query_var('buttonClass', ''); 
set_query_var('buttonLink', '');
set_query_var('buttonLinkTitle', '');
?>