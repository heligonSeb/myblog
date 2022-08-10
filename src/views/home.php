<?php ob_start(); ?>
    <section id="intro" class="bg-img">
        <div class="text-white text-center">
            <h1>Héligon Sébastien</h1>
    
            <div>Le développeur qui vous comprend!</div>
        </div>
    </section>

    <section id="cv" class="bg-secondary text-white">
        <!-- <img src="" alt="mon cv"/> -->

        <div class="text-center">
            <div>Vous voulez mieux me connaitre, n'hésitez pas à consulter mon CV</div>

            <a href="../src/views/templates/media/cv_heligon_sebastien.pdf" class="btn btn-primary" download="heligon_sebastien_cv">
                <i class="bi bi-file-earmark-pdf-fill"></i>
                Télécharger
            </a>
        </div>
    </section>

    <section id="contact">
        <h2 class="text-center">Besoin de moi ?</h2>

        <form action="?page=sendmail" method="POST" class="form px-2">
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
<?php $content = ob_get_clean(); ?>

<?php include '../src/views/templates/html.php' ?>
