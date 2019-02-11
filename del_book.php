<?php

include_once 'model/m_book.php';

if ($_GET['id'] == null || $_GET['id'] == '') {
    header('Location: /edit_lib.php');
}

else {
    $getIdForDel = $_GET['id'];

    delBookFromCross($getIdForDel);
    delBookFromParentTable($getIdForDel);

    header('Location: /edit_lib.php');
}