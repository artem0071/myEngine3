<?php


class Artist
{
    public static function toEnter()
    {
        dd($_POST);
        $login = $_POST['Login'];
        $pass = $_POST['Pass'];

        $User = App::DB()->select('Artists','*',"where `Artist_Login` = '{$login}' and `Artist_Pass` = '{$pass}'");

        if (count($User) == 1) {

            $User = $User[0];

            $_SESSION['Login'] = $User['Artist_Login'];
            $_SESSION['Pass'] = $User['Artist_Pass'];
            $_SESSION['Status'] = $User['Artist_Status'];

            redirect('/');

        }
    }

    public static function main($app,$word)
    {
        echo $word['enter'].'; ';
        echo $word['hello'].' '.$app->login;
    }
}