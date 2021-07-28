<?php
$url = 'http://' . $_SERVER['SERVER_NAME'];

if ($_SERVER['SERVER_PORT'] != '80')
{
    $url .= ':' . $_SERVER['SERVER_PORT'];
}
?>

<head>
    <title>jmdevjp's profile site</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="<?php echo $url ?>/css/style.css" rel="stylesheet" >
</head>