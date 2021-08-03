<?php

require_once '../vendor/autoload.php';
require_once './common.php';

use League\CommonMark\CommonMarkConverter;

$filepath = '../data/database.csv';
$file = new SplFileObject($filepath, "r");
$file->setFlags(SplFileObject::READ_CSV);
$COLUMN_SIZE  = 5;

$converter = new CommonMarkConverter([
    'html_input' => 'strip',
    'allow_unsafe_links' => false,
]);

?>

<!DOCTYPE html>
<html lang="ja">
    <?php
        $url = '..';
        include('../head-common.php');
    ?>

    <body>
        <header class="site-header">
            <h1><a href="../index.html" class="site-header-top-link">jmdevjp's profile site</a></h1>
            <nav class="site-header-nav">
                <li>ブログ</li>
                <?php if (IsLogin()) { ?>
                    <li><?php echo GetUserId(); ?></li>
                    <li><a href="logout.php">ログアウト</a></li>
                <?php } else { ?>
                    <li><a href="login.php">ログイン</a></li>
                <?php } ?>
            </nav>
        </header>

        <main class="site-main">
            <div class="article-box">
                <?php foreach ($file as $line) { ?>
                    <?php if (count($line) == $COLUMN_SIZE) { ?>
                    <article class="article">
                        <header class="article-header">
                            <h2>#<?php echo $line[0]; ?> <?php echo $converter->convertToHtml($line[1]); ?></h2>
                            <p><?php echo $line[2]; ?></p>
                            <form method="POST" action="edit.php">
                                <input type="hidden" name="id" value="<?php echo $line[0]; ?>">
                                <label class="post-label" for="edit"></label><br>
                                <button class="post-button" type="submit" name="edit">編集</button>
                            </form>
                        </header>
                        <div class="article-summary">
                            <?php echo $converter->convertToHtml($line[3]); ?>
                        </div>
                        <div class="article-body">
                            <?php echo $converter->convertToHtml($line[4]); ?>
                        </div>
                    </article>
                    <?php } ?>
                <?php } ?>
            </div>
        </main>

        <footer class="site-footer">
            <p>&copy; 2021- <a href="https://twitter.com/jmdevjp" target="_blank" rel="noopener noreferrer">@jmdevjp</a></p>
        </footer>
</body>
</html>
