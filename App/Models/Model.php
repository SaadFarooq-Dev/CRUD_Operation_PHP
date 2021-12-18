<?php

//include_once 'C:\wamp64\www\Companyemployee\App\Database\DB.php';
include_once ($_SERVER['DOCUMENT_ROOT']) . '/Companyemployee/App/Database/DB.php';
include_once ($_SERVER['DOCUMENT_ROOT']) . '/Companyemployee/App/Traits/Arrays.php';


abstract class Model
{
    use Arrays;

    protected static $table;
    protected abstract static function table();

    public static function all()
    {

        $sql = "SELECT * FROM " . static::table() . ";";

        return DB::query($sql)->fetchAll();
    }

    public static function find($id)
    {

        $sql = "SELECT * FROM " . static::table() . " Where id = ?;";

        return DB::query($sql, [$id])->fetch();
    }




    public static function insert($params)
    {
        $sql = "INSERT INTO " . static::table() . "(" . self::getKeysStrings($params) . ") VALUES(" . self::getBlanks($params) .  ");";

        // echo '<pre>';
        // print_r(self::getValuesArray($params));
        // echo $sql;
        return DB::query($sql, self::getValuesArray($params));
    }
    public static function update($id, $params)
    {
        $sql = "UPDATE " . static::table() . " SET " . self::getArrAttributes($params) . " WHERE id=?;";
        $values = self::getValuesArray($params);
        $values[] = $id;
        return DB::query($sql, $values);
    }
    public static function delete($id)
    {
        $sql = "DELETE FROM " . static::table() . " WHERE id= ?;";
        return DB::query($sql, [$id]);
    }
}
