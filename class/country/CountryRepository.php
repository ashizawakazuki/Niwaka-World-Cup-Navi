<?php
namespace country;
//require_once __DIR__ . '/../SingletonPDO.class.php';

//リポジトリファイルは、データベースを操作するためのSQLを書くためのファイル
use class\country\Country;
use class\SingletonPDO;
use Exception;
use PDOException;

class CountryRepository
{
    /**
     * すべての国を取得する
     * @return array|null すべての国を返す。
     */
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
                $country = new Country($row['id'],$row['name'],$row['fifa_rank'],$row['flag_image_path'],$row['population'], $row['region'], $row['famous_players'],$row['famous_players_club'],$row['famous_players_link'],$row['famous_players_description'],$row['map'],$row['highlights'],$row['youtube_link'],$row['appearances'],$row['memo']);
                $countries[] = $country;
            }
            return $countries;
        } catch(PDOException $e){
            error_log($e->getMessage());
            return null;
        }
    }

    /**
     * 国のIDで詳細を取得する
     * @param int $country_id 国のID
     * @return Country|null 国のオブジェクトを返す
     */

    public static function getCountryDetail(int $country_id):?Country {
        try{
            # PDOオブジェクトを持ってきて、$dbに入れている
            $db = SingletonPDO::connect();

            $sql = "SELECT * FROM countries WHERE  id = $country_id";
            $stmt = $db->prepare($sql);
            $stmt->execute();
    //        1件だけ取り出すときはfetch（配列として取り出す）
            $row = $stmt->fetch();
    //        そのまま配列ではなくオブジェクトにするために、いったんcountryクラスに入れる。返ってきたオブジェクトを返す
            $country = new Country($row['id'],$row['name'],$row['fifa_rank'],$row['flag_image_path'],$row['population'], $row['region'], $row['famous_players'],$row['famous_players_club'],$row['famous_players_link'],$row['famous_players_description'],$row['map'],$row['highlights'],$row['youtube_link'],$row['appearances'],$row['memo']);
            return $country;
        } catch(PDOException $e){
            error_log($e->getMessage());
            return null;
        }
    }

    /**
     * @throws Exception
     */
    // データベースエラーが出たらsaveの呼び出し元のExceptionにエラー文をスローする
    // 新しくレコードを追加するわけではなく、すでにあるレコードのメモ欄に追加（更新）するのでupdateのみ
    public function save(string $country_id, string $country_memo): void {
        try {
            $this->update($country_id,$country_memo);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("データベースエラーです。開発者に連絡してください");
        }
    }

    /**
     * 国のIDでメモを取得
     * @param int $country_id 国のID
     * @param string $memo 国の詳細のメモ
     * @return void 何も返さない
     */

    public function update(int $country_id,string $memo): void {

            $db = SingletonPDO::connect();
            $sql = "
            UPDATE
                countries
            SET 
                memo = :memo
            WHERE
                id = :id
            ";
            $params = [
                ':id' => $country_id,
                ':memo' => $memo
            ];
            $stmt = $db->prepare($sql);
            $stmt->execute($params);
    }

    /**
     * 国の名前で国のオブジェクトを取得
     * @param string $name 国のメモ
     * @return Country|null 国のオブジェクトを返す
     */

    public static function getCountryByName(string $name):?Country {
        try{
            # PDOオブジェクトを持ってきて、$dbに入れている
            $db = SingletonPDO::connect();

            $sql = "SELECT * FROM countries WHERE  name = :name";
            $stmt = $db->prepare($sql);
            $stmt->execute([':name' => $name]);
            //        1件だけ取り出すときはfetch（配列として取り出す）
            $row = $stmt->fetch();
            //        そのまま配列ではなくオブジェクトにするために、いったんcountryクラスに入れる。返ってきたオブジェクトを返す
            $country = new Country($row['id'],$row['name'],$row['fifa_rank'],$row['flag_image_path'],$row['population'], $row['region'], $row['famous_players'],$row['famous_players_club'],$row['famous_players_link'],$row['famous_players_description'],$row['map'],$row['highlights'],$row['youtube_link'],$row['appearances'],$row['memo']);
            return $country;
        } catch(PDOException $e){
            error_log($e->getMessage());
            return null;
        }
    }
}