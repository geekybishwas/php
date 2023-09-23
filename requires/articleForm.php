<?php if(!empty($errors)):?>
    <ul>
        <?php foreach ($errors as $error):?>
            <li><?=$error?></li>
        <?php endforeach;?>
    </ul>
<?php endif ;?>
<form method="post">
    <div>
        <label for="number">ID</label>
        <input type="number" id="number" name="ID" value=<?=$id1;?>>
    </div>
    <div>
        <label for="text">Title</label>  
        <!--
        htmlspecialchars funtions is to avoid XSS attack
        -->
        <input type="text" name='TITLE' placeholder="Article Title" value="<?=htmlspecialchars($title1);?>">
    </div>
    <div>
        <label for="text">Content</label>
        <textarea name="CONTENT" id="content" cols="30" rows="10"><?=htmlspecialchars($content1);?></textarea>
    </div>
    <div>
        <label for="date">Date and time of Published Article</label>
        <!-- <input type="datetime-local" name="PUBLISHED" id="date"> -->
        <input type="text" name="PUBLISHED" id='dateTime' value="<?=htmlspecialchars($publish);?>">
    </div>

    <input type="submit" value="Save" name="submit" id="submit">
</form>