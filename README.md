With this library you can easily manage your plugin's options, with the best and efficient way.

### How to install the library
The recommended way to install this library in your project is by loading it through Composer:
```php
composer require deliciousbrains/wp-background-processing
```

### How to use this library

```php
wp_options_manager()->update( 'test-option-key', 'test-option-value' )->save(); // Updating an option

wp_options_manager()->update( 'test-option-key', 'test-option-value' )->update( 'test-option-key2', 'test-option-value2' )->save(); // Updating two options in a row

wp_options_manager()->select( 'test-option-key' ); // Getting an option => Output = 'test-option-value
//'
wp_options_manager()->delete( 'test-option-key' ); // Deleting an option => Output = 'test-option-value'
```

### Where can we find the data in the database
All data are saved in one key in options table in the database. the key name is totally equal to the slug of your plugin.
the name will be chosen automatically.