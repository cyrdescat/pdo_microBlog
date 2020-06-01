<?php


if (isset($_GET['id'])) {
    try{
        $stm = $pdo->prepare("SELECT * FROM story WHERE id = :id");
        $stm -> bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $stm -> execute();
        $article = $stm->fetch();
    }  catch( Exception $e) {
        header('Location: http://' . $_SERVER["HTTP_HOST"] . '/index.php');
    }
} else {
    header('Location: http://' . $_SERVER["HTTP_HOST"] . '/index.php');
}
