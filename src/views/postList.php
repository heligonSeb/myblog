<?php ob_start(); ?>
    <!-- PUT IT IN TEMPLATE/VIEW THEN INCULDE -->
    <nav class="navbar navbar-expend-lg bg-secondary">
        <div class="container-fluid">
            <div>
                <img class="w-25" src="src/views/templates/media/logo-logo.png" alt="mon logo" />
            </div>

            <div class="fs-1 text-white" >
                <a href="public/login" class="text-decoration-none text-white">
                    <i class="bi bi-person-fill"></i>
                </a>

                <i class="bi bi-list"></i>
            </div>
        </div>
    </nav>

    <section class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h2>Le titre de l'article </h2>
                    <div>La date de modification</div>
                </div>

                <div>Le chapo / intro</div>

                <a href="?page=post&post=1" class="btn btn-primary">
                    <i class="bi bi-eye"></i>
                    voir
                    <i class="bi bi-plus"></i> 
                </a>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h2>Le titre de l'article </h2>
                    <div>La date de modification</div>
                </div>

                <div>Le chapo / intro</div>

                <a href="?page=post&post=2" class="btn btn-primary">
                    <i class="bi bi-eye"></i>
                    voir
                    <i class="bi bi-plus"></i> 
                </a>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h2>Le titre de l'article </h2>
                    <div>La date de modification</div>
                </div>

                <div>Le chapo / intro</div>

                <a herf="?page=post&post=3" class="btn btn-primary">
                    <i class="bi bi-eye"></i>
                    voir
                    <i class="bi bi-plus"></i> 
                </a>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h2>Le titre de l'article </h2>
                    <div>La date de modification</div>
                </div>

                <div>Le chapo / intro</div>

                <a href="?page=post&post=4" class="btn btn-primary">
                    <i class="bi bi-eye"></i>
                    voir
                    <i class="bi bi-plus"></i> 
                </a>
            </div>
        </div>

        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle"></i>
                Ajouter
            </button>
        </div>
    </section>

    <section>
        <div class="modal" id="exampleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="?page=post&action=add" method="POST">
                            <div class="mb-3">
                                <label for="title">Un titre</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>

                            <label for="intro">Intro</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="intro" id="intro" required>
                            </div>

                            <label for="content">Content</label>
                            <div class="input-group mb-3">
                                <textarea class="w-100" name="content" id="content"required></textarea>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">
                                    Ajouter
                                </button>

                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Retour
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- PUT IT IN TEMPLATE/VIEW THEN INCULDE -->
    <footer class="bg-dark text-white">
        <div>
            <ul>
                <li>Home</li>
                <li>Post</li>
            </ul>
        </div>

        <div>
            <i class="bi bi-linkedin"></i>
        </div>

        <div>Fait avec amour <i class="bi bi-heart-fill"></i> par Sébastien Héligon</div>
    </footer>
<?php $content= ob_get_clean(); ?>

<?php include '../src/views/templates/html.php' ?>