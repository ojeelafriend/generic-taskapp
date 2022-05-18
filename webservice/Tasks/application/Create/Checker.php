<?php

class Checker{

    //? configurar variables de entorno para mejores customizaciones con el tiempo
      /*public $titleLengthMax = $_ENV["TITLELENGTH_MAX"];
      
      public $titleLengthMin = $_ENV['TITLELENGTH_MIN'];

      public $textLengthMax = $_ENV['TEXTLENGTH_MAX'];
      public $textLengthMin = $_ENV['TEXTLENGTH_MIN'];

      public $tagLengthMax = $_ENV['TAGLENGTH_MAX'];*/

    public $error = [];

    public function showErrors(){
        return $this->error;
    }
    
    public function verify(string $title, string $text, string $tag){
        echo $title, "//", $text, "//", $tag;

        if(!isset($title, $text, $tag)){
            array_push($this->error, "All three fields are strictly required");
        } //!check isset

        if(strlen($title) > 15 ){
            array_push($this->error, "The title exceeds the maximum number of characters");
        }
        if(strlen($title) < 6){
            array_push($this->error,"The title is less than the minimum number of characters");
        }

        if(strlen($text) > 300){
            array_push($this->error, "The text is exceeds the maximum number of characters");
        }
        if(strlen($text) < 20){
            array_push($this->error,"The text is less than the minimum number of characters");
        }

        if(strlen($tag) > 15){
            array_push($this->error,"The tag exceeds the maximum number of characters");
        }

        if(count($this->error) > 0){
            echo count($this->error);
            throw new Exception('Error detected in the verify method');
        }

    }
    
    public function convert($title, $text, $tag){
        $title = trim($title);
        $text = trim($text);
        $tag = trim($tag);

        return ['title' => $title, 'text' => $text, 'tag' => $tag];
    }

}

?>