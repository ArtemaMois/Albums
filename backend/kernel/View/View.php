<?php

namespace App\Kernel\View;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session\Session;
use App\Kernel\Session\SessionInterface;

class View implements ViewInterface
{

    public function __construct(
        private SessionInterface $session,
        private AuthInterface $auth
    ){

    }
    public function page(string $page): void
    {

        $filePath = APP_PATH . "/views/pages/$page.php";

        if(!file_exists($filePath)){
            throw new ViewNotFoundException("View $page not found");
        }

        extract($this->defaultData());

        include_once $filePath;

    }

    public function component(string $component):void
    {

        $filePath = APP_PATH . "/views/components/$component.php";

        if(!file_exists($filePath)){
            echo "View $component not found";
            return ;
        }

        extract($this->defaultData());

        include_once $filePath;
    }

    public function defaultData(): array
    {
        return [
            'view' => $this,
            'session' => $this->session, 
            'auth' => $this->auth
        ];
    }

}