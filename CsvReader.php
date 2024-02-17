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
  
  class CsvReader{

    // Encoding Character
    private string $encoding;

    // Delimiter Character
    private string $delimiter;

    // Enclosure Character
    private string $enclosure;

    // Escape Character
    private string $escape;

    // Path to the CSV file
    private string $file;

    // Flag - Determines if empty records should be included in array output.
    private bool $includeEmptyRecords;
    
    // Flag - Determines the offset of the header record
    private int $headerOffset;

    // League CSV reader object
    private Reader $reader;

    /*
    |
    | Create a CsvReader instance.
    | Default options will be set if not passed to the constructor
    |
    */

    public function __construct(array $options = []){

      $this->initializeDefaultOptions();

      if(!empty($options)){

          $this->initializeDefinedOptions($options);

          if($this->getFile() !== null){
            $this->initializeReader();
          }

      }

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
      $this->setEncoding('');
      $this->setEscape('');

      $this->setIncludeEmptyRecords(true);
      $this->setHeaderOffset(0);

    }

    /*
    |
    | Initialize defined user options.
    | Getter and Setter access methods are used to set the defined options.
    |
    */

    public function initializeDefinedOptions(array $options) : void {

      foreach ($options as $key => $value) {

        $setter = 'set' . ucfirst($key);

        if (method_exists($this, $setter)) {
            $this->$setter($value);
        }

      }

    }

    /*
    |
    | Initialize the main reader object.
    | Options and flags are set based on this instance properties.
    |
    */

    public function initializeReader(){

      $reader = Reader::createFromPath($this->getFile(), 'r');
      $reader->setDelimiter($this->getDelimiter());
      $reader->setEnclosure($this->getEnclosure());

      if($this->getIncludeEmptyRecords() === true){
        $reader->includeEmptyRecords();
      }

      if(is_int($this->getHeaderOffset())){
        $reader->setHeaderOffset($this->getHeaderOffset());
      }

      $this->setReader($reader);

    }

    /*
    |
    | Extract the CSV data.
    | If a header offset is set, an assocciative array will be returned.
    |
    */

    public function extract() : array {

      $this->initializeReader();
      return iterator_to_array($this->getReader()->getRecords());

    }

    /*
    |
    | Getter and Setter mutator methods.
    |
    */

    public function getEncoding(): string {return $this->encoding;}
    public function setEncoding(string $encoding): void {$this->encoding = $encoding;}

    public function getDelimiter(): string {return $this->delimiter;}
    public function setDelimiter(string $delimiter): void {$this->delimiter = $delimiter;}

    public function getEnclosure(): string {return $this->enclosure;}
    public function setEnclosure(string $enclosure): void {$this->enclosure = $enclosure;}
    
    public function setReader( Reader $reader ) : void {$this->reader = $reader;}
    public function getReader() : Reader {return $this->reader;}

    public function setFile(string $file) : void {$this->file = $file;}
    public function getFile() : string {return $this->file;}

    public function getEscape(){return $this->escape;}
    public function setEscape($escape){$this->escape = $escape;}

    public function setIncludeEmptyRecords(bool $option){$this->includeEmptyRecords = $option;}
    public function getIncludeEmptyRecords(){return $this->includeEmptyRecords;}

    public function setHeaderOffset($offset){$this->headerOffset = $offset;}
    public function getHeaderOffset(){return $this->headerOffset;}

  }


?>