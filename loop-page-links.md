```php
$pages = get_pages();

foreach ( $pages as $page ) {
    $page_title = $page->post_title;
    $page_link = get_permalink( $page->ID );

    echo '<a href="' . $page_link . '">' . $page_title . '</a><br>';
}

```
