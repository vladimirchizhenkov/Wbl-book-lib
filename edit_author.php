<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/model/m_book.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_header.php';

$getAuthorsList = getAuthors();

if (strlen($_POST['delete_author']) > 0) {
    $getArrsAuthorsId = $_POST['name_author'];
    $getAuthorId = implode(',', $getArrsAuthorsId);

    delAuthor($getAuthorId);
}

if ((strlen($_POST['new_author_name']) >= 5)) {
    $newAuthorName = $_POST['new_author_name'];
    $getAuthorId   = $_POST['id_author'];

    editAuthorName($getAuthorId, $newAuthorName);
    header('Location: /edit_lib.php');
}

else {
    if ((count($_POST) > 0) && !(strlen($_POST['new_author_name']) > 0) && (strlen($_POST['edit_author']) > 0)) {
        $getAuthorArr = $_POST['name_author'];
        $getAuthorId = implode(',', $getAuthorArr);
        $getAuthorData = getSingleAuthor($getAuthorId);

        include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_edit_author_finish.php';
    } else {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_edit_author.php';
    }
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/view/v_footer.php';


