<?php
    $title = "Deconnexion...";
    include_once("../includes/head.php");
?>

<?php
    unset($_SESSION["user"]);
    header("Location: ./home.php");
?>