<section>
    <div class="modal" id="addUser" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="?page=login&action=addUser" method="POST">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i>
                    </button>

                    <?php if(isset($_SESSION['errorMessage'])) :?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= $_SESSION['errorMessage'] ?>
                        </div>
                    <?php endif ?>

                    <div>
                        <div class="mb-3">
                            <label for="emailConnect">Nom</label>
                            <input type="email" class="form-control" name="email" id="emailConnect" value="" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="emailConnect">Prénom</label>
                            <input type="email" class="form-control" name="email" id="emailConnect" value="" required>
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
</section>

<?php if(isset($_SESSION['errorMessage'])): ?>
<script>
    document.addEventListener("DOMContentLoaded", () => {

        let modalRegister = new bootstrap.Modal('#addUser');
        modalmodalRegister.show();

    });
</script>
<?php endif ?>