<header class="page-header wrapper">
    <h1><a href="./top.php">jmdevjp's blog</a></h1>
    <nav class="main-nav">
        <ul>
            <?php if (IsLogin()) { ?>
                <li><?php echo GetUserId(); ?></li>
                <li><a href="./post.php">投稿</a></li>
                <li><a href="./logout.php">ログアウト</a></li>
            <?php } else { ?>
                <li><a href="./login.php">ログイン</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>