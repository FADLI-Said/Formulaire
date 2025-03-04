<?php

include_once "../../templates/head.php";

?>

<body class="container">
    <h1 class="text-center">S'inscrire chez Saïd FADLI</h1>
    <form action="" class="row g-3" method="POST" novalidate>

        <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= $_POST['nom'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['nom'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $_POST['prenom'] ?? '' ?>"
                required>
            <p class="text-danger"><?= $error['prenom'] ?? '' ?></p>
        </div>

        <div class="col-md-12">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="pseudo" class="form-control" id="pseudo" name="pseudo" value="<?= $_POST['pseudo'] ?? '' ?>"
                required>
            <p class="text-danger"><?= $error['pseudo'] ?? '' ?></p>
        </div>

        <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>"
                required>
            <p class="text-danger"><?= $error['email'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password"
                value="<?= $_POST['password'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['password'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="confirmation" class="form-label">Comfirmation mot de passe</label>
            <input type="password" class="form-control" id="confirmation" name="confirmation"
                value="<?= $_POST['confirmation'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['confirmation'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="birthDate" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate"
                value="<?= $_POST['birthDate'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['birthDate'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="genre" class="form-label">Genre</label>
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

        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>

    </form>

    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
</body>

</html>