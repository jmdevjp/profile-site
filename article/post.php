<?php

require_once '../vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php';

$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$summary = htmlspecialchars($_POST['summary'], ENT_QUOTES, 'UTF-8');

$date = date("Y年m月d日 H:i:s");
$fname = date("Ymd") . '.html';

$page = '';
$page .= '<!DOCTYPE html><html lang="ja">';

// 共通の <head> を変数に追加する。
ob_start();
include '../head-common.php';
$page .= ob_get_clean();

$page .= '<body>';
$page .= '<header class="site-header">';
$page .= '<h1><a href="../index.html" class="site-header-top-link">jmdevjp\'s profile site</a></h1>';
$page .= '<nav class="site-header-nav">';
$page .= '<li>ブログ</li>';
$page .= '<li><a href="#">その他</a></li>';
$page .= '</nav>';
$page .= '</header>';

$page .= '<main>';
$page .= '<header class="article-header">';
$page .= '<h2>' . $title .'</h2>';
$page .= '<p>' . $date . '</p>';
$page .= '</header>';
$page .= '<p class="article-summary">';
$page .= $summary;
$page .= '</p>';
$page .= '<div class="article-body">';

// Purifierをかける (投稿内の必要なHTMLタグは残したいため)
$config = HTMLPurifier_Config::createDefault();
$config->set('HTML.TargetBlank', true);
$config->set('Attr.EnableID', true);
$purifier = new HTMLPurifier($config);
$page .= nl2br($purifier->purify($_POST['body']));

$page .= htmlspecialchars(nl2br($_POST['body']), ENT_QUOTES, 'UTF-8');
$page .= '</div>';
$page .= '</main>';

$page .= '<footer class="site-footer">';
$page .= '<p>&copy; 2021- <a href="https://twitter.com/jmdevjp" target="_blank" rel="noopener noreferrer">@jmdevjp</a></p>';
$page .= '</footer>';
$page .= '</body>';
$page .= '</html>';

$fh = fopen('./' . $fname, 'w');
fwrite($fh, $page);
fclose($fh);

// 記事一覧に遷移する。
header('Location: ./' . $fname);

?>
