<?php

include_once 'Model.php';
include_once 'Company.php';
include_once 'Customer.php';

class Project extends Model
{

    protected static function table()
    {

        return parent::$table = 'project';
    }

    public static function company($id)
    {

        $company = Company::find($id);
        return $company['name'];
    }
    public static function customer($id)
    {

        $customer = Customer::find($id);
        return $customer['name'];
    }
    public static function employees($projectid)
    {
        $sql = "SELECT * FROM employee Where project_id= ?";
        return DB::query($sql, [$projectid])->fetchAll();
    }
}
