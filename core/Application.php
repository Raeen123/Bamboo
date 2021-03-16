<?php

namespace app\core;

use Dotenv\Dotenv;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public File $file;
    public DB $db;
    public static Application $app;
    public function __construct($rootPath)
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
        self::$ROOT_DIR = dirname($rootPath);
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router();
        $this->file = new File();
        $this->db = new DB($_ENV['SERVERNAME'] . ":" . $_ENV['PORT'], $_ENV['USERNAME'], $_ENV['PASSWORD'], $_ENV['DATABASENAME']);
    }
    public function run()
    {
        echo $this->router->run();;
    }
}
