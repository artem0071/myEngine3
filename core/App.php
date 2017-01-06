<?php


class App
{
    public $server;
    public $url;
    public $userCookie;
    public $login;
    public $pass;
    public $status;
    public $page;
    public $param;


    public function __construct($server)
    {
        $this->server = $server;

        $this->url = trim(trim($server['REDIRECT_URL']),'/');

        $urlMix = explode('/',$this->url);

        $this->page = ($urlMix[0] != '' ? $urlMix[0] : 'index');

        $this->param = (isset($urlMix[1]) ? $urlMix[1] : 'main');

        $this->userCookie = $_COOKIE;

    }

    public function checkUser()
    {

        return true;
    }

    public function render()
    {

        if ($this->checkUser() || $this->page == 'enter') {

            if (file_exists(CONTROLLERS . $this->page . '.php')) {

                $controller = $this->page;
                $method = $this->param;

                $controller = new $controller;

                if (method_exists($controller, $method))
                    $controller::$method($this);

                else require VIEWS.'404.php';

            } else require VIEWS.'404.php';

        } else redirect('/enter');
    }
}