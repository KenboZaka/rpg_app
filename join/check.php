<?php
    session_start();
    require_once('../dbconnect.php');

    if(!isset($_SESSION)){
        header('Location: register.php');
        exit();
    }

    if(!empty($_POST)){
        $statement = $db->prepare('insert into members set name=?, email=?, password=?, created=NOW()');
        $statement->execute(array(
            $_SESSION['join']['name'],
            $_SESSION['join']['email'],
            sha1($_SESSION['join']['password'])
        ));
        unset($_SESSION['join']);
        header('Location: thanks.php');
        exit();
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
        <h3>会員登録確認</h3>
        <div class="row">
            <div class="col">
                <form action="" method="post" class="form-group">
                    <label for="name">お名前</label>
                        <input type="text" name="name" class="form-control bg-primary text-white readonly"  value="<?php print(htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES)); ?>">
                    <label for="email">メールアドレス</label>
                        <input type="text" name="email" class="form-control bg-primary text-white readonly" value="<?php print(htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES)); ?>">
                    <label for="password">パスワード</label>
                        <input type="text" name="password" class="form-control bg-primary text-white readonly" value="表示されません">
                    <input type="submit" class="form-control mt-4" value="送信する">
                </form>
            </div>
        </div>

    </div>
</body>
</html>