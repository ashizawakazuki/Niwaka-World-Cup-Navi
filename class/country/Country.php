<?php
//国の情報をまとめて持つ設計図（クラス）
////→この設計図から、「日本」「ブラジル」「フランス」とかを作れる
//①プロパティを作る
//②コンストラクタ(このクラスからオブジェクトを生成したときにプロパティに値をセットするもの）を書く
//③ゲッターを書く
namespace class\country;

class Country
{
//    初心者はデータベースのカラムを入れていいとのこと
//ここでは、このクラスから作られるオブジェクトのプロパティを決めている
//つまり、オブジェクトのプロパティはすべてprivate（オブジェクトの外から変えられないよ）というルールも決めている
    private int $id;
    private string $name;
    private ?string $fifa_rank;
    private ?string $flag_image_path;
    private ?string $population;
    private ?string $region;
    private ?string $famous_players;
    private ?string $famous_players_club;
    private ?string $famous_players_link;
    private ?string $famous_players_description;
    private ?string $map;
    private ?string $highlights;
    private ?string $youtube_link;
    private ?string $appearances;
    private ?string $memo;


    public function __construct(
        int $id,
        string $name,
        ?string $fifa_rank,
        ?string $flag_image_path,
        ?string $population,
        ?string $region,
        ?string $famous_players,
        ?string $famous_players_club,
        ?string $famous_players_link,
        ?string $famous_players_description,
        ?string $map,
        ?string $highlights,
        ?string $youtube_link,
        ?string $appearances,
        ?string $memo
    )
    {
//オブジェクトを生成している途中に、オブジェクトのプロパティをセットしている
//        1 例えば$country = new Country(1, "Japan");でどこかで呼び出す
//        ２ このコンストラクタが動き始めて、これから生成するオブジェクトのプロパティを以下でセットしている（右辺に引数が入り、左辺でセットしている）
//        ３ 最後、オブジェクトが完成されて、$countryに入る
        $this->id = $id;
        $this->name = $name;
        $this->fifa_rank = $fifa_rank;
        $this->flag_image_path = $flag_image_path;
        $this->population = $population;
        $this->region = $region;
        $this->famous_players = $famous_players;
        $this->famous_players_club = $famous_players_club;
        $this->famous_players_link = $famous_players_link;
        $this->famous_players_description = $famous_players_description;
        $this->map = $map;
        $this->highlights = $highlights;
        $this->youtube_link = $youtube_link;
        $this->appearances = $appearances;
        $this->memo = $memo;
    }

//    ゲッター getではじめる
    public function getId(): int{
        return $this->id;
    }
    public function getName(): string{
        return $this->name;
    }
    public function getFifaRank(): ?string{
        return $this->fifa_rank;
    }
    public function getFlagImagePath(): ?string{
        return $this->flag_image_path;
    }
    public function getPopulation(): ?string{
        return $this->population;
    }
    public function getRegion(): ?string{
        return $this->region;
    }
    public function getFamousPlayers(): ?string{
        return $this->famous_players;
    }
    public function getFamousPlayersClub(): ?string{
        return $this->famous_players_club;
    }
    public function getFamousPlayersLink(): ?string{
        return $this->famous_players_link;
    }
    public function getFamousPlayersDescription(): ?string{
        return $this->famous_players_description;
    }
    public function getMap(): ?string{
        return $this->map;
    }
    public function getHighlights(): ?string{
        return $this->highlights;
    }
    public function getYoutubeLink(): ?string{
        return $this->youtube_link;
    }
    public function getAppearances(): ?string{
        return $this->appearances;
    }
    public function getMemo(): ?string{
        return $this->memo;
    }
}
