<?php

class SingletonPDO extends PDO
{
    private static $dbh;
    private static $dsn=DATA_SOURCE_NAME;


    public function __construct()
    {
//    ・このparentをつけることで親のクラス（PDO）のコンストラクタを実行できる。
//    →引数で①DCN（どこに接続するか）、②データベース接続するためのユーザーネーム、③データベース接続するためのパスワード
//    ・selfはこのクラス（設計図）自身を指している
        parent::__construct(self::$dsn, DB_USER, DB_PASSWORD);
    }

    public static function connect()
    {
//      もしすでに一度PDOに接続していて、$dbhプロパティが入っていれば、そのままそれ（PDO）を渡す。
//      初めてだったら、$dbhプロパティにPDOを入れる（new SingletonPDO();）
//      DBに接続できなさそうだったらcatchしてエラーを出す
        try {
            if (!isset(self::$dbh)) {
            self::$dbh = new SingletonPDO();
            }
            return self::$dbh;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


}