To add custom fields to a WordPress post and display them in a template, you can follow these steps:

1. Open the WordPress admin panel and navigate to the post editor for the post you want to add custom fields to.

2. Scroll down to the bottom of the editor screen, and you should see a section called "Custom Fields" or "Post Attributes" (depending on your WordPress version).

3. If you don't see the "Custom Fields" section, click on the "Screen Options" tab at the top-right corner of the screen and make sure the "Custom Fields" option is checked.

4. In the "Custom Fields" section, you will find two input fields: "Name" and "Value." Enter your custom field name (e.g., "custom_field_name") in the "Name" field and the corresponding value (e.g., "custom_field_value") in the "Value" field. Then click the "Add Custom Field" button.

5. Repeat step 4 to add any additional custom fields you need for the post.

6. Now, let's display the custom fields in your template. Open the theme file where you want to display the custom fields (e.g., single.php or content.php).

7. Find the place in the template where you want to display the custom fields and insert the following code:

```php
<?php
$custom_field_value = get_post_meta(get_the_ID(), 'custom_field_name', true);
if ($custom_field_value) {
    echo $custom_field_value;
}
?>
```

Replace `'custom_field_name'` with the actual name you used in step 4.

8. Save the template file, and the custom field value should now be displayed in the appropriate location on your posts.
