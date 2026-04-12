<?php

class Router
{
    public function run()
    {
        $url = $_GET['url'] ?? '';

        // Page d'accueil
        if ($url === '') {
            return $this->callController('Home', 'index');
        }

        $parts = explode('/', trim($url, '/'));

        /**
         * ROUTES ADMIN : /admin/xxx
         */
        if ($parts[0] === 'admin') {

            // Exemple : /admin/pages/edit/12
            // $parts = ['admin', 'pages', 'edit', '12']

            $controllerName = 'Admin' . ucfirst($parts[1]) . 'Controller';
            $method = $parts[2] ?? 'index';
            $params = array_slice($parts, 3);

            return $this->dispatch($controllerName, $method, $params);
        }

        /**
         * ROUTES PAGES PUBLIQUES : /page/slug
         */
        if ($parts[0] === 'page') {

            // Exemple : /page/mon-slug
            $controllerName = 'PageController';
            $method = 'show';
            $params = [$parts[1] ?? null];

            return $this->dispatch($controllerName, $method, $params);
        }

        /**
         * ROUTES MVC CLASSIQUES : /controller/method/param
         */
        $controllerName = ucfirst($parts[0]) . 'Controller';
        $method = $parts[1] ?? 'index';
        $params = array_slice($parts, 2);

        return $this->dispatch($controllerName, $method, $params);
    }

    private function dispatch($controllerName, $method, $params)
    {
        $controllerFile = "../app/controllers/$controllerName.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                if (method_exists($controller, $method)) {
                    return call_user_func_array([$controller, $method], $params);
                }
            }
        }

        http_response_code(404);
        echo "404 - Page non trouvée";
    }

    private function callController($controller, $method)
    {
        require_once "../app/controllers/{$controller}Controller.php";
        $controllerClass = $controller . 'Controller';
        $instance = new $controllerClass();
        $instance->$method();
    }
}
