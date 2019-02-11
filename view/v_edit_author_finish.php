<div class="content">
    <div class="container">

        <div class="content__main content__main--width-full">
            <h2 class="content__title">Correct author name</h2>
        </div>

        <form class="form" action="/edit_author.php" method="post">
            <h4>Enter new authors name:</h4>
            <div>
                <input type="hidden" name="id_author" value="<?php echo $getAuthorData['id_author'] ?>">
                <input type="text" class="form__input" value="<?php echo $getAuthorData['name_author']?>" name="new_author_name" style="margin-top: 8px;">
            </div><span><?php echo $err_name?></span>
            <input type="submit" class="form__input" value="Сохранить изменения">
        </form>

    </div>
</div>


