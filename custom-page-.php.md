```php
<?php
    /*
    * Template Name: Custom Pages Template
    */

    get_header();

    // Start the loop
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>

            <h1><?php the_title(); ?></h1>
            <div class="entry-content">
                <?php the_content(); ?>

                <?php
                // Retrieve all pages
                $pages = get_pages();

                foreach ($pages as $page) {
                    $page_url = get_permalink($page->ID);
                    $page_title = $page->post_title;
                    $page_image = get_the_post_thumbnail_url($page->ID);

                    echo '<div class="page-item">';
                    echo '<a href="' . $page_url . '">' . $page_title . '</a>';

                    if ($page_image) {
                        echo '<img src="' . $page_image . '" alt="' . $page_title . '">';
                    }

                    echo '</div>';
                }
                ?>
            </div>

            <?php
        }
    }

    get_footer();
?>

```
