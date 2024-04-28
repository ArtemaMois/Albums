<?php 

namespace App\Kernel\Session;

interface SessionInterface
{
    public function set(string $key, $value): void;
    public function get(string $key, $default = null);
    public function getFlash(string $key, $default = null);
    public function has($key);
    public function remove($key);
    public function destroy();
}