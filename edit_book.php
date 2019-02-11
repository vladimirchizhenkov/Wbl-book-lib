<?php

if ($_GET['id'] == null && $_GET['id'] == '') {
    echo 'Книга не выбрана';
}

else {

    include_once $_SERVER['DOCUMENT_ROOT'] . 'config.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/model/m_book.php';

    $getIdForEdit = $_GET['id'];
    $getAllSingleData = getAllSingleData($getIdForEdit);
    $getAuthorsForEdit = getAuthors();

    if (count($_POST) > 0) {
        $book_title   = $_POST['book_title'];
        $book_text    = $_POST['book_text'];
        $book_authors = $_POST['book_author'];

        if (strlen($_POST['book_title']) < 2) {
            $err_title = 'Название книги не короче двух символов';
        }

        if (strlen($_POST['book_text']) < 100) {
            $err_text = 'Текст книги не менее 100 символов';
        } else {
            editBook($getIdForEdit, $book_title, $book_text);
            editAuthor($getIdForEdit, $book_authors);
            header('Location: /edit_lib.php');
        }
    }

    include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_header.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_edit_book.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_footer.php';
}
