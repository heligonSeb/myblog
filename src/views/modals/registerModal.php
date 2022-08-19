<section>
    <div class="modal fade" id="addUser" aria-labelledby="modal pour s'enregistrer" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="btn w-100 text-end" >
                        <i class="bi bi-x btn-close" data-bs-dismiss="modal" aria-label="Close"></i>
                    </button>
                </div>

                <div class="modal-body">
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
    
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100 mb-2">
                                Enregistrer
                            </button>
    
                            <a href="" class="btn btn-secondary w-100" data-bs-dismiss="modal">
                                cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        let modalRegister = new bootstrap.Modal('#addUser');

        if (window.location.pathname.match(/^\/register/)) {
            modalRegister.show();
        }


    });
</script>
