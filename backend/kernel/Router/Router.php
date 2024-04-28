<?php

namespace App\Kernel\Router;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Http\Redirect;
use App\Kernel\Http\RedirectInterface;
use App\Kernel\Http\Request;
use App\Kernel\Http\RequestInterface;
use App\Kernel\Session\Session;
use App\Kernel\Session\SessionInterface;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;
use App\Kernel\View\ViewInterface;

class Router implements RouterInterface
{

    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct(    
        private ViewInterface $view,
        private RequestInterface $request,
        private RedirectInterface $redirect,
        private SessionInterface $session,
        private DatabaseInterface $db,
        private AuthInterface $auth,
    )
    {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method):void 
    {
        $route = $this->findRoute($uri, $method);
        if(!$route){
            $this->notFound();
        }

        if(is_array($route->getAction())){
            [$controller, $action] = $route->getAction();
            $controller = new $controller();

            call_user_func([$controller, 'setView'], $this->view);
            call_user_func([$controller, 'setRequest'], $this->request);
            call_user_func([$controller, 'setRedirect'], $this->redirect);
            call_user_func([$controller, 'setSession'], $this->session);
            call_user_func([$controller, 'setDatabase'], $this->db);
            call_user_func([$controller, 'setAuth'], $this->auth);
            call_user_func([$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }
    }

    private function initRoutes()
    {
        $routes = $this->getRoutes();
        foreach($routes as $route){
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }

    private function findRoute(string $uri, string $method): Route|bool
    {
        return isset($this->routes[$method][$uri]) ? $this->routes[$method][$uri] : false;
    }

    /**
     * @return Route[]
     */

    private function getRoutes(): array
    {
        return require_once APP_PATH . '/config/routes.php'; 
    }

    private function notFound()
    {
        echo "404| Not Found";
        exit();
    }
}