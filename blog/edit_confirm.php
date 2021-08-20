<?php

require_once './vendor/autoload.php';
require_once './common.php';

use League\CommonMark\CommonMarkConverter;

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

$converter = new CommonMarkConverter([
    'html_input' => 'strip',
    'allow_unsafe_links' => false,
]);

?>

<!DOCTYPE html>
<html lang="ja">
    <?php include('./head-common.php'); ?>
    <body>
        <?php include('./pageheader-common.php'); ?>
        <main class="site-main wrapper">
            <p>以下の内容で更新します。</p>
            <form method="POST" action="edit_done.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="title" value="<?php echo $title; ?>">
                <input type="hidden" name="summary" value="<?php echo htmlspecialchars($summary, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="body" value="<?php echo htmlspecialchars($body, ENT_QUOTES, 'UTF-8'); ?>">
                <label class="post-label" for="edit"></label>
                <button class="button" type="submit" name="edit">更新</button>
            </form>
            <div class="article-box">
                <article class="article">
                    <header class="article-header">
                        <h2><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h2>
                    </header>
                    <div class="article-summary">
                        <?php echo $converter->convertToHtml($summary); ?>
                    </div>
                    <div class="article-body">
                        <?php echo $converter->convertToHtml($body); ?>
                    </div>
                </article>
            </div>
        </main>

        <footer class="page-footer">
            <small>&copy;2021- <a href="https://twitter.com/jmdevjp" target="_blank" rel="noopener noreferrer">@jmdevjp</a></small>
        </footer>
</body>
</html>
