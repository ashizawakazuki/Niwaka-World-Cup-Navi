<?php
namespace class;
class SingletonPDO
{
    private static $dbh;
    private static $dsn=DATA_SOURCE_NAME;

    public static function connect()
    {
//      もしすでに一度PDOに接続していて、$dbhプロパティが入っていれば、そのままそれ（PDO）を渡す。
//      初めてだったら、$dbhプロパティにPDOを入れる（new SingletonPDO();）
//      DBに接続できなさそうだったらcatchしてエラーを出す
        try {
            if (!isset(self::$dbh)) {
            self::$dbh = new \PDO(self::$dsn, DB_USER, DB_PASSWORD);
            }
            return self::$dbh;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


}