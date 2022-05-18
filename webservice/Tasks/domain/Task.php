<?php
    class Task{
        private $title;
        private $text;
        private $tag;

        public function __construct(string $title, string $text, string $tag){
            $this->title = $title;
            $this->text = $text;
            $this->tag = $tag;
        }

        public function showDetails(){
            return ['title'=> $this->title,'text'=> $this->text,'tag'=> $this->tag];
        }
    }

?>