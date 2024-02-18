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

Instantiate a reader object that uses a set of pre-defined options by passing no arguments to the constructor:

```php

$reader = new CsvReader();

```

Or instantiate a reader object using specified options by passing an array of key value pairs:

```php

$reader = new CsvReader([
 'headerOffset' => 0,
 'emptyRecords' => false
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


