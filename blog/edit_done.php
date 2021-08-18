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

$id = $_POST['id'];
$title = $_POST['title'];
$summary = $_POST['summary'];
$body = $_POST['body'];

$db_file = './data/database.csv';
$db_fh = new SplFileObject($db_file, "c+");
$db_fh->setFlags(SplFileObject::READ_CSV);

foreach ($db_fh as $v)
{
    if ($v[0] !== null)
    {
        if ($v[0] === $id)
        {
            $v[1] = $title;
            $v[3] = $summary;
            $v[4] = $body;
        }
        $articles[] = $v;
    }
}

$db_fh->fseek(0);
foreach ($articles as $article)
{
    $db_fh->fputcsv($article);
}

$db_fh = null;

// 記事一覧に遷移する。
header('Location: ./top.php');

?>
