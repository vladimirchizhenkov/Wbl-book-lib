<div class="content">
    <div class="container">
        <div class="content__inner">
            <div class="content__main">
                <h2 class="content__title">Latest 3 downloaded books</h2>

                <?php foreach ($books as $book) { ?>
                    <div class="book">
                        <h4 class="book__title"><?php echo $book['title_book'] ?></h4>
                        <div class="book__author" style="border-bottom: 2px dotted #ccc; display: inline-block;"><?php echo $book['name_author'] ?></div>
                        <p class="book__preview"><?php echo substr($book['text_book'], 0, 800) . '...' ?></p>
                        <a href="book.php?id=<?php echo $book['id_book'] ?>" class="book__link">Continue reading</a>
                    </div>
                <?php } ?>

                <div style="text-align: center; padding-top: 24px;">any content info</div>

            </div>

            <div class="content__aside">
                <form action="/index.php" method="post" class="form">
                    <p class="form__title">Select author:</p>
                    <div class="form__inner">
                        <select class="form__select" name="authorChoise[]" multiple>
                            <?php foreach ($authors as $author) {?>
                            <option value="<?php echo $author['id_author']?>" class="form__option"><?php echo $author['name_author']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="submit" class="form__button" value="Выбрать">
                </form>

                <div class="result">
                    <div class="result__author">
                        <div class="result__title">Authors selected:</div>

                       <?php foreach ($getBooksFromAuthors as $authorOne) { ?>
                               <div class="result__choise"><?php echo $authorOne['name_author'] ?></div>
                        <?php } ?>

                    </div>
                    <div class="result__book">
                        <div class="result__title">Books on request:</div>

                        <?php foreach($getBooksFromAuthors as $bookOne) { ?>
                        <div class="result__choise">
                            <a href="/book.php?id=<?php echo $bookOne['id_book']?>" class="result__link"><?php echo $bookOne['title_book']?></a>
                        </div>
                        <?php } ?>

                    </div>
                </div>

                <ul class="list">
                    <p class="list__title">Or select book from list:</p>
                    <?php foreach ($getAllData as $bookSingle) { ?>
                    <li class="list__item"><a href="book.php?id=<?php echo $bookSingle['id_book']?>" class="list__link"><?php echo $bookSingle['title_book']?></a>
                    </li>
                    <?php } ?>
                </ul>

            </div>

        </div>
    </div>
</div>