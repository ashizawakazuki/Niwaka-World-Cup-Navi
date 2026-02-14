<?php
require_once __DIR__ . '/../SingletonPDO.class.php';

//リポジトリファイルは、データベースを操作するためのSQLを書くためのファイル
class CountryRepository
{
    public static function getCountry(){
        # PDOオブジェクトを持ってきて、$dbに入れている
        $db = SingletonPDO::connect();

        $sql = "SELECT * FROM countries";
        $stmt = $db->prepare($sql);
        $stmt->execute();
//        取り出す件数が複数あるときはfetchall
        return $stmt->fetchAll();
    }

    public static function getCountryDetail($country_id){
        # PDOオブジェクトを持ってきて、$dbに入れている
        $db = SingletonPDO::connect();

        $sql = "SELECT * FROM countries WHERE  id = $country_id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
//        1件だけ取り出すときはfetch
        return $stmt->fetch();
    }


}