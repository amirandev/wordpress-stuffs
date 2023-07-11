To write a custom SQL query in WordPress, you can use the `$wpdb` (WordPress Database) class, which provides functions and methods for interacting with the WordPress database. Here's a step-by-step guide:

1. Initialize the `$wpdb` object: Start by globalizing the `$wpdb` object in your code to access its methods. Add the following line at the beginning of your code:

```php
global $wpdb;
```

2. Write your SQL query: Compose your custom SQL query according to your requirements. Here's an example of a simple query that selects all posts from the WordPress database:

```php
$query = "SELECT * FROM $wpdb->posts";
```

3. Execute the query: To execute the query, use the `$wpdb` object's `get_results()` method. It will return an array of results matching the query.

```php
$results = $wpdb->get_results($query);
```

4. Process the results: You can then loop through the results to access and manipulate the data as needed. Here's an example of iterating through the results and displaying the post titles:

```php
if (!empty($results)) {
    foreach ($results as $post) {
        echo $post->post_title . '<br>';
    }
}
```
