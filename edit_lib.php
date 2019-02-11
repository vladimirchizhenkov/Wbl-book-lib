<?php

include_once $_SERVER['DOCUMENT_ROOT'] . 'config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/m_book.php';

if (strlen($_POST['add_new_author']) > 0 ) {
    $add_author = $_POST['add_new_author'];

    if (strlen($_POST['add_new_author']) < 5 ) {
        $add_author_err = 'Имя автора не короче 5 символов';
    }

    else {
        saveAuthor($add_author);
        $add_author_err = 'Автор успешно добавлен';
    }
}

if ((strlen($_POST['book_title']) > 0) || (strlen($_POST['book_text']) > 0) || (strlen($_POST['book_author']) > 0)) {
    $book_title   =   $_POST['book_title'];
    $book_text    =   $_POST['book_text'];
    $book_authors =   $_POST['book_author'];

    if (strlen($book_title) < 2) {
        $err_title = 'Название книги должно быть более двух символов';
    }

    if (strlen($book_text) < 10) {
        $err_text = 'Текст книги не короче 10 символов';
    }

    else {
        saveBook($book_title, $book_text);
        $bk = getLastIdBook();
        $getIdBook = $bk['id_book'];

        foreach ($book_authors as $value) {
            addBook($value, $getIdBook);
        }

        header('Location: /edit_lib.php');
    }
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_header_back.php';

$getAllData    = getAllData();
$getAuthorList = getAuthors();

include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_edit_lib.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_footer.php';



