<?php 
    session_start();

    //Pour afficher les messages d'erreur PHP
    error_reporting(E_ALL);
    ini_set("display_errors",1);

    include_once("../includes/init_sql.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/header.css" />
    <?php if(basename($_SERVER['SCRIPT_FILENAME']) == "mylist.php"): ?>
        <link rel="stylesheet" href="../styles/mylist.css" />
        <script type="module" src="../scripts/tasksSorter.js"></script>
        <script type="module" src="../scripts/tasksMenu.js"></script>
        <script type="module" src="../scripts/editMenu.js"></script>
        <script type="module" src="../scripts/addMenu.js"></script>
        <script type="module" src="../scripts/deleteMenu.js"></script>
        <script type="module" src="../scripts/tasksStatus.js"></script>
    <?php elseif(in_array(basename($_SERVER['SCRIPT_FILENAME']), ["register.php", "login.php"])): ?>
        <link rel="stylesheet" href="../styles/auth.css">
        <?php elseif(basename($_SERVER['SCRIPT_FILENAME']) == "home.php"): ?>
            <link rel="stylesheet" href="../styles/home.css">
            <script type="module" src="../scripts/home.js"></script>
    <?php elseif(basename($_SERVER['SCRIPT_FILENAME']) == "preferences.php"): ?>
        <link rel="stylesheet" href="../styles/preferences.css">
        <script type="module" src="../scripts/preferencesCategories.js"></script>
        <script type="module" src="../scripts/preferences.js"></script>
    <?php endif; ?>
    <script type="module">
        import initLocalStorage from "../scripts/initLocalStorage.js";
        initLocalStorage();
    </script>
    <!-- <script src="../scripts/utils/getTheme.js"></script> -->
    <script type="module">
        import updateIcons from "../scripts/updateIcons.js";
        updateIcons();
    </script>
    <?php if(isset($_SESSION["user"])): ?>
        <script type="text/javascript" src="../scripts/accountMenu.js" defer></script>
    <?php endif; ?>
</head>

<!-- Problèmes de sécurité avec l'update car ça passe par le data attribute data-task-id, donc on peut modifier data-task-id en une autre valeur d'un autre utilisateur
        => Résolu en vérifiant l'user_id dans la requête SQL. L'user_id est stocké dans les cookies de session = inaccessible à l'utilisateur.
-->
<!-- TaskMenu ne fonctionne pas si on doit scroll pour accéder à la tache -->
<!-- Problème : la liste mélange les taches qui ont des années différentes (ex : 24 janvier 2023 et 2024 regroupés ensembles) -->

<!-- PROBLEME : MODIFICATION DE LA DATE D'UNE TACHE
    => Solution 1 : full JS
    => Solution 2 : Php passe le code HTML à appliquer pour créer des semaines (mais faut quand même tt recoder la partie PHP)
    => Js fait une requête PHP qui demande le HTML correspondant

-->

<!-- Remplacer header (#1b1a19) par #121212 et body (#292929) par #1b1a19 ? -->
<!-- https://arpit-batri.medium.com/dark-mode-ui-conversion-604d2ecc0083 -->
<!-- Light dark css -->
