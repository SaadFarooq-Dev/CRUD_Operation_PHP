<?php

include('../Models/Customer.php');
include('../Models/customercompany.php');


if (isset($_POST['add'])) {
    //validate request data

    //insert into company

    Customer::insert([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone']

    ]);
    $sql = "SELECT * FROM Customer WHERE id=(SELECT max(id) FROM Customer)";
    $temp = DB::query($sql,)->fetch();
    $newtwmp = $temp['id'];

    foreach ((array)$_POST['company'] as $count) {
        customercompany::insert([
            'customer_id' => $newtwmp,
            'ccompany_id' => $count
        ]);
    }

    header("Location: ../../Customer/index.php");
    exit;
} else if (isset($_POST['edit'])) {

    Customer::update($_POST['id'], [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone']
    ]);
    $i = 0;
    $idcc = Customer::findidcc($_POST['id']);


    if (sizeof($idcc) <= sizeof($_POST['company'])) {

        foreach ((array)$_POST['company'] as $count) {
            if ($idcc[$i]) {
                $temp = $idcc[$i];
            };
            if (sizeof($idcc) > $i) {
                customercompany::update($temp['id'], [
                    'customer_id' => $_POST['id'],
                    'ccompany_id' => $count
                ]);
            } else if (sizeof($idcc) <= $i) {
                customercompany::insert([
                    'customer_id' => $_POST['id'],
                    'ccompany_id' => $count
                ]);
            }
            $i = $i + 1;
        }
    }

    if (sizeof($idcc) > sizeof($_POST['company'])) {
        foreach ((array)$_POST['company'] as $count) {
            $temp = $idcc[$i];
            customercompany::update($temp['id'], [
                'customer_id' => $_POST['id'],
                'ccompany_id' => $count
            ]);
            $i = $i + 1;
        }
    }
    while (sizeof($idcc) > $i) {
        $temp = $idcc[$i];
        customercompany::delete($temp['id']);
        $i = $i + 1;
    }

    header("Location: ../../Customer/show.php?id=" . $_POST['id']);
    exit;
} else if (isset($_POST['delete'])) {

    $idcc = Customer::findidcc($_POST['id']);
    foreach ($idcc as $delidcc) {

        customercompany::delete($delidcc['id']);
    }

    Customer::delete($_POST['id']);


    header("Location: ../../Customer/index.php");
    exit;
}
