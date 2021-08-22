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
    require_once './blogdata.php';
    
    $blog_data = new BlogData();
    $blog_data->load();
    $article = $blog_data->getArticleById($_POST['id']);

    if (is_null($article)) {
        header('Location: top.php');
        exit;
    }
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
            <input type="hidden" name="id" value="<?php echo $article->id; ?>">
            <label for="title">タイトル</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8'); ?>">
            <label for="summary">概要</label>
            <textarea class="post-summary" type="text" name="summary"><?php echo htmlspecialchars($article->summary, ENT_QUOTES, 'UTF-8'); ?></textarea>
            <label for="body">本文</label>
            <textarea class="post-body" type="text" name="body"><?php echo htmlspecialchars($article->body, ENT_QUOTES, 'UTF-8'); ?></textarea>
            <label for="send"></label>
            <button class="button" type="submit" name="send">送信</button>
        </form>
        <?php } else { ?>
            そのようなページはありません。
        <?php } ?>
    </body>
</html>
