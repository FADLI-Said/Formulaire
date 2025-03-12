<nav class="navbar navbar-expand-lg bg-body-tertiary z-2 position-sticky top-0" style="width: 100%;">
    <div class="container-fluid">
        <a class="navbar-brand" href="../../src/Controller/controller_home.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a type="button" class="list-group-item list-group-item-action border-white"
                        href="../../src/Controller/controller_home.php"><i
                            class="fa-solid fa-house p-1 align-content-center text-center"
                            style="width:2rem; height:2rem"></i>
                        Accueil</a>
                </li>
                <li class="nav-item">
                    <a type="button" class="list-group-item list-group-item-action border-white"><i
                            class="fa-solid fa-magnifying-glass p-1 align-content-center text-center"
                            style="width:2rem; height:2rem"></i> Recherche</a>
                </li>
                <li class="nav-item">
                    <a type="button" href="../../src/Controller/controller_post.php"
                        class="list-group-item list-group-item-action border-white"><i
                            class="fa-solid fa-plus border p-1 align-content-center text-center"
                            style="width:2rem; height:2rem"></i> Créer</a>
                </li>
                <li class="nav-item">
                    <a type="button" class="list-group-item list-group-item-action border-white"
                        href="../../src/Controller/controller_profile.php">
                        <img src="../../assets\img\dog.jpg" style="width:2rem; height:2rem" alt="Image de profile"
                            class="rounded-circle p-1"> Profil</a>
                </li>
                <li>
                    <a type="button" class="list-group-item list-group-item-action border-white"
                        href="../../src/Controller/controller_deconnexion.php"><i
                            class="fa-solid fa-right-from-bracket p-1 align-content-center text-center"
                            style="width:2rem; height:2rem"></i> Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="position-fixed top-50 start-0 translate-middle-y list-group col-lg-2 d-flex flex-column justify-content-between border p-0"
    style="height: 100vh;" id="left-menu">
    <div class="list-group">
        <a type="button" class="list-group-item list-group-item-action border-white"
            href="../../src/Controller/controller_home.php"><i
                class="fa-solid fa-house p-1 align-content-center text-center" style="width:2rem; height:2rem"></i>
            Accueil</a>

        <a type="button" class="list-group-item list-group-item-action border-white"><i
                class="fa-solid fa-magnifying-glass p-1 align-content-center text-center"
                style="width:2rem; height:2rem"></i> Recherche</a>

        <a type="button" href="../../src/Controller/controller_post.php"
            class="list-group-item list-group-item-action border-white"><i
                class="fa-solid fa-plus border p-1 align-content-center text-center"
                style="width:2rem; height:2rem"></i> Créer</a>

        <a type="button" class="list-group-item list-group-item-action border-white"
            href="../../src/Controller/controller_profile.php">
            <img src="../../assets\img\dog.jpg" style="width:2rem; height:2rem" alt="Image de profile"
                class="rounded-circle p-1"> Profil</a>
    </div>
    <a type="button" class="list-group-item list-group-item-action border-white"
        href="../../src/Controller/controller_deconnexion.php"><i
            class="fa-solid fa-right-from-bracket p-1 align-content-center text-center"
            style="width:2rem; height:2rem"></i> Déconnexion</a>
</div>