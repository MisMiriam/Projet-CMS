    <?php require_once 'layouts/_header.php' ?>

    <h1 class="text-center my-3 my-lg-5 fw-bold">Tableau de bord</h1>
    <!-- Sites créée -->
    <section class="d-flex flex-column row-gap-3 my-2">
        <h2 class="fw-semibold">Mes sites web
            <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWebsites" aria-expanded="true" aria-controls="collapseWebsites">
                <i class="bi bi-chevron-down"></i>
            </button>
        </h2>
        <div>
            <a href="" class="btn btn-primary">Créer un site web</a>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="mb-0">Aucun site n'a été créée...</p>
            </div>
        </div>
        <div class="collapse show" id="collapseWebsites">
            <div class="container-fluid">
                <div class="row g-3 my-2 my-md-3">
                    <!-- card lg -->
                    <div class="col-12">
                        <div class="card" style="max-width: 780px;">
                            <div class="row g-0p-0">
                                <div class="col-md-5">
                                    <img src="https://placehold.co/250x180" class="card-img-top  mb-0" alt="image website 1">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <small class="card-subtitle mb-2 text-body-secondary"><i class="bi bi-eye-slash"></i> Privé</small>
                                        <small class="card-subtitle mb-2 text-primary"><i class="bi bi-eye"></i> Public</small>
                                        <h5 class="card-title">Nom du site</h5>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">Autheur - <small>Date</small></h6>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                        <div class="mt-4 d-flex flex-wrap justify-content-between">
                                            <div class="d-flex gap-3">
                                                <a href="#" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i> Editer</a>

                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteWebsiteModal">
                                                    <i class="bi bi-trash3"></i> Supprimer
                                                </button>
                                                <!-- Modal supprimer un site-->
                                                <div class="modal fade" id="deleteWebsiteModal" tabindex="-1" aria-labelledby="deleteWebsiteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-bg-danger">
                                                                <h1 class="modal-title  fs-5" id="deleteWebsiteModalLabel"><i class="bi bi-exclamation-triangle"></i> Supprimer le site</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Attention, si vous supprimer ce site, vous ne pourrez plus le récupérer !
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annuler</button>
                                                                <a href="#" class="btn btn-danger"><i class="bi bi-trash3"></i> Confirmer la suppression</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary">Afficher</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card" style="max-width: 780px;">
                            <div class="row g-0p-0">
                                <div class="col-md-5">
                                    <img src="https://placehold.co/250x180" class="card-img-top  mb-0" alt="image website 1">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <small class="card-subtitle mb-2 text-body-secondary"><i class="bi bi-eye-slash"></i> Privé</small>
                                        <small class="card-subtitle mb-2 text-primary"><i class="bi bi-eye"></i> Public</small>
                                        <h5 class="card-title">Nom du site</h5>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">Autheur - <small>Date</small></h6>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                        <div class="mt-4 d-flex flex-wrap justify-content-between">
                                            <div class="d-flex gap-3">
                                                <a href="#" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i> Editer</a>

                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteWebsiteModal">
                                                    <i class="bi bi-trash3"></i> Supprimer
                                                </button>
                                                <!-- Modal supprimer un site-->
                                                <div class="modal fade" id="deleteWebsiteModal" tabindex="-1" aria-labelledby="deleteWebsiteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-bg-danger">
                                                                <h1 class="modal-title  fs-5" id="deleteWebsiteModalLabel"><i class="bi bi-exclamation-triangle"></i> Supprimer le site</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Attention, si vous supprimer ce site, vous ne pourrez plus le récupérer !
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annuler</button>
                                                                <a href="#" class="btn btn-danger"><i class="bi bi-trash3"></i> Confirmer la suppression</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary">Afficher</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card" style="max-width: 780px;">
                            <div class="row g-0p-0">
                                <div class="col-md-5">
                                    <img src="https://placehold.co/250x180" class="card-img-top  mb-0" alt="image website 1">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <small class="card-subtitle mb-2 text-body-secondary"><i class="bi bi-eye-slash"></i> Privé</small>
                                        <small class="card-subtitle mb-2 text-primary"><i class="bi bi-eye"></i> Public</small>
                                        <h5 class="card-title">Nom du site</h5>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">Autheur - <small>Date</small></h6>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                        <div class="mt-4 d-flex flex-wrap justify-content-between">
                                            <div class="d-flex gap-3">
                                                <a href="#" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i> Editer</a>

                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteWebsiteModal">
                                                    <i class="bi bi-trash3"></i> Supprimer
                                                </button>
                                                <!-- Modal supprimer un site-->
                                                <div class="modal fade" id="deleteWebsiteModal" tabindex="-1" aria-labelledby="deleteWebsiteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-bg-danger">
                                                                <h1 class="modal-title  fs-5" id="deleteWebsiteModalLabel"><i class="bi bi-exclamation-triangle"></i> Supprimer le site</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Attention, si vous supprimer ce site, vous ne pourrez plus le récupérer !
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annuler</button>
                                                                <a href="#" class="btn btn-danger"><i class="bi bi-trash3"></i> Confirmer la suppression</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary">Afficher</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card" style="max-width: 780px;">
                            <div class="row g-0p-0">
                                <div class="col-md-5">
                                    <img src="https://placehold.co/250x180" class="card-img-top  mb-0" alt="image website 1">

                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <small class="card-subtitle mb-2 text-body-secondary"><i class="bi bi-eye-slash"></i> Privé</small>
                                        <small class="card-subtitle mb-2 text-primary"><i class="bi bi-eye"></i> Public</small>
                                        <h5 class="card-title">Nom du site</h5>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">Autheur - <small>Date</small></h6>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                        <div class="mt-4 d-flex flex-wrap justify-content-between">
                                            <div class="d-flex gap-3">
                                                <a href="#" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i> Editer</a>

                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteWebsiteModal">
                                                    <i class="bi bi-trash3"></i> Supprimer
                                                </button>
                                                <!-- Modal supprimer un site-->
                                                <div class="modal fade" id="deleteWebsiteModal" tabindex="-1" aria-labelledby="deleteWebsiteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-bg-danger">
                                                                <h1 class="modal-title  fs-5" id="deleteWebsiteModalLabel"><i class="bi bi-exclamation-triangle"></i> Supprimer le site</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Attention, si vous supprimer ce site, vous ne pourrez plus le récupérer !
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annuler</button>
                                                                <a href="#" class="btn btn-danger"><i class="bi bi-trash3"></i> Confirmer la suppression</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary">Afficher</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sites enregistrés -->
    <section class="d-flex flex-column row-gap-3 my-2">
        <h2 class="fw-semibold">Favoris
            <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFav" aria-expanded="false" aria-controls="collapseFav">
                <i class="bi bi-chevron-down"></i>
            </button>
        </h2>
        <div class="collapse" id="collapseFav">
            <div class="container-fluid">
                <div class="row g-3 my-2 my-md-3">
                    <!-- card sm -->
                    <div class="col">
                        <div class="card p-4" style="max-width: 400px; min-width: 330px;">
                            <div class=" position-relative">
                                <img src="https://placehold.co/250x180" class="card-img-top  mb-4" alt="image website 1">
                                <div class="p-4 position-absolute top-0 start-0">
                                    <button class="btn btn-light rounded-circle " style="width: 4rem;" type="button"><i class="bi bi-heart" style="color: red; font-size: 2em;"></i></button>
                                    <button class="btn btn-light rounded-circle" style="width: 4rem;" type="button"><i class="bi bi-heart-fill" style="color: red; font-size: 2em;"></i></button>
                                </div>
                            </div>
                            <div class="">
                                <div class="card-body">
                                    <h5 class="card-title">Nom du site</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Autheur - <small>Date</small></h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                    <div class="mt-4 d-flex flex-wrap justify-content-end">
                                        <a href="#" class="btn btn-primary">Afficher</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card p-4" style="max-width: 400px; min-width: 330px;">
                            <div class=" position-relative">
                                <img src="https://placehold.co/250x180" class="card-img-top  mb-4" alt="image website 1">
                                <div class="p-4 position-absolute top-0 start-0">
                                    <button class="btn btn-light rounded-circle " style="width: 4rem;" type="button"><i class="bi bi-heart" style="color: red; font-size: 2em;"></i></button>
                                    <button class="btn btn-light rounded-circle" style="width: 4rem;" type="button"><i class="bi bi-heart-fill" style="color: red; font-size: 2em;"></i></button>
                                </div>
                            </div>
                            <div class="">
                                <div class="card-body">
                                    <h5 class="card-title">Nom du site</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Autheur - <small>Date</small></h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                    <div class="mt-4 d-flex flex-wrap justify-content-end">
                                        <a href="#" class="btn btn-primary">Afficher</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card p-4" style="max-width: 400px; min-width: 330px;">
                            <div class=" position-relative">
                                <img src="https://placehold.co/250x180" class="card-img-top  mb-4" alt="image website 1">
                                <div class="p-4 position-absolute top-0 start-0">
                                    <button class="btn btn-light rounded-circle " style="width: 4rem;" type="button"><i class="bi bi-heart" style="color: red; font-size: 2em;"></i></button>
                                    <button class="btn btn-light rounded-circle" style="width: 4rem;" type="button"><i class="bi bi-heart-fill" style="color: red; font-size: 2em;"></i></button>
                                </div>
                            </div>
                            <div class="">
                                <div class="card-body">
                                    <h5 class="card-title">Nom du site</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Autheur - <small>Date</small></h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                    <div class="mt-4 d-flex flex-wrap justify-content-end">
                                        <a href="#" class="btn btn-primary">Afficher</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card p-4" style="max-width: 400px; min-width: 330px;">
                            <div class=" position-relative">
                                <img src="https://placehold.co/250x180" class="card-img-top  mb-4" alt="image website 1">
                                <div class="p-4 position-absolute top-0 start-0">
                                    <button class="btn btn-light rounded-circle " style="width: 4rem;" type="button"><i class="bi bi-heart" style="color: red; font-size: 2em;"></i></button>
                                    <button class="btn btn-light rounded-circle" style="width: 4rem;" type="button"><i class="bi bi-heart-fill" style="color: red; font-size: 2em;"></i></button>
                                </div>
                            </div>
                            <div class="">
                                <div class="card-body">
                                    <h5 class="card-title">Nom du site</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Autheur - <small>Date</small></h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                    <div class="mt-4 d-flex flex-wrap justify-content-end">
                                        <a href="#" class="btn btn-primary">Afficher</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tableau des utilisateurs -->
    <section class="d-flex flex-column row-gap-3 my-2">
        <h2 class="fw-semibold">Liste des utilisateurs</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Utilisateurs</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rôles</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Admin</td>
                    <td>admin01@gmail.com</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="badge rounded-pill text-bg-danger p-2 px-3">Admin</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Admin</a></li>
                                <li><a class="dropdown-item" href="#">Editeur</a></li>
                                <li><a class="dropdown-item" href="#">Visiteur</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Supprimer"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>John Doe</td>
                    <td>john.doe@gmail.com</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="badge rounded-pill text-bg-primary p-2 px-3">Editeur</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Admin</a></li>
                                <li><a class="dropdown-item" href="#">Editeur</a></li>
                                <li><a class="dropdown-item" href="#">Visiteur</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Supprimer"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Mary Joe</td>
                    <td>maryjoe02@gmail.com</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="badge rounded-pill text-bg-primary p-2 px-3">Editeur</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Admin</a></li>
                                <li><a class="dropdown-item" href="#">Editeur</a></li>
                                <li><a class="dropdown-item" href="#">Visiteur</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Supprimer"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Bobby Doe</td>
                    <td>bobby.doe@gmail.com</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="badge rounded-pill text-bg-light p-2 px-3">Visiteur</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Admin</a></li>
                                <li><a class="dropdown-item" href="#">Editeur</a></li>
                                <li><a class="dropdown-item" href="#">Visiteur</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Supprimer"><i class="bi bi-trash3"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
    <?php require_once 'layouts/_footer.php' ?>