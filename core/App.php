<?php


class App
{
    public $url;
    public $page;
    public $param;
    public $login;
    public $pass;
    public $status;
    public $sysLang;
    public $cookies;
    public $server;


    public static function DB(){
        $config = require 'config.php';
        return new QueryBuilder(Connection::make($config['database']));
    }

    public function __construct($server)
    {
        $this->server = $server;

        $this->url = trim($server['REQUEST_URI'],'/');

        $mixURL = explode('/',$this->url);

        $this->page = ($mixURL[0] != '' ? $mixURL[0] : 'artist');
        $this->param = ((isset($mixURL[1]) && $mixURL[1] != '') ? $mixURL[1] : 'main');

        $this->sysLang = $server['HTTP_ACCEPT_LANGUAGE'];

    }

    public function render()
    {

        if (file_exists(MODULES.$this->sysLang.'.php'))
            $word = require MODULES.'Lang/'.$this->sysLang.'.php';
        else $word = require MODULES.'Lang/'.'ru.php';

        myBootstrap::Header($this->page,$word);

        $allowePages = array();

        if ($this->checkUser()
            || in_array($this->page,$allowePages)
            || ($this->page == 'artist' && $this->param == 'toEnter'))
        {
            if (file_exists(CONTROLLERS.$this->page.'.php')){

                $controller =  $this->page;
                $method = $this->param;

                $controller = new $controller();

                if (method_exists($controller,$method)){

                    $controller::$method($this,$word);

                } else require VIEWS.'404.php';

            } else require VIEWS.'404.php';

        } else require VIEWS.'enter.php';

        myBootstrap::Footer($this->page);

    }

    public function checkUser()
    {

        if (isset($_SESSION['Login'])
            || isset($_SESSION['Pass'])
            || isset($_SESSION['Status']))
        {

            if (isset($_SESSION['Login'])
                && isset($_SESSION['Pass'])
                && isset($_SESSION['Status']))
            {

                $login = $_SESSION['Login'];
                $pass = $_SESSION['Pass'];
                $status = $_SESSION['Status'];

                $User = App::DB()->select('Artists','*',"where `Artist_Login` = '{$login}' and `Artist_Pass` = '{$pass}' and `Artist_Status` = '{$status}'");

                if (count($User) == 1) {

                    $User = $User[0];

                    $this->login = $User['Artist_Login'];
                    $this->pass = $User['Artist_Pass'];
                    $this->status = $User['Artist_Status'];

                    return true;
                }
                else redirect('/artist/toExit');

            } else redirect('/artist/toExit');

        } return false;

    }

}