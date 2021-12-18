<?php

include('../Models/Project.php');

if (isset($_POST['add'])) {
    //validate request data

    //insert into project

    Project::insert([
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'budget' => $_POST['budget'],
        'start_date' => $_POST['start_date'],
        'end_date' => $_POST['end_date'],
        'company_id' => $_POST['company'],
        'customer_id' => $_POST['customer']
    ]);

    header("Location: ../../Project/index.php");
    exit;
} else if (isset($_POST['edit'])) {

    Project::update($_POST['id'], [

        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'budget' => $_POST['budget'],
        'start_date' => $_POST['start_date'],
        'end_date' => $_POST['end_date'],
        'company_id' => $_POST['company'],
        'customer_id' => $_POST['customer']



    ]);

    header("Location: ../../Project/show.php?id=" . $_POST['id']);
    exit;
} else if (isset($_POST['delete'])) {
    Project::delete($_POST['id']);
    header("Location: ../../Project/index.php");
    exit;
}
