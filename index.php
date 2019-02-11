<?php
include_once $_SERVER['DOCUMENT_ROOT'] . 'config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/m_book.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_header.php';

$authors    = getAuthors();
$books      = getAllDataLimit3();
$booksAll   = getAllBooks();
$getAllData = getAllData();

if (count($_POST) > 0) {
    $authors_id = $_POST['authorChoise'];

    $getBooksFromAuthors = getBooksFromAuthor($authors_id);
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_index.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_footer.php';
