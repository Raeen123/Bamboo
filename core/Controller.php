<?php

namespace app\core;

class  Controller
{
    protected $data;
    protected $path;
    protected $metod;
    protected $response;
    protected $files;

    public function __construct()
    {
        $this->data = (object) Application::$app->request->body();
        $this->path =  Application::$app->request->path();
        $this->metod =  Application::$app->request->metod();
        $this->response = Application::$app->response;
        $this->files = Application::$app->file->files;
    }
    protected function render(int $code, array|object $data = null, $status = null, $message = null)
    {
        Application::$app->response->render($code, $data, $status, $message);
    }
    protected function auth($username, $password)
    {
        return Application::$app->request->auth($username, $password);
    }
    protected function download($key, $saveFilename = null)
    {
        return Application::$app->file->downlaod($key, $saveFilename);
    }
    protected function sendFile($filename)
    {
        return Application::$app->file->sendFile($filename);
    }
    protected function apikey($length = 20)
    {
        return Application::$app->response->apikey($length);
    }
}
