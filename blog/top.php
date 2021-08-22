<?php

require_once './vendor/autoload.php';
require_once './common.php';
require_once './blogdata.php';

use League\CommonMark\CommonMarkConverter;

$converter = new CommonMarkConverter([
    'html_input' => 'strip',
    'allow_unsafe_links' => false,
]);

$blog_data = new BlogData();
$blog_data->load();

?>

<!DOCTYPE html>
<html lang="ja">
    <?php include('./head-common.php'); ?>
    <body>
        <?php include('./pageheader-common.php'); ?>
        <main class="site-main wrapper">
            <div class="article-box">
                <?php foreach ($blog_data->articles as $article) { ?>
                    <article class="article">
                        <header class="article-header">
                            <h2><?php echo $converter->convertToHtml($article->title); ?></h2>
                            <p><?php echo $article->created_date; ?></p>
                            <?php if (IsLogin()) { ?>
                            <form method="POST" action="edit.php">
                                <input type="hidden" name="id" value="<?php echo $article->id; ?>">
                                <button class="button" type="submit" name="edit">編集</button>
                            </form>
                            <?php } ?>
                        </header>
                        <div class="article-summary">
                            <?php echo $converter->convertToHtml($article->summary); ?>
                        </div>
                        <div class="article-body">
                            <?php echo $converter->convertToHtml($article->body); ?>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </main>

        <footer class="page-footer">
            <small>&copy;2021- <a href="https://twitter.com/jmdevjp" target="_blank" rel="noopener noreferrer">@jmdevjp</a></small>
        </footer>
</body>
</html>
