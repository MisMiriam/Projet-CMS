    <?php require_once 'layouts/_header.php' ?>
    <h1 class="text-center my-3 my-lg-5 fw-bold">Inscription</h1>
    <section class="d-flex flex-column row-gap-3 my-2">

        <form class="container" style="max-width: 75%;" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Pseudo:</label>
                <input type="text" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="nom.prenom@example.com">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Mot de passe:</label>
                <input type="password" class="form-control" id="pwd">
            </div>
            <div class="mb-3">
                <label for="confirmPwd" class="form-label">Confirmer le mot de passe:</label>
                <input type="password" class="form-control" id="confirmPwd">
            </div>
            <button type="submit" class="btn btn-primary mb-3">S'inscrire</button>
            <!-- <div id="passwordHelpBlock" > -->
            <p class="form-text text-end">Si vous avez déjà un compte, <a class="link-primary" href="">Connecter-vous</a></p>
            <!-- </div> -->
        </form>
    </section>
    <?php require_once 'layouts/_footer.php' ?>