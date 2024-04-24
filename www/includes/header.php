<header>
    <h1 id="title">Todo List</h1>
    <div id="header-right-menu">
        <?php if(!isset($_SESSION["user"])): ?>
        <a class="header-links" id="register-btn" href="../pages/register.php">Créer un compte</a>
        <a class="header-links" id="login-btn" href="../pages/login.php">Se connecter</a>
        <?php else: ?>
        <div id="account-button">
            <!-- <div id="account-logo"></div> -->
            <!-- <img id="account-logo" data-img="user"> -->
            <img id="account-logo" src="../assets/images/user-dark.png">
            <!-- <script>document.getElementById("account-logo").src = "../assets/images/user-" + getTheme() + ".png";</script> -->
            <span>Mon compte</span>
        </div>
        <div id="account-dropdown">
            <h2 id="account-username"><?php echo $_SESSION["user"]["user_name"]; ?></h2>
            <hr id="account-separator">
            <ul class="account-list">
                <li class="account-option" id="preferences">
                    <a href="../pages/preferences.php" id="preferences-link" class="account-link">
                        <img class="logo" id="preferences-img" data-img="preferences">
                        <!-- <script>document.getElementById("preferences-img").src = "../assets/images/preferences-" + getTheme() + ".png";</script> -->
                        <span>Préférences</span>
                    </a>
                </li>
                <li class="account-option" id="disconnect">
                    <a href="../pages/logout.php" id="logout-link" class="account-link" data-img="disconnect">
                        <img class="logo" id="disconnect-img" data-img="disconnect">
                        <!-- <script>document.getElementById("disconnect-img").src = "../assets/images/disconnect-" + getTheme() + ".png";</script> -->
                        <span>Se déconnecter</span>
                    </a>
                </li>
            </ul>
        </div>
        <?php endif; ?>
    </div>
    </div>
</header>