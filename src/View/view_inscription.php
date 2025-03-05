<?php

include_once "../../templates/head.php";

?>

<body class="container">
    <h1 class="text-center">S'inscrire chez Saïd FADLI</h1>
    <form action="" class="row g-3" method="POST" novalidate>

        <div class="col-md-6">
            <label for="lastname" class="form-label"><i class="fa-solid fa-user-tie"></i> Nom</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $_POST['lastname'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['lastname'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="firstname" class="form-label"><i class="fa-solid fa-user-tie"></i> Prénom</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $_POST['firstname'] ?? '' ?>"
                required>
            <p class="text-danger"><?= $error['firstname'] ?? '' ?></p>
        </div>

        <div class="col-md-12">
            <label for="pseudo" class="form-label"><i class="fa-solid fa-circle-user"></i> Pseudo</label>
            <input type="pseudo" class="form-control" id="pseudo" name="pseudo" value="<?= $_POST['pseudo'] ?? '' ?>"
                required>
            <p class="text-danger"><?= $error['pseudo'] ?? '' ?></p>
        </div>

        <div class="col-md-12">
            <label for="mail" class="form-label"><i class="fa-solid fa-envelope"></i> Mail</label>
            <input type="email" class="form-control" id="mail" name="mail" value="<?= $_POST['mail'] ?? '' ?>"
                required>
            <p class="text-danger"><?= $error['mail'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="password" class="form-label"><i class="fa-solid fa-lock"></i> Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password"
                value="<?= $_POST['password'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['password'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="confirmation" class="form-label"><i class="fa-solid fa-copy"></i> Comfirmation mot de passe</label>
            <input type="password" class="form-control" id="confirmation" name="confirmation"
                value="<?= $_POST['confirmation'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['confirmation'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="birthdate" class="form-label"><i class="fa-regular fa-calendar"></i> Date de naissance</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate"
                value="<?= $_POST['birthdate'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['birthdate'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="genre" class="form-label"><i class="fa-solid fa-venus-mars"></i> Genre</label>
            <select id="genre" name="genre" class="form-select" required>
                <option value="" selected>Sélectionner...</option>
                <option value="homme" <?= isset($_POST["genre"]) && $_POST['genre'] == "homme" ? 'selected' : '' ?>>Homme
                </option>
                <option value="femme" <?= isset($_POST["genre"]) && $_POST['genre'] == "femme" ? 'selected' : '' ?>>Femme
                </option>
            </select>
            <p class="text-danger"><?= $error['genre'] ?? '' ?></p>
        </div>

        <div class="col-12">
            <div class="form-check">
                <input name="condition" class="form-check-input" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                    J'ai compris les conditions d'utilisation
                </label>
            </div>
            <p class="text-danger"><?= $error['condition'] ?? '' ?></p>

        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>

    </form>

    <div class="col-12 text-center mt-3">
        <a href="../Controller/controller_connexion.php" class="btn btn-danger">
            Retour
        </a>
    </div>

    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
</body>

</html>