<?php

include_once 'Model.php';

class Auth extends Model
{
    protected static function table()
    {
        return parent::$table = 'user';
    }

    public static function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username= ? AND password= ?";
        $user = DB::getInstance()->prepare($sql, [$username, $password])->fetch();
        if ($user == NULL) {
            echo 'Invalid Username Or Password';
            return false;
        }
        Auth::setSession($user);
        return true;
    }

    public static function logout()
    {
        Auth::unsetSession();
    }

    public static function name()
    {
        return $_SESSION['name'];
    }

    protected static function setSession($user)
    {
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
    }

    public static function valid()
    {
        if (isset($_SESSION['name']))
            return true;
        return false;
    }

    protected static function unsetSession()
    {
        session_start();
        session_unset();
        session_destroy();
    }
}
