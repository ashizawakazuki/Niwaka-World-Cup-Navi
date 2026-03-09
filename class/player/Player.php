<?php

namespace class\player;

class Player
{
//    ①最初にプロパティを作る
    private int $id;
    private string $name;
    private int $number;
    private string $position;
    private string $club;
    private int $age;
    private int $height;
    private int $weight;
    private string $image_path;
    private string $highlight_url;

//    ②コンストラクタを作る（$thisは今まさにつくっているオブジェクトを指す）
    public function __construct(
        int $id,
        string $name,
        int $number,
        string $position,
        string $club,
        int $age,
        int $height,
        int $weight,
        string $image_path,
        string $highlight_url
    ){
        $this->id= $id;
        $this->name=$name;
        $this->number=$number;
        $this->position=$position;
        $this->club=$club;
        $this->age=$age;
        $this->height=$height;
        $this->weight=$weight;
        $this->image_path=$image_path;
        $this->highlight_url=$highlight_url;
    }

//    ③ゲッターを作成（$thisはそのオブジェクトを指す）
    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string{
        return $this->name;
    }
    public function getNumber():string{
        return $this->number;
    }
    public function getPosition(): string{
        return $this->position;
    }
    public function getClub(): string{
        return $this->club;
    }
    public function getAge(): int{
        return $this->age;
    }
    public function getHeight(): int{
        return $this->height;
    }
    public function getWeight(): int{
        return $this->weight;
    }
    public function getImagePath(): string{
        return $this->image_path;
    }
    public function getHighlightUrl(): string{
        return $this->highlight_url;
    }
}