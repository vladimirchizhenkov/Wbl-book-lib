<div class="content">
    <div class="container">

        <div class="content__main content__main--width-full">
            <h2 class="content__title">Editing author's list</h2>
        </div>

        <form class="form" action="/edit_author.php" method="post">
            <h4>Выберите автора из списка:</h4>
            <div>
                <select class="form__select" name="name_author[]">

                    <?php foreach ($getAuthorsList as $author) { ?>
                        <option class="form__option"
                                value="<?php echo $author['id_author'] ?>"><?php echo $author['name_author'] ?></option>
                    <?php } ?>

                </select>
            </div>
            <div style="display: flex;">
                <input style="margin-right: 16px; background-color: #ccc;" type="submit" class="form__input" name="edit_author" value="Выбрать">
                <input type="submit" class="form__input" name="delete_author" value="Удалить" style="background-color: #f90;">
            </div>
        </form>

    </div>
</div>


