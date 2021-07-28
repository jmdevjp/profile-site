<?php

$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$summary = htmlspecialchars($_POST['summary'], ENT_QUOTES, 'UTF-8');
$body = htmlspecialchars($_POST['body'], ENT_QUOTES, 'UTF-8');

$date = date("Y年m月d日 H:i:s");
$fname = date("Ymd") . '.html';

?>

<!DOCTYPE html>
<html lang="ja">

<!-- 共通の <head> 取り込み -->
<?php include '../head-common.php'; ?>

<!-- 共通のページヘッダはひとまずベタ書き -->
<header class="site-header">
    <h1><a href="../index.html" class="site-header-top-link">jmdevjp's profile site</a></h1>
    <nav class="site-header-nav">
        <li>ブログ</li>
        <li><a href="#">その他</a></li>
    </nav>
</header>

<main>
    <header class="article-header">
        <h2><?php echo $title; ?></h2>
        <p><?php echo $date; ?></p>
    </header>
    <p class="article-summary">
        <?php echo $summary; ?>
    </p>
    <p class="article-body">
        <?php echo $body; ?>
    </p>
</main>

<footer class="site-footer">
    <p>&copy; 2021- <a href="https://twitter.com/jmdevjp" target="_blank" rel="noopener noreferrer">@jmdevjp</a></p>
</footer>
</body>
</html>
