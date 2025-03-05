<?php

include_once "../../templates/head.php";
session_start();

var_dump($_SESSION)
?>

<body>
    <h1 class="text-center">Bienvenu <span class="text-uppercase"><?= $_SESSION["user_pseudo"] ?></span></h1>
</body>

</html>