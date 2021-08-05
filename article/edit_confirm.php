<?php

require_once '../authenticate.php';
require_once '../vendor/autoload.php';

use League\CommonMark\CommonMarkConverter;

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
    <?php include('../head-common.php'); ?>
    <body>
        <header class="site-header">
            <h1><a href="../index.html" class="site-header-top-link">jmdevjp's profile site</a></h1>
            <nav class="site-header-nav">
                <li>ブログ</li>
                <li><a href="#">その他</a></li>
            </nav>
        </header>

        <main class="site-main">
            <div class="article-box">
                <article class="article">
                    <p>以下の内容で更新します。</p>
                    <header class="article-header">
                        <h2>#<?php echo $id; ?> <?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h2>
                        <form method="POST" action="edit_done.php">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="title" value="<?php echo $title; ?>">
                            <input type="hidden" name="summary" value="<?php echo htmlspecialchars($summary, ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="body" value="<?php echo htmlspecialchars($body, ENT_QUOTES, 'UTF-8'); ?>">
                            <label class="post-label" for="edit"></label><br>
                            <button class="post-button" type="submit" name="edit">更新</button>
                        </form>
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

        <footer class="site-footer">
            <p>&copy; 2021- <a href="https://twitter.com/jmdevjp" target="_blank" rel="noopener noreferrer">@jmdevjp</a></p>
        </footer>
</body>
</html>
