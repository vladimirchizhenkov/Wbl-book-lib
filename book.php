<?php

if ($_GET['id'] <=0 ) {
    echo 'Книга не выбрана';
    echo '<a href="index.php"> Вернуться на главную страницу</a>';
}

else {
    include_once $_SERVER['DOCUMENT_ROOT'] . 'config.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/m_book.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_header_back.php';

    $book_id= $_GET['id'];

    $getIdForEdit = $_GET['id'];
    $getAllSingleData = getAllSingleData($book_id);

    include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_book.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_footer.php';

}