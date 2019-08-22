<?php

class Enemy{
    public $enemy_name;

    public function __construct($name){
        $this->enemy_name = $name;
    }

    public function attack($myName){
        echo $this->enemy_name.'は、'.$myName.'を攻撃した';
    }
}

$enemies[] = new Enemy('スライム');
$enemies[] = new Enemy('ゴブリン');
$enemies[] = new Enemy('ドラゴン');