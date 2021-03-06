<?php
require_once 'views/vpage.php';
require_once 'views/varticles.php';
require_once 'views/vnews.php';
$vpage = new Vpage();
$varticle = new Varticlles();
$vnews = new Vnews();
$id = filter_input(INPUT_GET, 'id');
$page = $vpage->get_page($id);
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
                <form class="form-wrapper cf" method="get">
                    <input type="text" name="search" placeholder="Пошук" required>
                    <button type="submit">Search</button>
                </form>
                <div id='logo'>
                    <img src='img/Logo_1.png' alt='logo'/>
                </div>
                <nav id='menu' class='cl-effect-21'>
                    <?php $vpage->vget_menu(); ?>   
                </nav>
            </header>
            <div class="middle">
                <div class="container">
                    <?php
                    if (filter_input(INPUT_GET, 'search')) {
                        $vpage->search(filter_input(INPUT_GET, 'search'));
                    } else {
                        Service::get_feedback_form($page['Id']);
                        $vpage->get_content($id);
                        $page['Id'] == 1 ? $varticle->get_articles() : null;
                        $page['Id'] == 4 ? $vnews->get_all_news() : null;                       
                    }
                    if (filter_input(INPUT_POST, 'send')) {
                        require_once 'mail/SendMailSmtpClass.php';
                        $post = filter_input_array(INPUT_POST);
                        configure_mail_send($posr['client_name'], $post['email'],$post['message']);
                    }
                    ?>
                </div>
            </div>
            <footer class='footer'>
                <h4>Copyright © 2015 ФГ "ТЕМП"</h4>
            </footer>
        </div>
    </body>
</html>
