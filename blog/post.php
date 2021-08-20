<?php

require_once './common.php';

if (!IsLogin())
{
    $_SESSION['return'] = $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
    <?php include('./head-common.php'); ?>
    <body>
        <?php include('./pageheader-common.php'); ?>

        <form method="POST" action="post_done.php" class="post-form wrapper">
            <label for="title">タイトル</label>
            <input type="text" name="title">
            <label for="summary">概要</label>
            <textarea class="post-summary" type="text" name="summary"></textarea>
            <label for="body">本文</label>
            <textarea class="post-body" type="text" name="body"></textarea>
            <label for="send"></label>
            <button class="button" type="submit" name="send">投稿</button>
        </form>
    </body>
</html>
