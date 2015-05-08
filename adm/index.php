<?php
require_once '../config/db_config.php';
?>
<ul>
    <li><a href="?page=create">Create Page</a></li>
    <li><a href="?page=list">List Page</a></li>
</ul>

<?php
if(filter_input(INPUT_POST, 'create')){
    require_once Config::app_path().'controllers/cpage.php';
    $cp = new Cpage();
    $cp->create_page($_POST); 
}

switch (filter_input(INPUT_GET,'page')) {
    case 'create':
        require_once Config::app_path()."views/vcreate.php";
        break;
    case 'list':
        break;
    default:
        break;
}
?>
<!--<aside class="left-sidebar">
    <ul>
        <li>Articles 
            <ul>
                <li>Add</li>
                <li>Update</li>
                <li>Remove</li>
            </ul>
        </li>
        <li>News
            <ul>
                <li>Add</li>
                <li>Update</li>
                <li>Remove</li>
            </ul>
        </li>
    </ul>
</aside>--><!-- .left-sidebar -->

