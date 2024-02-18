### PHP CSV Reader

Easily parse csv documents and extract records using a minimalist syntax.

### Table of Content

### Introduction

### Dependencies

This wrapper is an abstraction layer build from the popular League CSV package. You can use composer to easily require it.

** We have chosen the latest version of the package compatible with PHP 7.4

```php

composer require League/CSV:7.8

```


### Quick start example

The example below saves all csv records from a file as an associative array.

```php

<?php

// Require the composer autoloader
require 'vendor/autoload.php'

// Require the csv reader wrapper class
require 'php_csv_reader';

// Create a new Reader instance with user defined options.
$reader = new CsvReader([
 'file' => 'path/to/file.csv'
]);

// Extract the records into an array
$records = $reader->extract();

// Print the output
print_r($records);

?>

```

### Adding the dependencies

This class is dependent on the popular league\csv composer package. Add it to your project with the following composer command:

```

composer require league/csv:^9.0

```

Once the package is installed, simply require the autoloader and the wrapper class.

```php

require 'vendor/autoload.php';
require 'php_csv_reader';

```

### Creating a reader object

```php

$reader = new Reader();

```

### Importing a csv document

```php

$reader = new Reader('sample.csv');

```

```php

$reader->load('sample.csv');

``` php_csv_reader
A simple wrapper class for extracting CSV data into an array.


