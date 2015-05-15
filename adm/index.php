<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
require_once '../config/db_config.php';
require_once Config::app_path() . "views/vpage.php";
require_once Config::app_path() . 'controllers/cpage.php';
$cp = new Cpage();
$vp = new Vpage();
$page_button_name;
$id = filter_input(INPUT_GET, 'id');
$cur_page = null;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/adminka.css">
        <script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/loginscript.js"></script>
        <title>Admin Module</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="logout">
                <a href="http://<?=  filter_input(INPUT_SERVER, 'HTTP_HOST');?>/temp.com/adm/login.php">Logout</a>
                <hr/>
            </div>
            <div class="middle">
                <div class="container">
                    <main class="content">
                        <?php
                        switch (filter_input(INPUT_POST, 'submit')) {
                            case 'Create':
                                $cp->create_page(filter_input_array(INPUT_POST));
                                break;
                            case 'Update':
                                $arr = filter_input_array(INPUT_POST);
                                $arr['Id'] = $vp->get_page($id)['Id'];
                                $cp->update_page($arr);
                                break;
                            default:
                                break;
                        }

                        if (filter_input(INPUT_GET, 'id')) {
                            $page_button_name = 'Update';
                            $cur_page = $vp->get_page($id);
                            require_once Config::app_path() . "views/vcreate.php";
                        } elseif (filter_input(INPUT_GET, 'page')) {
                            $page_button_name = 'Create';
                            require_once Config::app_path() . "views/vcreate.php";
                        } elseif (filter_input(INPUT_GET, 'delete')) {
                            $cp->delete_page(filter_input(INPUT_GET, 'delete'));
                        } 
                        ?>
                    </main><!-- .content -->
                </div><!-- .container-->
                <aside class="left-sidebar"> 
                    <ul>
                        <li><a href="?page=create">Create Page</a></li>
                        <li><a href="?page=list">List Page</a>
                            <?php filter_input(INPUT_GET, 'page') == 'list' ? $vp->list_pages() : null; ?>
                        </li>
                        <li><a href="?article=create">Create Article</a></li>
                        <li><a href="?article=list">List Articles</a>

                        </li>   
                        <li><a href="?news=create">Create News</a></li>
                        <li><a href="?news=list">List News</a>

                        </li>   
                    </ul>  
                </aside><!-- .left-sidebar -->
            </div><!--.middle-->
        </div><!--.wrapper -->
    </body>
</html>
