<?php

include('../Models/Company.php');



$nameerr = $phoneerr = $addresserr = $websiteerr = "";
if (isset($_POST['add'])) {
    //validate request data

    //insert into company

    Company::insert([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'website' => $_POST['website']


    ]);

    header("Location: ../../company/index.php");
    exit;
} else if (isset($_POST['edit'])) {

    Company::update($_POST['id'], [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'website' => $_POST['website']


    ]);

    header("Location: ../../company/show.php?id=" . $_POST['id']);
    exit;
} else if (isset($_POST['delete'])) {
    Company::delete($_POST['id']);
    header("Location: ../../company/index.php");
    exit;
}
