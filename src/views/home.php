<?php ob_start(); ?>
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

    <section id="intro" class="bg-img">
        <div class="text-white text-center">
            <h1>Héligon Sébastien</h1>
    
            <div>Le développeur qui vous comprend!</div>
        </div>
    </section>

    <section id="cv" class="bg-secondary text-white">
        <!-- <img src="" alt="mon cv"/> -->

        <div class="text-center">
            <div>Vous voulez mieux me connaitre, n'hésiter pas à consulter mon CV</div>

            <button type="button" class="btn btn-primary">
                <i class="bi bi-file-earmark-pdf-fill"></i>
                Télécharger
            </button>
        </div>
    </section>

    <section id="contact">
        <h2 class="text-center">Besoins de moi ?</h2>

        <form action="" method="POST" class="form px-2">
            <div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="lastname" aria-describedby="nomHelp"/>
                    <label for="lastname" class="form-label">Nom</label>
                </div>

                <div class="mb-3 form-custom-box">
                    <input type="text" class="form-control form-custom-input" name="firstname" aria-describedby="prenomHelp" placeholder=" "/>
                    <label for="firstname" class="form-label form-custom-label">Prénom</label>
                </div>

                <div class="mb-3 form-custom-box">
                    <input type="email" class="form-control form-custom-input" name="email" aria-describedby="prenomHelp" placeholder=" "/>
                    <label for="email" class="form-label form-custom-label">Email</label>
                </div>
            </div>

            <div class="mb-3 form-custom-box">
                <input type="text" class="form-control form-custom-input" name="subject" aria-describedby="prenomHelp" placeholder=" "/>
                    <label for="subject" class="form-label form-custom-label">Ordre du mail</label>
                </div>

                <div class="mb-3 form-custom-box">
                    <textarea class="form-control form-custom-input" name="content" aria-describedby="prenomHelp" placeholder=" "></textarea>
                    <label for="content" class="form-label form-custom-label">Votre message</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-send"></i>
                Envoyer
            </button>
        </form>
    </section>

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
<?php $content = ob_get_clean(); ?>

<?php include '../src/views/templates/html.php' ?>