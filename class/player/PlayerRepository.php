<?php

namespace class\player;

use class\SingletonPDO;
use Exception;
use PDOException;

class PlayerRepository
{
    public static function getJapanPlayer(){
        try {
            $db = SingletonPDO::connect();
            $sql = "SELECT * FROM japan_players";

            $stmt = $db->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(); //配列で返す
//            throw new Exception("");　// エラーを出したいときにthrowで強制的にcatchになげられる
            $japan_players = [];
            foreach($rows as $row){
                $japan_player = new Player(
                    $row['id'],
                    $row['name'],
                    $row['number'],
                    $row['position'],
                    $row['club'],
                    $row['age'],
                    $row['height'],
                    $row['weight'],
                    $row['image_path'],
                    $row['highlight_url']
                );
                $japan_players[] = $japan_player;

            }
            return $japan_players;

        } catch(PDOException $e) {
            // リポジトリにはログのみ保存し、ユーザーに表示するメッセージはこの関数の呼び出し側でかく
            // 理由は使いまわしの観点や、責務を分けるため
            error_log($e->getMessage());
            return null;
        }
    }
}