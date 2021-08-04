<?php
require_once './common.php';

$user_id = $_POST[USER_ID];
$password = $_POST['password'];

$file_path = '../data/user';
$lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if (count($lines) !== 2)
{
    SetError('不明なエラー。管理者に連絡してください。');
    header('Location: ./login.php');
    exit;
}

if (password_verify($user_id, $lines[0]) && password_verify($password, $lines[1]))
{
    session_regenerate_id(true);
    SetUserId($user_id);
    ClearError();
}
else
{
    SetError('ユーザー名またはパスワードが違います。');
}

header('Location: ./login.php');
exit;

?>
