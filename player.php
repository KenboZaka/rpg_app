<?php
    class Player{
        public $myName;
        public $hp;
        public $mp;
        public function __construct($name, $hit_point, $magic_point){
            $this->myName = $name;
            $this->hp = $hit_point;
            $this->mp = $magic_point;
        } 

        public function attack($enemy_name){
            echo $this->myName.'は'.$enemy_name."に攻撃した！\n";
        }
    }
    $players[] = new Player('けんじろう', 15, 10);
    $players[] = new Player('ボロンゴ', 18, 0);
    $players[] = new Player('ミレーユ', 10, 20);
    // $player1->attack('スライム');
