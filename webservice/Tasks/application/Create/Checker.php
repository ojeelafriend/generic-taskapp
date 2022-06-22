<?php


class Checker
{
    private $error = [];

    public function verify(string $title, string $text, string $tag)
    {

        if (!isset($title, $text, $tag)) {
            array_push($this->error, "All three fields are strictly required");
        } //!check isset

        if (strlen($title) > 15) {
            array_push($this->error, "The title exceeds the maximum number of characters");
        }
        if (strlen($title) < 6) {
            array_push($this->error, "The title is less than the minimum number of characters");
        }

        if (strlen($text) > 300) {
            array_push($this->error, "The text is exceeds the maximum number of characters");
        }
        if (strlen($text) < 20) {
            array_push($this->error, "The text is less than the minimum number of characters");
        }

        if (strlen($tag) > 15) {
            array_push($this->error, "The tag exceeds the maximum number of characters");
        }

        if (count($this->error) > 0) {
            $errors = implode(", ", $this->error);
            throw new FieldException($errors, count($this->error));
        }
    }

    public function convert($title, $text, $tag)
    {
        $title = trim($title);
        $text = trim($text);
        $tag = trim($tag);

        return ['title' => $title, 'text' => $text, 'tag' => $tag];
    }
}
