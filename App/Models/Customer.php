<?php

include_once 'Model.php';

class Customer extends Model
{

    protected static function table()
    {
        return parent::$table = 'customer';
    }

    public static function companies($customer_id)
    {

        $sql = "SELECT ccompany_id FROM customercompany Where customer_id= ?";
        $temp = DB::query($sql, [$customer_id])->fetchAll();
        $check = null;
        $i = 0;
        foreach ($temp as $loop) {
            $sql = "SELECT * FROM company WHERE id= ?";
            $check[$i] = DB::query($sql, [$loop['ccompany_id']])->fetch();
            $i = $i + 1;
        }
        return $check;
    }

    public static function findidcc($customer_id)
    {
        $sql = "SELECT id FROM customercompany Where customer_id= ?";
        $temp = DB::query($sql, [$customer_id])->fetchAll();
        return $temp;
    }
    public static function customerprojects($customerid)
    {
        $sql = "SELECT * FROM project Where customer_id= ?";
        return DB::query($sql, [$customerid])->fetchAll();
    }
}
