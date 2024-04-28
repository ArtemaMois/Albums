<?php 

namespace App\Kernel\Controller;

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

abstract class Controller
{
    public ViewInterface $view;
    public RequestInterface $request;
    public RedirectInterface $redirect;

    public SessionInterface $session;

    public DatabaseInterface $database;

    public AuthInterface $auth;

    public function view(string $name): void
    {
        $this->view->page($name);
    }

    public function setView(ViewInterface $view)
    {
        $this->view = $view;
    }

    public function setRequest(RequestInterface $request)
    {
        $this->request = $request;
    }

    public function request()
    {
        return $this->request;
    }

    public function setRedirect(RedirectInterface $redirect)
    {
        $this->redirect = $redirect;
    }

    public function redirectTo(string $uri)
    {
        $this->redirect->to($uri);
    }

    public function redirectBack()
    {
        $this->redirect->back();
    }

    public function setSession(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function session()
    {
        return $this->session;
    }

    public function setDatabase(DatabaseInterface $db)
    {
        $this->database = $db;
    }

    public function database(): DatabaseInterface
    {
        return $this->database;
    }

    public function setAuth(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function auth()
    {
        return $this->auth;
    }
}