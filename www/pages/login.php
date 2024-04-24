<?php
    $title = "Se connecter - Todo List";
    include_once("../includes/head.php");
    require("../utils/test_input.php");
?>
<html>

<?php
    $error = null;
    $username = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);

        if(!$username || !$password){
            $error = "Merci de remplir tous les champs.";
        } elseif(db_request("SELECT COUNT(*) FROM users WHERE user_name = '$username' AND user_password = '$password'", $bdd) -> fetchColumn() == 0) {
            $error = "Identifiant ou mot de passe invalide.";
        } else {
            
            $_SESSION["user"] = [
                "user_name" => $username,
                "user_password" => $password,
                "user_id" => intval(db_request("SELECT * FROM users WHERE user_name = '$username';", $bdd) -> fetch(PDO::FETCH_ASSOC)["user_id"])
            ];
            
            header('Location: ./mylist.php');
            // exit();
        }
    }

?>

<body id="login-body" class="auth-body">
    <form id="login-form" class="auth-form" method="POST"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2 class="auth-title" id="login-title">Se connecter</h2>
        <label id="username-label" for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" placeholder="Votre nom d'utilisateur" required></input>

        <label id="password-label" for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>

        <?php if($error):?>
        <div class="auth-error" id="login-error">
            <svg width="24px" height="24px" viewBox="0 0 24 24" id="error-icon">
                <g id="error" stroke="none" fill="none" fill-rule="evenodd" transform="translate(3.000000, 3.000000)">
                    <path
                        d="M9,12 C9.55228475,12 10,12.4477153 10,13 C10,13.5522847 9.55228475,14 9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 Z"
                        id="error-icon-path1" fill="#666666" fill-rule="nonzero"></path>
                    <path
                        d="M9,9.5 L9,4.5 L9,9.5 Z M9,18 C4.029,18 0,13.971 0,9 C0,4.029 4.029,0 9,0 C13.971,0 18,4.029 18,9 C18,13.971 13.971,18 9,18 Z"
                        id="error-icon-path2" stroke="#666" stroke-width="1.5" stroke-linecap="round"></path>
                </g>
            </svg>
            <?php 
                echo $error;
                endif;
            ?>
        </div>

        <button type="submit" class="auth-submit" id="login-submit">Valider</button>

    </form>
</body>

</html>