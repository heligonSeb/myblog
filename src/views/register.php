<?php ob_start(); ?>
<section>
    <div class="container my-4">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">S'enregistrer</h1>

                <form action="?page=login&action=addUser" method="POST">
                    <?php if(isset($_SESSION['errorMessage'])) :?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= $_SESSION['errorMessage'] ?>
                        </div>
                    <?php endif ?>

                    <div>
                        <div class="mb-3 position-relative">
                            <input type="email" class="form-control form-custom-input" name="email" id="lastnameRegister" value="" placeholder=" " required>
                            <label for="lastnameRegister" class="form-label form-custom-label position-absolute">Nom</label>
                        </div>
    
                        <div class="mb-3 position-relative">
                            <input type="email" class="form-control form-custom-input" name="email" id="firstnameRegister" value="" placeholder=" " required>
                            <label for="firstnameRegister" class="form-label form-custom-label position-absolute">Prénom</label>
                        </div>
                    </div>

                    <div class="mb-3 position-relative">
                        <input type="email" class="form-control form-custom-input" name="email" id="emailRegister" value="" placeholder=" " required>
                        <label for="emailRegister" class="form-label form-custom-label position-absolute">Email</label>
                    </div>

                    <div class="mb-3 position-relative">
                        <input type="password" class="form-control form-custom-input" name="password" id="passwordRegister" value="" placeholder=" " required>
                        <label for="passwordRegister" class="form-label form-custom-label position-absolute">Mot de passe</label>
                    </div>

                    <div class="mt-4 row g-2">
                        <div class="col-12 col-md-6">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary col-12 col-md">
                                    Enregistrer
                                </button>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="d-grid">
                                <a href="?page=login" class="btn btn-secondary col-12 col-md">
                                    cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php include '../src/views/templates/html.php' ?>