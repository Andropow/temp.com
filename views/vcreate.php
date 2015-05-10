<form method="post" class="forms">
    <label>Description: </label>
    <input type="text" name="description" value="<?= $cur_page['description']; ?>"/><br/>
    <label>Keywords: </label>
    <input type="text" name="keywords" value="<?= $cur_page['keywords']; ?>"/><br/>
    <label>Title: </label>
    <input type="text" name="title" value="<?= $cur_page['title']; ?>"/><br/>
    <label>Menu name: </label>
    <input type="text" name="menu_name" value="<?= $cur_page['menu_name']; ?>"/><br/>
    <label>Menu position </label>
    <select name="menu_position">
        <?php $menu = $vp->menu_pos($page_button_name, $cur_page['menu_position']); ?>
    </select><br/>
    <label>Visiblity: </label>
    <select name="visible">
        <option value="1" <?= $cur_page['visible'] ? 'selected' : null ?>>Visible</option>
        <option value="0" <?= !$cur_page['visible'] ? 'selected' : null ?>>Hiden</option>
    </select><br/>
    <label>Content: </label><br/>
    <textarea name="content" maxlength="1024" ><?= $cur_page['content']; ?></textarea><br/>
    <input class="button" type="submit" name="<?= $page_button_name; ?>" value="<?= $page_button_name == 'create' ? 'Create' : 'Update' ;?>"/>
</form>


