<form method="post" class="forms">
    <label>Title: </label>
    <input type="text" name="title" value="<?=$cur_page['Title'];?>"/><br/>
    <label>Article: </label><br/>
    <textarea name="article" maxlength="1024" ><?=$cur_page['Article'];?></textarea><br/>
    <input class="button" type="submit" name="submit" value="<?= $page_button_name; ?>"/>
</form>



