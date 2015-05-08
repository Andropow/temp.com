<?php
require_once '../config/db_config.php';
require_once Config::app_path()."views/vpage.php";
require_once Config::app_path().'controllers/cpage.php';
$cp = new Cpage();
$vp = new Vpage();
$button_name;
$id = filter_input(INPUT_GET, 'id');
$cur_page =  null;
?>
<ul>
    <li><a href="?page=create">Create Page</a></li>
    <li><a href="?page=list">List Page</a></li>
</ul>

<?php
if(filter_input(INPUT_POST, 'create')){
    $cp->create_page($_POST); 
}elseif (filter_input(INPUT_POST, 'update')) {
    $cp->update_page($id, $_POST);
}


if(filter_input(INPUT_GET,'id')){
    $button_name = 'update';  
    $cur_page = $vp->get_page($id);
    require_once Config::app_path()."views/vcreate.php";
}

switch (filter_input(INPUT_GET,'page')) {
    case 'create': 
        $button_name = 'create';
        require_once Config::app_path()."views/vcreate.php";
        break;
    case 'list':
        $vp->list_pages();
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

