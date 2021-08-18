<?php
require_once './common.php';
?>

<!DOCTYPE html>
    <?php include('./head-common.php'); ?>
    <body>
        <?php include('./pageheader-common.php'); ?>
        <div class="wrapper">
            <?php if (IsLogin()) { ?>
                <p>ログイン済みです。</P>
                <a href="./top.php">ブログトップ</a>
            <?php } else { ?>
                <?php if (AnyErrors()) { ?>
                    <p><strong><?php echo GetErrorMessage(); ?></strong></p>
                <?php } ?>
                <form method="POST" action="login_done.php" class="login-form">
                    <label for="<?php echo USER_ID; ?>">ユーザーID</label>
                    <input type="text" name="<?php echo USER_ID; ?>" class="input">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" class="input">
                    <p><button type="submit" name="login" class="button">ログイン</button></p>
                </form>
            <?php } ?>
        </div>
    </body>
<html>
