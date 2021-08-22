<?php

if (
    !isset($_POST['id']) ||
    !isset($_POST['title']) ||
    !isset($_POST['summary']) ||
    !isset($_POST['body']))
{
    echo '直接参照できないページです。<br>';
    echo '<a href="top.php">ブログトップ</a>';
    exit;
}

require_once './blogdata.php';

$blog_data = new BlogData();
$blog_data->load();
$blog_data->updateArticle(
    $_POST['id'],
    $_POST['title'],
    $_POST['summary'],
    $_POST['body']
);

// 記事一覧に遷移する。
header('Location: ./top.php');

?>
