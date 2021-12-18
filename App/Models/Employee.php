<?php

include_once 'Model.php';

include_once 'Company.php';
include_once 'Project.php';

class Employee extends Model
{

    protected static function table()
    {

        return parent::$table = 'employee';
    }
    public static function company($id)
    {

        $company = Company::find($id);
        return $company['name'];
    }
    public static function project($id)
    {

        $project = Project::find($id);
        return $project['name'];
    }
}
