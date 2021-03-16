<?php

namespace app\core;

class File
{
    public $files;
    private $archive = __DIR__ . '/../archive/';
    public function __construct()
    {
        $this->files = json_decode(json_encode($_FILES));
    }
    public function downlaod($key, $saveFilename = null)
    {
        if ($this->files->{$key}->error == 0) {
            if (is_null($saveFilename)) {
                move_uploaded_file($this->files->{$key}->tmp_name, $this->archive . $this->files->{$key}->name);
            } else {
                move_uploaded_file($this->files->{$key}->tmp_name, $this->archive . $saveFilename);
            }
        } else {
            return $this->files->{$key}->error;
        }
    }
    public function sendFile($filename)
    {
        $path = $this->archive . $filename;
        if (is_file($path)) {
            header("Content-disposition: attachment;filename=$path");
            readfile($path);
        } else {
            return "file does not exsits";
        }
    }
}
