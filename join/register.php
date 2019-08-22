<?php
    session_start();

    require_once('../dbconnect.php');

    if(!empty($_POST)){
        if($_POST['name']===''){
            $error['name'] = 'blank';
        }
        if($_POST['email']===''){
            $error['email'] = 'blank';
        }
        if($_POST['password']===''){
            $error['password'] = 'blank';
        }
        if(strlen($_POST['password'])<6){
            $error['password'] = 'length';
        }

        if(empty($error)){
            $member = $db->prepare('select count(*) as cnt from members where email=?');
            $member->execute(array($_POST['email']));
            $record = $member->fetch();
            if($record['cnt']>0){
                $error['email'] = 'duplicate';
            }
        }
        if(empty($error)){
            $_SESSION['join'] = $_POST;
            header('Location: check.php');
            exit();
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
    <title>battle</title>
</head>
<body>
    <div class="container mt-3">
        <h3>新規登録画面</h3>
        <div class="row">
            <div class="col">
                <form action="" method="post" class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" name="name" class="form-control">
                        <?php if($error['name'] === 'blank'): ?>
                            <p class="text-danger">お名前を入力してください</p>
                        <?php endif; ?>
                    <label for="email">メールアドレス</label>
                    <input type="text" name="email" class="form-control">
                        <?php if($error['email'] === 'blank'): ?>
                            <p class="text-danger">メールアドレスを入力してください</p>
                        <?php endif; ?>
                        <?php if($error['email'] === 'duplicate'): ?>
                            <p class="text-danger">指定されたメールアドレスは登録されています</p>
                        <?php endif; ?>
                    <label for="password">パスワード</label>
                    <input type="text" name="password" class="form-control">
                        <?php if($error['password'] === 'blank'): ?>
                            <p class="text-danger">パスワードを入力してください</p>
                        <?php endif; ?>
                        <?php if($error['password'] === 'length'): ?>
                            <p class="text-danger">パスワードは６文字以上で設定してください</p>
                        <?php endif; ?>
                    <input type="submit" class="form-control btn-primary mt-4" value="内容を確認する">
                </form>
            </div>
        </div>
    </div>

</body>
</html>