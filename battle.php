<?php
require_once('player.php');
require_once('enemy.php');



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>battle</title>
</head>
<body>
    <div>戦闘画面</div>
    <div id="app">
        <div class="container">
            <div class="row">
                <?php foreach($players as $player): ?>
                <div class="col-3 border p-2">
                    <ul class="">
                        <li><?php echo $player->myName;?></li>
                        <li>HP: <?php echo $player->hp;?></li>
                        <li>MP: <?php echo $player->mp;?></li>
                    </ul>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="pb-3 main-screen d-flex align-items-end justify-content-center">
        <i class="fas fa-allergies fa-lg monster"></i>
        </div>

        <div class="row">
            <div class="col-3 card p-0 ml-5">
                <button v-on:click="attack" class="command-btn p-1">たたかう</button>
                <button class="command-btn p-1">じゅもん</button>
                <button class="command-btn p-1">どうぐ</button>
                <button class="command-btn p-1">ぼうぎょ</button>
            </div>
            <div class="col-8 border p-2">
            <?php foreach($enemies as $enemy):?>
                <p><?php echo $enemy->enemy_name; ?></p>
            <?php endforeach; ?>
            </div>
        </div>
        <a href="index.php">逃げる</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
    new Vue({
        el: '#app',
        data: {

        }
        methods: {
            attack: function(){
                
            }
        }
    })
    </script>
</body>
</html>