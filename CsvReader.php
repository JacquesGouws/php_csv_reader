<?php

/*
|--------------------------------------------------------------------------------
| PHP CSV Reader
|--------------------------------------------------------------------------------
|
| Description: A simple wrapper class for extracting CSV data into an array.
| Author: Jacques Gouws
| Email: jacquesgouws.dev@gmail.com
| Date: 2024-02-17
|
*/

use League\Csv\Reader;
use League\Csv\Statement;

class CsvReader2 {

  // League CSV reader object
  private Reader $reader; 

  /*
  |
  | Create a CsvReader instance.
  | Default options will be set if not passed to the constructor
  |
  */

  public function __construct($path, $options = []) {

    $this->setReader(Reader::createFromPath($path));
    $this->initializeDefaultOptions();
    $this->initializeDefinedOptions($options);

  }
  
  /*
  |
  | Initialize default options.
  | These options will override League CSV defaults.
  |
  */

  public function initializeDefaultOptions() : void {

    $this->setDelimiter(',');
    $this->setEnclosure('"');
    $this->setEscape('\\');

  }

  /*
  |
  | Initialize defined user options.
  | Getter and Setter access methods are used to set the defined options.
  |
  */

  public function initializeDefinedOptions( array $options ) : void {

    if(!empty($options)){

      foreach ($options as $option => $value)          {
    $setterMethod = 'set' . ucfirst($option);
    if (method_exists($this, $setterMethod)) {
        $this->$setterMethod($value);
    }
}

    }

  }

  /*
  |
  | Extract the CSV data.
  | If a header offset is set, an assocciative array will be returned.
  |
  */

  public function extract($constraints = []) : array {

    $limit  = -1;
    $offset = 0;
    
    if(isset($constraints['limit'])){
      $limit = $constraints['limit'];
    }

    if(isset($constraints['offset'])){
      $offset($constraints['offset']);
    }

    $statement = Statement::create()
      ->offset($offset)
      ->limit($limit)
      ->process($this->getReader());

    return iterator_to_array($statement);

  }

  public function getReader() : Reader {return $this->reader;}
  public function setReader( Reader $reader ) : void {$this->reader = $reader;}

  public function getDelimiter(): string {return $this->getReader()->getDelimiter();}
  public function setDelimiter( string $delimiter ): void {$this->getReader()->setDelimiter($delimiter);}

  public function getEnclosure(): string {return $this->getReader()->getEnclosure();}
  public function setEnclosure( string $enclosure ): void {$this->getReader()->setEnclosure($enclosure);}

  public function getEscape(): string {return $this->getReader()->getEscape();}
  public function setEscape( string $escape ): void {$this->getReader()->setEscape($escape);}

  public function getPath() : string {return $this->getReader()->getPathname();}

  public function setEmptyRecords( bool $value ){if($value === true){$this->getReader()->includeEmptyRecords();}}
  public function getEmptyRecords(){return $this->getReader()->isEmptyRecordsIncluded();}

  public function setHeaderOffset($offset){if(is_int($offset)){$this->getReader()->setHeaderOffset($offset);}}
  public function getHeaderOffset(){return $this->getReader()->getHeaderOffset();}


}

?>