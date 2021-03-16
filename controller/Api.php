<?php

namespace app\controller;

use app\core\Controller as Controller;
use app\core\DB;
use PDO;

class Api extends Controller
{
    public function post()
    {
        if (isset($this->data->name)) {
            DB::query("INSERT user SET name=?", $this->data->name);
            $this->render(200, null, null, "data is set");
        }
    }
    public function file()
    {
        if ($this->files->userfile) {
            $this->download('userfile');
            $this->sendFile($this->files->userfile->name);
        }
    }
    public function router($name)
    {
        if (isset($name) and $this->auth('raeen', 123)) {
            $query = DB::query("SELECT * FROM user WHERE name=?", $name);
            $result = $query->fetch(PDO::FETCH_OBJ);
            if (!$result) {
                $this->render(404);
            } else {
                $this->render(200, ['person' => $result]);
            }
        }
    }
}
