<?php

if (
    !isset($_POST['title']) ||
    !isset($_POST['summary']) ||
    !isset($_POST['body']))
{
    echo '直接参照できないページです。<br>';
    echo '<a href="top.php">ブログトップ</a>';
    exit;
}

$articles = [
    0 => [
        0,
        $_POST['title'],
        date("Y/m/d H:i:s"),
        $_POST['summary'],
        $_POST['body'],
    ],
];

$db_file = '../data/database.csv';
$db_fh = new SplFileObject($db_file, "c+");
$db_fh->setFlags(SplFileObject::READ_CSV);

foreach ($db_fh as $v)
{
    if ($v[0] !== null)
    {
        $articles[] = $v;
    }
}

$articles[0][0] = count($articles);

$db_fh->fseek(0);
foreach ($articles as $v)
{
    $db_fh->fputcsv($v);
}
$db_fh = null;

// 記事一覧に遷移する。
header('Location: ./top.php');

?>
