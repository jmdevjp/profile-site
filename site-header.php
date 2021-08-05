<?php

$url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"];

?>

<header class="site-header">
    <h1><a href="<?php echo $url; ?>/index.html" class="site-header-top-link">jmdevjp's profile site</a></h1>
    <nav class="site-header-nav">
        <li>ブログ</li>
        <?php if (IsLogin()) { ?>
            <li><?php echo GetUserId(); ?></li>
            <li><a href="<?php echo $url; ?>/article/post.php">投稿</a></li>
            <li><a href="<?php echo $url; ?>/article/logout.php">ログアウト</a></li>
        <?php } else { ?>
            <li><a href="<?php echo $url; ?>/article/login.php">ログイン</a></li>
        <?php } ?>
    </nav>
</header>
