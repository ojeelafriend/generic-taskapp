<?php
    class FieldException extends Exception{
        public function __construct($message, $code = 0, $previous = null){
            parent::__construct($message, $code, $previous);
        }

        public function toString() {
            return __CLASS__ . ": [{$this->code}]: {$this->message} \n";
        }
    }
?>