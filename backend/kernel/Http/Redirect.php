<?php

namespace App\Kernel\Http;

class Redirect implements RedirectInterface
{
    public function to(string $uri)
    {
        return header("Location: $uri");
        // exit;
    }

    public function back()
    {
        return header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}
