<?php
require_once '/views/vpage.php';
$vp = new Vpage();
$id = filter_input(INPUT_GET, 'id');
$page = $vp->get_page($id);
?>
<!DOCTYPE html>
<html lang="uk">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="<?= $page['description']; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?= $page['keywords']; ?>">
        <link rel="shortcut icon" type="image/png" href="img/icon.png" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title><?= $page['title']; ?></title>
        <?= Service::get_slider_skripts($page['Id']); ?>
    </head>
    <body>
        <div class="wrapper">
            <header class='header'>
                <div id='logo'>
                    <img src='img/Logo_1.png' alt='logo'/>
                </div>
                <nav id='menu' class='cl-effect-21'>
                    <?php $vp->get_menu(); ?>   
                </nav>
            </header>
            <div class="middle">
                <div class="container">
                    <?php $vp->get_content($id); ?>
                </div>
            </div>
            <footer class='footer'> </footer>
        </div>
    </body>
</html>
