1. Install and activate the Advanced Custom Fields plugin from the WordPress Plugin Directory.

2. Once activated, you will see a new menu item called "Custom Fields" in your WordPress admin panel. Click on "Custom Fields" and then "Add New" to create a new custom field group.

3. In the field group settings, you can define the custom fields you want to add. Click on "Add Field" to create a new field. You can choose various field types such as text, textarea, checkbox, etc., and set the desired options.

4. Once you have created the custom fields, save the field group.

5. Now, open the template file where you want to display the custom fields (e.g., single.php or content.php).

6. To display the custom field value in the template, you can use the `get_field()` function provided by the ACF plugin. For example:

```php
<?php
$custom_field_value = get_field('custom_field_name');
if ($custom_field_value) {
    echo $custom_field_value;
}
?>
```

Replace `'custom_field_name'` with the name you assigned to the custom field in the ACF settings.

7. Save the template file, and the custom field value should now be displayed in the appropriate location on your posts.
