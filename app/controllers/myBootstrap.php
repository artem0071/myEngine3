<?php

class myBootstrap
{

    public static function Header($page,$word)
    {
        $mainCSS = array('bootstrap','bootstrap-theme');
        $mainJS = array('jquery-3.1.1','bootstrap');

        $title = 'No Title';

        switch ($page){
            case 'artist':
                $title = $word['main'];
                $myCSS = $mainCSS;
                $myJS = $mainJS;
                break;
            default:
                $title = '404';
                $myCSS = $mainCSS;
                $myJS = $mainJS;
        }

        require VIEWS.'bootstrap/header.php';

    }

    public static function Footer($page)
    {
        $mainCSS = array();
        $mainJS = array();

        switch ($page){
            case 'artist':
                $myCSS = $mainCSS;
                $myJS = $mainJS;
                break;
            default:
                $myCSS = $mainCSS;
                $myJS = $mainJS;
        }

        require VIEWS.'bootstrap/footer.php';
    }
}