<?php

namespace app\core;

class  Controller
{
    protected $data;
    protected $path;
    protected $metod;
    protected $response;

    public function __construct()
    {
        $this->data = (object) Application::$app->request->body();
        $this->path =  Application::$app->request->path();
        $this->metod =  Application::$app->request->metod();
        $this->response = Application::$app->response;
    }
    protected function render(int $code, array|object $data = null, $status = null, $message = null)
    {
        Application::$app->response->render($code,$data,$status,$message);
    }
}
