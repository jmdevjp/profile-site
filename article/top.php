<?php

require_once '../vendor/autoload.php';

use League\CommonMark\CommonMarkConverter;

$filepath = '../database.csv';
$file = new SplFileObject($filepath, "r");
$file->setFlags(SplFileObject::READ_CSV);
$COLUMN_SIZE  = 4;

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
                <li><a href="#">その他</a></li>
            </nav>
        </header>

        <main class="site-main">
            <div class="article-box">
                <?php foreach ($file as $line) { ?>
                    <?php if (count($line) == $COLUMN_SIZE) { ?>
                    <article class="article">
                        <header class="article-header">
                            <h2><?php echo $converter->convertToHtml($line[0]); ?></h2>
                            <p><?php echo $line[1]; ?></p>
                        </header>
                        <div class="article-summary">
                            <?php echo $converter->convertToHtml($line[2]); ?>
                        </div>
                        <div class="article-body">
                            <?php echo $converter->convertToHtml($line[3]); ?>
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
