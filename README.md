With this library, you can easily manage your plugin's options, in the best and most efficient way.

### How to install the library
The recommended way to install this library in your project is by loading it through Composer:
```php
composer require iranimij/wp-options-manager
```

### How to use this library

```php
// Updating an option
wp_options_manager()->update( 'test-option-key', 'test-option-value' )->save();

// Updating two options in a row
wp_options_manager()->update( 'test-option-key', 'test-option-value' )->update( 'test-option-key2', 'test-option-value2' )->save();

// Updating multiple keys in just one array
wp_options_manager()->update( [
    'first-key' => 'first-value',
    'second-key' => 'second-value',
    'third-key' => 'third-value',
] )->save();

// Getting an option => Output = 'test-option-value
wp_options_manager()->select( 'test-option-key' );

// Deleting an option
wp_options_manager()->delete( 'test-option-key' );
```

### Where can we find the data in the database
All data are saved in one key in options table in the database. the key name is totally equal to the slug of your plugin.
the name will be chosen automatically.