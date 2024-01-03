<?php
namespace App\config;

class Cookie{
    private $cookie;

    public function __construct($cookie)
    {
        $this->cookie = $cookie;
    }

    public function set($name, $value)
    {
        setcookie($name, $value, time() + 365 * 24 * 3600, null, null, false, true);
    }

    public function get($name)
    {
        if(isset($_COOKIE[$name])) {
            return $_COOKIE[$name];
        }
    }

    public function show($name)
    {
        if(isset($_COOKIE[$name]))
        {
            $key = $this->get($name);
            return $key;
        }
    }
    public function remove($name){
        setcookie($name, '', time() + 365 * 24 * 3600, null, null, false, true);
    }
}
