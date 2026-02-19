<?php

class Router {

    public function run() {

        $url = $_GET['url'] ?? '';

        // Si aucune URL alors redirection vers la page d'accueil
        if ($url === '') {
            $this->callController('Home', 'index');
            return;
        }

        // Découpe l’URL : /controller/method/param1/param2
        $parts = explode('/', $url);

        $controllerName = ucfirst($parts[0]) . 'Controller';
        $method = $parts[1] ?? 'index';
        $params = array_slice($parts, 2);

        $controllerFile = "../controllers/$controllerName.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                if (method_exists($controller, $method)) {
                    call_user_func_array([$controller, $method], $params);
                    return;
                }
            }
        }

        // Si aucune correspondance trouvée alors on lance une erreur 404
        http_response_code(404);
        echo "404 - Page non trouvée";
    }

    private function callController($controller, $method) {
        require_once "../controllers/{$controller}Controller.php";
        $controllerClass = $controller . 'Controller';
        $instance = new $controllerClass();
        $instance->$method();
    }
}
