<section>
    <div class="modal fade" id="loginModal" aria-labelledby="modal de connexion" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="btn w-100 text-end" >
                        <i class="bi bi-x btn-close" data-bs-dismiss="modal" aria-label="Close"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="?page=login&action=connect" method="POST">
                        <?php if(isset($_GET['error'])) :?>
                            <div class="alert alert-danger text-center" role="alert" id="login-error-message">
                                <?= $_GET['error'] ?>
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
                            <button type="submit" class="btn btn-primary w-100 mb-2">
                                Connexion
                            </button>

                            <a href="#addUser" data-bs-toggle="modal">
                                s'enregistrer !
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

        let modalLogin = new bootstrap.Modal('#loginModal');
        //let error= document.getElementById('login-error-message');

        if (window.location.pathname.match(/^\/login/)) {
            modalLogin.show();
        }

        // error.addEventListener('hidden.bs.modal', () => {
        //     console.log('here');
        //     error.style.display = 'none'
        // });


    });
</script>

