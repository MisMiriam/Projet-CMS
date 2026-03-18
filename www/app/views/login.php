    <?php require_once 'layouts/_header.php' ?>
    <h1 class="text-center my-3 my-lg-5 fw-bold">Connexion</h1>
    <section class="d-flex flex-column row-gap-3 my-2">

        <form class="container" style="max-width: 75%;" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="nom.prenom@example.com">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Mot de passe:</label>
                <input type="password" class="form-control" id="pwd">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Se connecter</button>
            <!-- <div id="passwordHelpBlock" > -->
            <p class="form-text text-end">Si vous n'avez pas de compte, <a class="link-primary" href="">Inscrivez-vous</a></p>
            <!-- </div> -->
        </form>
    </section>
    <?php require_once 'layouts/_footer.php' ?>