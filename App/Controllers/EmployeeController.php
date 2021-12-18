<?php

include('../Models/Employee.php');

if (isset($_POST['add'])) {
    //validate request data

    //insert into company

    Employee::insert([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'company_id' => $_POST['company'],
        'project_id' => $_POST['project']


    ]);

    header("Location: ../../employee/index.php");
    exit;
} else if (isset($_POST['edit'])) {

    Employee::update($_POST['id'], [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'company_id' => $_POST['company'],
        'project_id' => $_POST['project']



    ]);

    header("Location: ../../employee/show.php?id=" . $_POST['id']);
    exit;
} else if (isset($_POST['delete'])) {
    Employee::delete($_POST['id']);
    header("Location: ../../employee/index.php");
    exit;
}
