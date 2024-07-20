<ul>
    <?php foreach (wp_get_nav_menu_items(12) as $menu_item): ?>
        <?php if($menu_item->menu_item_parent == 0): ?>
        <li>
            <a href="<?php echo esc_url($menu_item->url);?>">
                <?php echo esc_html($menu_item->title);?>
            </a>
        </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
