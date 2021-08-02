<?php

if (!isset($_SERVER['PHP_AUTH_USER']))
{
    header("WWW-Authenticate: Basic realm=\"My Realm\"");
    header("HTTP/1.0 401 Unauthorized");
    echo "認証失敗(キャンセル)\n";
    exit;
}

$file_path = '../data/user';
$lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if (count($lines) !== 2)
{
    header("HTTP/1.0 401 Unauthorized");
    echo "認証失敗\n";
    exit();
}

if (!password_verify($_SERVER['PHP_AUTH_USER'], $lines[0]) || !password_verify($_SERVER['PHP_AUTH_PW'], $lines[1]))
{
    header("HTTP/1.0 401 Unauthorized");
    echo "認証失敗(ユーザ名またはパスワードが違う)\n";
    exit();
}

?>
