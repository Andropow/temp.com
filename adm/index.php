<?php
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
        <title><?= $cur_page['Id']; ?>Admin Module</title>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea",
                language: 'uk_UA',
                plugins: [
                    "advlist autolink link lists charmap preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                    "save table contextmenu directionality template paste textcolor",
                    "paste"
                ],
                content_css: "css/content.css",
                paste_webkit_styles: "color font-size"
            });

        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="middle">

                <div class="container">
                    <main class="content">
                        <?php
                        if (filter_input(INPUT_POST, 'create')) {
                            $cp->create_page(filter_input_array(INPUT_POST));
                        } elseif (filter_input(INPUT_POST, 'update')) {
                            $arr = filter_input_array(INPUT_POST);
                            $arr['Id'] = $vp->get_page($id)['Id'];
                            $cp->update_page($arr);
                        }


                        if (filter_input(INPUT_GET, 'id')) {
                            $page_button_name = 'update';
                            $cur_page = $vp->get_page($id);
                            require_once Config::app_path() . "views/vcreate.php";
                        }

                        switch (filter_input(INPUT_GET, 'page')) {
                            case 'create':
                                $page_button_name = 'create';
                                require_once Config::app_path() . "views/vcreate.php";
                                break;
                            default:
                                break;
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
