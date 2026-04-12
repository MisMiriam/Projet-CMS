<?php require_once 'layouts/_header.php' ?>

<h1 class="page-title">Tableau de bord</h1>

<section class="site-section">
    <h2 class="section-title">Mes sites web</h2>

    <div class="actions">
        <a href="#" class="btn btn--primary">Créer un site web</a>
    </div>

    <div class="card">
        <div class="card__body">
            <p>Aucun site n'a été créé...</p>
        </div>
    </div>

    <details class="accordion">
        <summary class="accordion__summary">Voir les sites</summary>

        <div class="cards-grid">
            <!-- Exemple de carte -->
            <?php for ($i = 0; $i < 3; $i++): ?>
            <article class="card card--site" style="max-width:780px;">
                <div class="card__media">
                    <img src="https://placehold.co/250x180" alt="aperçu site" class="card__img">
                </div>
                <div class="card__content">
                    <div class="card__meta">
                        <span class="badge badge--muted">Privé</span>
                        <span class="badge badge--info">Public</span>
                    </div>
                    <h3 class="card__title">Nom du site</h3>
                    <p class="card__subtitle">Auteur - <small>Date</small></p>
                    <p class="card__text">Description courte du site...</p>

                    <div class="card__actions">
                        <a href="#" class="btn btn--secondary"><svg class="icon" aria-hidden="true"><use xlink:href="/public/src/icons/sprite.svg#icon-edit"></use></svg> Éditer</a>
                        <button class="btn btn--danger" data-confirm="Confirmer la suppression du site ?" data-confirm-title="Supprimer le site" data-href="#" aria-label="Supprimer" type="button"><svg class="icon" aria-hidden="true"><use xlink:href="/public/src/icons/sprite.svg#icon-trash"></use></svg> Supprimer</button>
                        <a href="#" class="btn btn--primary">Afficher</a>
                    </div>
                </div>
            </article>
            <?php endfor; ?>
        </div>
    </details>
</section>

<section class="site-section">
    <h2 class="section-title">Favoris</h2>

    <details class="accordion">
        <summary class="accordion__summary">Voir favoris</summary>
        <div class="cards-grid cards-grid--sm">
            <?php for ($i=0;$i<4;$i++): ?>
            <article class="card card--small">
                <img src="https://placehold.co/250x180" alt="aperçu" class="card__img">
                <div class="card__body">
                    <h4 class="card__title">Nom du site</h4>
                    <p class="card__subtitle">Auteur - <small>Date</small></p>
                    <div class="card__actions"><a href="#" class="btn btn--primary">Afficher</a></div>
                </div>
            </article>
            <?php endfor; ?>
        </div>
    </details>
</section>

<section class="site-section">
    <h2 class="section-title">Liste des utilisateurs</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Utilisateur</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = [
                ['id'=>1,'name'=>'Admin','email'=>'admin01@gmail.com','role'=>'Admin'],
                ['id'=>2,'name'=>'John Doe','email'=>'john.doe@gmail.com','role'=>'Editeur'],
                ['id'=>3,'name'=>'Mary Joe','email'=>'maryjoe02@gmail.com','role'=>'Editeur'],
            ];
            foreach ($users as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= htmlspecialchars($u['name']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td>
                    <form action="#" method="post" class="role-form">
                        <label class="visually-hidden" for="role-<?= $u['id'] ?>">Rôle</label>
                        <select id="role-<?= $u['id'] ?>" name="role" class="select">
                            <option <?= $u['role']==='Admin' ? 'selected' : '' ?>>Admin</option>
                            <option <?= $u['role']==='Editeur' ? 'selected' : '' ?>>Editeur</option>
                            <option <?= $u['role']==='Visiteur' ? 'selected' : '' ?>>Visiteur</option>
                        </select>
                    </form>
                </td>
                <td>
                    <button class="btn btn--danger" data-confirm="Supprimer cet utilisateur ?" aria-label="Supprimer" type="button"><svg class="icon" aria-hidden="true"><use xlink:href="/public/src/icons/sprite.svg#icon-trash"></use></svg></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php require_once 'layouts/_footer.php' ?>
