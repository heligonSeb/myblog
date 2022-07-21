<nav class="navbar navbar-expend-lg bg-secondary">
    <div class="container-fluid">
        <div>
            <a href="/public">
                <img class="w-25" src="src/views/templates/media/logo-logo.png" alt="mon logo" />
            </a>
        </div>

        <div class="fs-1 text-white" >
            <?php if(isset($_SESSION['user'])) : ?>
                <div>Bonjour <?= $_SESSION['user']->firstname ?></div>
            <?php endif ?>
            <a href="" class="text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="bi bi-person-fill"></i>
            </a>

            <i class="bi bi-list"></i>
        </div>
    </div>
</nav>

<?php include '../src/views/modals/loginModal.php' ?>
<?php include '../src/views/modals/registerModal.php' ?>

<!-- <section>
    <div class="modal" id="login" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="?page=login&action=connect" method="POST">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i>
                    </button>

                    <div class="mb-3">
                        <label for="emailConnect">Email</label>
                        <input type="email" class="form-control" name="email" id="emailConnect" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="passwordConnect">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="passwordConnect" value="" required>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">
                            Connexion
                        </button>

                        <a href="" data-bs-toggle="modal" data-bs-target="#addUser">
                            s'enregistrer!
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="modal" id="addUser" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="?page=login&action=addUser" method="POST">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i>
                    </button>

                    <div>
                        <div class="mb-3">
                            <label for="lastname">Nom</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" value="" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="firstname">Prénom</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="emailConnect">Email</label>
                        <input type="email" class="form-control" name="email" id="emailConnect" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="passwordConnect">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="passwordConnect" value="" required>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>

                        <a href="" data-bs-dismiss="modal">
                            cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> -->