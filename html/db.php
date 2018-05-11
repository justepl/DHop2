<?php
    try {
        $bd = new PDO('mysql:host=localhost;dbname=dhop;charset=utf8', 'root', '');
    }catch(PDOException $e){
        echo 'La base de donnée n\'est pas disponible pour le moment. <br />';
        echo ''.$e->getMessage().'<br />';
        echo 'Ligne : '.$e->getLine();
    }
?>