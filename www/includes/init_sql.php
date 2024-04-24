<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=nsi_project;charset=utf8',"root", "root");
        // $bdd = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'legallic_co', 'lcosql');
    } catch (Exception $e) {
        die('Erreur connexion: '.$e->getMessage());
    }

    function db_request($request, $bdd){
        $requetePDO = $bdd -> prepare($request);
        $requetePDO -> execute();
        return $requetePDO;
    }
?>