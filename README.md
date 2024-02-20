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

$reader = new CsvReader('path/to/file.csv', [
   'delimiter' => ',',
   'enclosure' => '"',
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

Instantiate a reader object by passing the file path to the constructor. This will import the CSV document for further parsing using a set of pre-defined user options.

```php

$reader = new CsvReader('path/to/file.csv');

```


### Defining reader options

An optional array of key value pairs can be passed to the constructor to specify various reader options.

```php

$reader = new CSVReader('path/to/file.csv', [
   'delimiter'   => ',',
   'enclosure'   => '"',
   'escape'      => '//',
   'emptyRecords => true,
   'headerOffset => 0
]);

```

It is also possible to specify a path using a set method:

```php

$reader = new CsvReader();

$reader->setFile('path/to/file.csv');

```

### Specifying reader options

The following options are currently available to a reader instance:

** These options can either be set when calling the constructor or via setter methods.

```php

[

'file'         => ''
'delimiter'    => ','
'escape'       => ''
'enclosure'    => ''
'emptyRecords' => true
'headerOffset' => 0

]

```

### Retrieving reader options



