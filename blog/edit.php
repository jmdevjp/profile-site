<?php

require_once './common.php';

if (!isset($_POST['id']))
{
    echo '直接参照できないページです。<br>';
    echo '<a href="top.php">ブログトップ</a>';
    exit;
}

if (IsLogin())
{
    $db_file = './data/database.csv';
    $db_fh = new SplFileObject($db_file, "r");
    $db_fh->setFlags(SplFileObject::READ_CSV);

    $id = $_POST['id'];

    for (; !$db_fh->eof(); $db_fh->next())
    {
        $edit_line = $db_fh->current();
        if ($edit_line[0] === $id)
        {
            $title = $edit_line[1];
            $summary = $edit_line[3];
            $body = $edit_line[4];
            break;
        }
    }

    $file = null;
}
else
{
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
    <?php include('./head-common.php'); ?>
    <body>
        <?php include('./pageheader-common.php'); ?>

        <?php if (IsLogin()) { ?>
        <form method="POST" action="edit_confirm.php" class="edit-form wrapper">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="title">タイトル</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>">
            <label for="summary">概要</label>
            <textarea class="post-summary" type="text" name="summary"><?php echo htmlspecialchars($summary, ENT_QUOTES, 'UTF-8'); ?></textarea>
            <label for="body">本文</label>
            <textarea class="post-body" type="text" name="body"><?php echo htmlspecialchars($body, ENT_QUOTES, 'UTF-8'); ?></textarea>
            <label for="send"></label>
            <button class="button" type="submit" name="send">送信</button>
        </form>
        <?php } else { ?>
            そのようなページはありません。
        <?php } ?>
    </body>
</html>
