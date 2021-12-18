<?php

include_once 'Model.php';

class Company extends Model
{

    protected static function table()
    {

        return parent::$table = 'company';
    }

    public static function employees($companyid)
    {

        $sql = "SELECT * FROM employee Where company_id= ?";
        return DB::query($sql, [$companyid])->fetchAll();
    }

    public static function companyprojects($companyid)
    {
        $sql = "SELECT * FROM project Where company_id= ?";
        return DB::query($sql, [$companyid])->fetchAll();
    }

    public static function companycustomers($companyid)
    {
        $sql = "SELECT customer_id FROM customercompany Where ccompany_id= ?";
        $temp = DB::query($sql, [$companyid])->fetchAll();
        $i = 0;
        $check = null;
        if (isset($temp))
            foreach ($temp as $loop) {
                $sql = "SELECT * FROM customer WHERE id= ?";
                $check[$i] = DB::query($sql, [$loop['customer_id']])->fetch();
                $i = $i + 1;
            }
        return $check;
    }
}
