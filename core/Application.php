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
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
        self::$ROOT_DIR = dirname(__DIR__);
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router();
        $this->file = new File();
        $this->db = new DB($_ENV['DB_SERVER'] . ":" . $_ENV['DB_PORT'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
    }
    public function run()
    {
        echo $this->router->run();;
    }
}
