<?php

include_once 'Model.php';

class customercompany extends Model
{

    protected static function table()
    {
        return parent::$table = 'customercompany';
    }
}
