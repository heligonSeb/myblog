<section>
    <div class="modal show" id="loginModal" tabindex="-1">
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

<?php if(isset($_SESSION['errorMessage'])): ?>
<script>
    document.addEventListener("DOMContentLoaded", () => {

        let modal = new bootstrap.Modal('#loginModal');
        modal.show();

    });
</script>
<?php endif ?>