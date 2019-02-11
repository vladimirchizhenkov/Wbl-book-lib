<div class="content">
    <div class="container">

        <div class="content__main content__main--width-full">
            <h2 class="content__title">Editing Library</h2>
        </div>

        <div style="border: 1px solid #ccc; margin: 32px 0; padding: 16px;">
            <p id="ajaxx" class="answer">Answer here -></p>
        </div>

        <table class="table" style="width: 100%;">
            <tr class="table__row">
                <th class="table__title">Title Of book</th>
                <th class="table__title">Author</th>
                <th class="table__title">Edit</th>
                <th class="table__title">Delete</th>
            </tr>

            <?php foreach ($getAllData as $book) { ?>
                <tr class="table__row">
                    <td class="table__cell table__cell--book-name"><?php echo $book['title_book'] ?></td>
                    <td class="table__cell"><?php echo $book['name_author'] ?></td>
                    <td class="table__cell"><a href="/edit_book.php?id=<?php echo $book['id_book'] ?>"
                                               class="table__link">+</a></td>
                    <td class="table__cell"><a href="/del_book.php?id=<?php echo $book['id_book'] ?>"
                                               class="table__link">-</a></td>
                </tr>
            <?php } ?>

        </table>

        <div style="border: 1px solid #ccc; padding: 16px; margin-bottom: 16px;">
            <h3>Add new author or <a href="/edit_author.php">edit author's list</a></h3>
            <form class="form form--border-none" action="/edit_lib.php" method="post">
                <input type="text" name="add_new_author" class="form__input"
                       placeholder="Введите имя автора"><span><?php echo $add_author_err ?></span>
                <div><input type="submit" class="form__input" value="Отправить"></div>
            </form>
        </div>

        <form action="/edit_lib.php" method="post" class="form">
            <h3 class="form__title">Add new book</h3>
            <div class="form__done"><?php echo $book_ok ?></div>
            <input type="text" name="book_title" class="form__input" placeholder="Введите название книги"
                   value="<?php echo $book_title ?>"><span class="form__span"><?php echo $err_title ?></span><br>
            <div>
                <select class="form__select" name="book_author[]" multiple>

                    <?php foreach ($getAuthorList as $authors) { ?>
                        <option value="<?php echo $authors['id_author'] ?>"
                                class="form__option"><?php echo $authors['name_author'] ?></option>
                    <?php } ?>

                </select>
            </div>
            <textarea rows="10" type="text" name="book_text" class="form__textarea"
                      placeholder="Введите текст книги"><?php echo $book_text ?></textarea><span
                    class="form__span"><?php echo $err_text ?></span><br>
            <input type="submit" class="form__input" value="Отправить"><br>
        </form>

    </div>
</div>

<!--<td class="table__cell">Вино из одуванчиков</td>-->
<!--<td class="table__cell">Р. Бредберри</td>-->
<!--<td class="table__cell"><a href="#" class="table__link">+</a></td>-->
<!--<td class="table__cell"><a href="#" class="table__link">-</a></td>-->