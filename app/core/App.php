<?php
session_start();
class App {

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    
    public function __construct() {

        $url = $this->parseUrl();
        

        if(isset($url[0])){
            if (file_exists('app/controllers/' . ucfirst($url[0]) . '.php')) {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            }else{
                return exit("File doesn't exist");
            }
        }
        
        require_once 'app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        if (isset($url[1])) {

            if (method_exists($this->controller, $url[1])) {

                $this->method = $url[1];
                unset($url[1]);
            }
            else{
                return exit("Method doesn't exist");
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    
    public function parseUrl() {

        if (isset($_GET['url'])) {

            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}
