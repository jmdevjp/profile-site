<?php
require_once './common.php';

$user_id = $_POST[USER_ID];

if ($user_id === 'user')
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
