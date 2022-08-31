<?php ob_start(); ?>
    <section id="intro" class="position-relative bg-filtre">
        <img class="w-100" src="media/bg-intro.png" alt="Illustration image de fond intro"/>
        <div class="text-center text-white position-absolute center-img col-12">
            <h1 class="display-2">Héligon Sébastien</h1>
    
            <div>Le développeur qui vous comprend!</div>
        </div>
    </section>

    <section id="cv" class="bg-secondary text-white py-4">
        <img class="d-none" src="media/cv_heligon_sebastien.pdf" alt="mon cv"/>

        <div class="text-center">
            <div>Vous voulez mieux me connaitre, n'hésitez pas à consulter mon CV</div>

            <a href="media/cv_heligon_sebastien.pdf" class="btn btn-primary mt-2" download="heligon_sebastien_cv">
                <i class="bi bi-file-earmark-pdf-fill"></i>
                Télécharger
            </a>
        </div>
    </section>

    <section id="contact" class="py-4">
        <h2 class="text-center mb-4">Besoin de moi ?</h2>

        <form action="?page=sendmail" method="POST" class="form px-2">
            <div>
                <div class="mb-3 position-relative">
                    <input type="text" class="form-control form-custom-input" id="lastname" name="lastname" placeholder=" " required/>
                    <label for="lastname" class="form-label form-custom-label position-absolute">Nom</label>
                </div>

                <div class="mb-3 position-relative">
                    <input type="text" class="form-control form-custom-input" id="firstname" name="firstname" placeholder=" " required/>
                    <label for="firstname" class="form-label form-custom-label position-absolute">Prénom</label>
                </div>

                <div class="mb-3 position-relative">
                    <input type="email" class="form-control form-custom-input" id="email" name="email" placeholder=" " required/>
                    <label for="email" class="form-label form-custom-label position-absolute">Email</label>
                </div>
            </div>

            <div class="mb-3 position-relative">
                <input type="text" class="form-control form-custom-input" id="subject" name="subject" placeholder=" " required/>
                <label for="subject" class="form-label form-custom-label position-absolute">Objet</label>
            </div>

            <div class="mb-3 position-relative">
                <textarea class="form-control form-custom-input" id="content" name="content" placeholder=" " required></textarea>
                <label for="content" class="form-label form-custom-label position-absolute">Votre message</label>
            </div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary bg-gradient" >
                    <i class="bi bi-send"></i>
                    Envoyer
                </button>
            </div>
        </form>
    </section>
<?php $content = ob_get_clean(); ?>

<?php include '../src/views/templates/html.php' ?>
