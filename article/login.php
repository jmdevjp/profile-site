<?php
require_once './common.php';
?>

<!DOCTYPE html>
    <head>
        <title>Login</title>
    </head>

    <body>
        <?php if (IsLogin()) { ?>
            <p>ログイン済みです。</P>
            <a href="./top.php">ブログトップ</a>
        <?php } else { ?>
            <?php if (AnyErrors()) { ?>
                <p><strong><?php echo GetErrorMessage(); ?></strong></p>
            <?php } ?>
            <form method="POST" action="login_done.php">
                <p><label for="<?php echo USER_ID; ?>">ユーザーID</label>
                <input type="text" name="<?php echo USER_ID; ?>"></p>
                <p><label for="password">パスワード</label>
                <input type="password" name="password"></p>
                <p><button type="submit" name="login">ログイン</button></p>
            </form>
        <?php } ?>
    </body>
<html>
