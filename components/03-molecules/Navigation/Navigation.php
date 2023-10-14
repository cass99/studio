<?php
$menu = get_query_var('type') ?: 'header';
$class = get_query_var('class') ?: $menu;
?>

<?php if (has_nav_menu($menu)) : ?>
    <nav class="Navigation Navigation--<?= $class ?>">
        <ul class="Navigation__list">
            <?php foreach (getMenu($menu) as $id => $item) : ?>
                <li class="Navigation__item <?= implode(' ', $item['classes']); ?>">
                    <a href="<?= $item['url']; ?>" 
                       target="<?= $item['target']; ?>"
                       class="Navigation__link <?= get_the_ID() === $id ? 'Navigation__link--active' : ''; ?>">
                       <?= $item['title']; ?>
                    </a>

                    <?php if (isset($item['children']) && count($item['children']) > 0) : ?>
                        <ul class="Navigation__childList">
                        <?php foreach ($item['children'] as $child) : ?>
                            <li class="Navigation__childItem <?= implode(' ', $item['classes']); ?>">
                                <a href="<?= $child['url']; ?>" 
                                    target="<?= $child['target']; ?>"
                                    class="Navigation__childLink <?= get_the_ID() === $id ? 'Navigation__item--active' : ''; ?>">
                                    <?= $child['title']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php
set_query_var('type', false);
set_query_var('class', false);
