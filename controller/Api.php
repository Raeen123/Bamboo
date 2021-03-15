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
            $this->render(200,null,null,"data is set");
        }
    }
    //No Request
    public function __noRequest($name)
    {
        if (isset($name)) {
            $query = DB::query("SELECT * FROM user WHERE name=?", $name);
            $result = $query->fetch(PDO::FETCH_OBJ);
            if (!$result) {
                $this->render(404);
            } else {
                $this->render(200, ['person' => $result]);
            }
            
        }
    }
    //api info
    public function info()
    {
        $this->render(200, [
            'FOR INSERT' => [
                'METOD' => 'POST',
                'PARAMETER' => 'NAME'
            ],
            'FOR SELECT' => [
                'METOD' => 'LINK',
                'PARAMETER' => '/api/{NAME}'
            ],
        ]);
    }
}
