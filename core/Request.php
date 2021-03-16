<?php

namespace app\core;

class Request
{
    public function path()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position) {
            $path = substr($path, 0, $position);
        }
        return $path;
    }
    public function metod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function body()
    {
        $body = [];
        if ($this->metod() == 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        } else if ($this->metod() == 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        } else {
            $body = $_REQUEST;
        }
        return $body;
    }
    public function auth($username, $password)
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            return false;
        } else {
            if ($_SERVER['PHP_AUTH_USER'] == $username && $_SERVER['PHP_AUTH_PW'] == $password) {
                return true;
            } else {
                return false;
            }
        }
    }
}
