<?php

    require_once('dbconnect.php');
    if(!empty($_POST)){

        if($_POST['email'] !== '' && $_POST['password'] !== ''){
            $login = $db->prepare('select * from members where email=? and password=?');
            $login->execute(array(
                    $_POST['email'],
                    sha1($_POST['password'])
                    ));

            $member = $login->fetch();
            if($member){
                $_SESSION['id'] = $member['id'];
                $_SESSION['time'] = time();
                header('Location: index.php');
                exit();
        }else{
            $error['login'] = 'failed';
        }       
    }else{
    
        $error['login'] = 'blank';
    }
}
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
    <title>RPG</title>
</head>
<body>
<div class="container">
    <h1>RPG</h1>
    <div class="row">
        <div class="col">
            <form action="" method="post" class="form-group">
                <label for="">メールアドレス</label>
                <input type="text" name="email" class="form-control">
                    <?php if($error['login'] === 'failed'): ?>
                        <p class="error">ログインに失敗しました</p>
                    <?php endif; ?>
                    <?php if($error['login'] === 'blank'): ?>
                        <p class="error">入力をしてください</p>
                    <?php endif; ?>
                <label for="">パスワード</label>
                <input type="text" name="password" class="form-control">
                <input id="save" type="checkbox" name="save" value="on">
                <label for="save" class="control-label">次回からは自動的にログインする</label>
                <input type="submit" class='form-control mt-4 btn-success' value="ログインする">
            </form>
        </div>
    </div>
</div>
</body>
</html>