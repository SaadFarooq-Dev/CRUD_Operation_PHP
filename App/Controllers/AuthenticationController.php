<?php

include_once('../Models/Authentication.php');

if (isset($_POST['login'])) {

    $valid = Auth::login($_POST['username'], $_POST['password']);
    if ($valid == true) {
        header('Location: ' . '../../company/index.php');
        exit;
    }

    if ($valid == false) {
        header('Location: ' . '../../login.php?status=InvalidUsernameOrPassword');
        exit;
    }
} else if (isset($_POST['logout'])) {
    Auth::logout();
    header('Location: ' . '../../login.php');
    exit;
}
