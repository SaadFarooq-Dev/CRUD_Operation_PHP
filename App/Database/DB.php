
<?php

class DB
{
    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $dbpass = '';
    private $dbname = 'php_lab';

    protected $connection;
    protected $query;

    private static $instance = null;

    private function __construct()
    {
        $dsn = 'mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname;
        $this->connection = new PDO($dsn, $this->dbuser, $this->dbpass);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function prepare($sql, $params = null)
    {
        $this->query = $this->connection->prepare($sql);
        $this->query->execute($params);
        return $this;
    }


    public function fetch()
    {
        return $this->query->fetch();
    }

    public function fetchAll()
    {
        return $this->query->fetchAll();
    }
    public static function query($sql, $params = null)
    {
        DB::getInstance()->prepare($sql, $params);
        return self::$instance;
    }
}
