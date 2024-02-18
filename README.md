### PHP CSV Reader

Easily parse csv documents and extract records using a minimalist syntax.

### Table of Content

### Introduction

### Dependencies

- League CSV 7.4
- PHP 7.4


### Quick start example

The example below prints all csv records from a file as an associative array.

```php

<?php

require 'vendor/autoload.php'
require 'php_csv_reader';

$reader = new CsvReader([
 'file' => 'path/to/file.csv'
]);

$records = $reader->extract();

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

// Instanting a reader with default options
$reader = new CsvReader();

// Instantiating a reader with user defined options
$reader = new CsvReader([
 // options
]);

```

### Importing a csv document

```php

$reader = new CSVReader();

```

```php

$reader->load('sample.csv');

``` php_csv_reader
A simple wrapper class for extracting CSV data into an array.


