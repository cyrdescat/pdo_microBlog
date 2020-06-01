<?php

if( isset( $_POST['update'] ) ) {

    try{
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $date_rec = time(); //date('d.m.Y h')
        $id = $_POST["update"];
        $queryInsert = "UPDATE story SET title = :title, content = :content, author = :author, date_rec = :date_rec WHERE id = :id";

        $stm = $pdo->prepare( $queryInsert );

        $stm->bindValue(':title', $title, PDO::PARAM_STR );
        $stm->bindValue(':content', $content, PDO::PARAM_STR );
        $stm->bindValue(':author', $author, PDO::PARAM_STR );
        $stm->bindValue(':date_rec', $date_rec, PDO::PARAM_INT );
        $stm->bindValue(':id', $id, PDO::PARAM_INT );

        $stm->execute( );
        header('Location: http://' . $_SERVER["HTTP_HOST"] . '/index.php');
    } catch ( Exception $e ) {
        $error .= "Cannot insert data ! <br> " .  PHP_EOL;
        $debug .= $e->getMessage( ) . "<br> " .  PHP_EOL;
    }
}