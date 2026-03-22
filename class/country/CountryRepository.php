<?php
namespace country;
//require_once __DIR__ . '/../SingletonPDO.class.php';

//リポジトリファイルは、データベースを操作するためのSQLを書くためのファイル
use class\country\Country;
use class\SingletonPDO;
use PDOException;

class CountryRepository
{
    public static function getCountry():?array {
        try{
            # PDOオブジェクトを持ってきて、$dbに入れている
            $db = SingletonPDO::connect();

            $sql = "SELECT * FROM countries";
            $stmt = $db->prepare($sql);
            $stmt->execute();
    //        取り出す件数が複数あるときはfetchall
            $rows = $stmt->fetchAll();
            foreach($rows as $row){
                $country = new Country($row['id'],$row['name'],$row['fifa_rank'],$row['flag_image_path'],$row['population'], $row['region'], $row['famous_players'],$row['highlights'],$row['appearances']);
                $countries[] = $country;
            }
            return $countries;
        } catch(PDOException $e){
            error_log($e->getMessage());
            return null;
        }
    }

    public static function getCountryDetail($country_id):?array {
        try{
            # PDOオブジェクトを持ってきて、$dbに入れている
            $db = SingletonPDO::connect();

            $sql = "SELECT * FROM countries WHERE  id = $country_id";
            $stmt = $db->prepare($sql);
            $stmt->execute();
    //        1件だけ取り出すときはfetch（配列として取り出す）
            $row = $stmt->fetch();
    //        そのまま配列ではなくオブジェクトにするために、いったんcountryクラスに入れる。返ってきたオブジェクトを返す
            $country = new Country($row['id'],$row['name'],$row['fifa_rank'],$row['flag_image_path'],$row['population'], $row['region'], $row['famous_players'],$row['highlights'],$row['appearances']);
            return $country;
        } catch(PDOException $e){
            error_log($e->getMessage());
            return null;
        }
    }
}