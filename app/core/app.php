<?php

class App
{
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Build controller path
        $controllerPath = "app/controllers/" . strtolower($url[0]) . ".php";

        // Check if controller file exists
        if (file_exists($controllerPath)) {
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        } else {
            // Use _404 controller if not found
            require "app/controllers/404.php";
            $this->controller = new _404();
            $this->controller->index();
            exit;
        }

        // Include the controller file
        require $controllerPath;

        // Instantiate the controller
        $this->controller = new $this->controller;

        // Check if method exists in controller
        if (isset($url[1])) {
            $url[1] = strtolower($url[1]);
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Remaining values are parameters
        $this->params = (count($url) > 0) ? array_values($url) : [];

        // Call controller method with parameters
        call_user_func_array([$this->controller, $this->method], $this->params);
        show($url);
    }

    private function parseURL()
    {
        // Default to 'home' if no URL is provided
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        $url = trim($url, "/");

        // Prevent empty array
        if ($url == "") {
            $url = "home";
        }

        // Sanitize and split URL
        return explode("/", filter_var($url, FILTER_SANITIZE_URL));
    }
}
