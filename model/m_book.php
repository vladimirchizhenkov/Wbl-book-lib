<?php

include_once 'm_db.php';

// Get Data //

function getLastBooks()
{
    $query = db_query("SELECT * FROM book LIMIT 3");
    $books = $query->fetchAll();
    return $books;
}

function getAllDataLimit3()
{
    $query = db_query("SELECT author.name_author, book.title_book, book.text_book, book.id_book 
                            FROM cross_book_author JOIN author on author.id_author = cross_book_author.id_author 
                            JOIN book on book.id_book = cross_book_author.id_book 
                            ORDER BY id_book DESC LIMIT 3");
    $getAllData = $query->fetchAll();
    return $getAllData;
}

function getAllBooks()
{
    $query = db_query("SELECT * FROM book");
    $booksAll = $query->fetchAll();
    return $booksAll;
}

function getLastIdBook()
{
    $query = db_query("SELECT id_book FROM book ORDER BY id_book DESC");
    $getIdBook = $query->fetch();
    return $getIdBook;
}

function getBooksFromAuthor($id_authors)
{
    $query = db_query(
        "SELECT 
                book.title_book,
                book.id_book,
                author.name_author
              FROM cross_book_author
              JOIN author on author.id_author = cross_book_author.id_author 
              JOIN book on book.id_book = cross_book_author.id_book 
              WHERE author.id_author 
              IN (" . implode(',', $id_authors) . ")");
    $getBooksFromAuthors = $query->fetchAll();
    return $getBooksFromAuthors;
}

function getSingleBook($id)
{
    $params = ['id_book' => $id];
    $query = db_query("SELECT * FROM book WHERE id_book = :id_book", $params);
    $getSingleBook = $query->fetch();
    return $getSingleBook;
}

function getAuthors()
{
    $query = db_query("SELECT * FROM author");
    $authors = $query->FetchAll();
    return $authors;
}

function getSingleAuthor($id_author)
{
    $params = ['id_author' => $id_author];
    $query = db_query("SELECT * FROM author 
                            WHERE id_author = :id_author", $params);
    $author = $query->Fetch();
    return $author;
}

function getAllSingleData($id_book)
{
    $params = ['id_book' => $id_book];
    $query = db_query("SELECT author.name_author, book.title_book, book.text_book 
                           FROM cross_book_author 
                           JOIN author on author.id_author = cross_book_author.id_author 
                           JOIN book on book.id_book = cross_book_author.id_book 
                           WHERE book.id_book = :id_book", $params);
    $getAllSingleData = $query->fetch();
    return $getAllSingleData;
}

function getAllData()
{
    $query = db_query("SELECT author.name_author, book.title_book, book.text_book, book.id_book 
                           FROM cross_book_author 
                           JOIN author on author.id_author = cross_book_author.id_author 
                           JOIN book on book.id_book = cross_book_author.id_book");
    $getAllData = $query->fetchAll();
    return $getAllData;
}

// Save Data //

function saveBook($title, $text)
{
    $params = ['book_title' => $title, 'book_text' => $text];
    $query = db_query("INSERT 
                           INTO book (id_book, title_book, text_book) 
                           VALUES (null, :book_title, :book_text)", $params);
    $db = db_connect();
    return $db->lastInsertId();
}

function saveAuthor($author)
{
    $params = ['name_author' => $author];
    $query = db_query("INSERT INTO author (id_author, name_author) 
                            VALUES (null, :name_author)", $params);
}

function saveCrossTable($id_author, $id_book)
{
    $params = ['id_author' => $id_author, 'id_book' => $id_book];
    $query = db_query("INSERT INTO cross_book_author(id_author, id_book) 
                            VALUES (null, :id_author, :id_book)", $params);
}

// Delete Data //

function delBookFromCross($id_book)
{
    $params = ['del_book' => $id_book];
    $query = db_query("DELETE FROM cross_book_author 
                            WHERE id_book = :del_book", $params);
}

function delBookFromParentTable($id_book)
{
    $params = ['del_book' => $id_book];
    $query = db_query("DELETE FROM book 
                            WHERE book.id_book = :del_book", $params);
}

function delAuthor($id_author)
{
    $params = ['del_author' => $id_author];
    $query = db_query("DELETE FROM author 
                            WHERE author.id_author = :del_author", $params);
}

// Add Data //

function addBook($id_author, $id_book)
{
    $params = ['id_author' => $id_author, 'id_book' => $id_book];
    $query = db_query("INSERT INTO cross_book_author (id_author, id_book) 
                            VALUES (:id_author, :id_book)", $params);
}

// Edit Data //

function editBook($id_book, $title_book, $text_book)
{
    $params = ['id_book' => $id_book, 'title_book' => $title_book, 'text_book' => $text_book];
    $query = db_query("UPDATE book 
                           SET title_book = :title_book, text_book = :text_book 
                           WHERE id_book = :id_book", $params);
}

function editAuthor($id_book, $arr_authors)
{
    $single_author = implode(',', $arr_authors);
    $query = db_query("UPDATE cross_book_author 
                           SET id_author = $single_author 
                           WHERE id_book = $id_book");
}

function editAuthorName($id_author, $new_name)
{
    $params = ['id_author' => $id_author, 'new_name' => $new_name];
    $query = db_query("UPDATE author SET name_author = :new_name 
                           WHERE id_author = :id_author", $params);
}
