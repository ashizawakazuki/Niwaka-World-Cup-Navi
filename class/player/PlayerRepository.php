<?php

namespace class\player;

use class\SingletonPDO;

class PlayerRepository
{
    public static function getJapanPlayer(){
        $db = SingletonPDO::connect();
        $sql = "SELECT * FROM japan_players";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(); //配列で返す
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
    } 
}