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
    <?php include('../head-common.php'); ?>
    <body>
        <header class="site-header">
            <h1><a href="../index.html" class="site-header-top-link">jmdevjp's profile site</a></h1>
            <nav class="site-header-nav">
                <li><a href="./top.php">ブログ</a></li>
                <li><a href="#">その他</a></li>
            </nav>
        </header>

        <form method="POST" action="post_done.php">
            <label class="post-label" for="title">タイトル</label><br>
            <input class="post-input" type="text" name="title"><br>
            <label class="post-label" for="summary">概要</label><br>
            <textarea class="post-input post-summary" type="text" name="summary"></textarea><br>
            <label class="post-label" for="body">本文</label><br>
            <textarea class="post-input post-body" type="text" name="body"></textarea><br>
            <label class="post-label" for="send"></label><br>
            <button class="post-button" type="submit" name="send">投稿</button>
        </form>
    </body>
</html>
