<?php ob_start(); ?>
<section>
    <div class="container my-4">
        <div class="card">
            <div class="card-body">
                <form action="?page=login&action=connect" method="POST">
                    <?php if(isset($message)) :?>
                        <div class="alert alert-danger text-center" role="alert" id="login-error-message">
                            <?= $message ?>
                        </div>
                    <?php endif ?>

                    <div class="mb-3 position-relative">
                        <input type="email" class="form-control form-custom-input" name="email" id="emailConnect" value="" placeholder=" " required>
                        <label for="emailConnect" class="form-label form-custom-label position-absolute">Email</label>
                    </div>

                    <div class="mb-3 position-relative">
                        <input type="password" class="form-control form-custom-input" placeholder=" " name="password" id="passwordConnect" value="" required>
                        <label for="passwordConnect" class="form-label form-custom-label position-absolute">Mot de passe</label>
                    </div>

                    <div class="text-center">
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary col-12 mb-2">
                                Connexion
                            </button>

                            <a href="/" class="btn btn-secondary col-12">
                                Annuler
                            </a>
                        </div>
                        
                        <div>
                            Pas encore de compte ? <a href="?page=register">S'enregistrer !</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php include '../src/views/templates/html.php' ?>