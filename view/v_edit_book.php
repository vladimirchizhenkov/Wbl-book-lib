<div class="content">
    <div class="container">

        <div class="content__main content__main--width-full">
            <h2 class="content__title">Editing book</h2>
        </div>

        <form action="/edit_book.php?id=<?php echo $getIdForEdit?>" method="post" class="form form--border-none">
            <h3 class="form__title">Editing Book: <?php echo $getAllSingleData['title_book'] ?></h3>
            <div class="form__done"></div>
            <input type="text" name="book_title" class="form__input" placeholder=""
                   value="<?php echo $getAllSingleData['title_book'] ?>"><span
                    class="form__span"><?php echo $err_title ?></span><br>
            <div>
                <select class="form__select" name="book_author[]" id="" multiple style="margin-bottom: 8px; padding:0 16px;">

                    <?php foreach ($getAuthorsForEdit as $author) { ?>
                        <option value="<?php echo $author['id_author'] ?>"><?php echo $author['name_author'] ?></option>
                    <?php } ?>

                </select>
            </div>
            <textarea rows="10" type="text" name="book_text" class="form__textarea"
                      placeholder=""><?php echo $getAllSingleData['text_book'] ?></textarea><span
                    class="form__span"><?php echo $err_text ?></span><br>
            <input type="submit" class="form__input" value="Сохранить изменения"><br>
        </form>

    </div>
</div>


