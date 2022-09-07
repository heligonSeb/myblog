<?php ob_start(); ?>
    <section class="container my-4">
        <h1 class="text-center mb-4">Ajouter un post</h1>

        <form action="?page=post&action=add" method="POST">
            <div class="mb-3 position-relative">
                <input type="text" class="form-control form-custom-input" name="title" id="title" placeholder=" " required>
                <label for="title" class="form-label form-custom-label position-absolute">Un titre</label>
            </div>

            <div class="mb-3 position-relative">
                <input type="text" class="form-control form-custom-input" name="intro" id="intro" placeholder=" " required>
                <label for="intro" class="form-label form-custom-label position-absolute">Intro</label>
            </div>

            <div class="mb-3 position-relative">
                <textarea class="form-control form-custom-input" name="content" id="content" placeholder=" " required></textarea>
                <label for="content" class="form-label form-custom-label position-absolute">Content</label>
            </div>

            <div class="row g-2">
                <div class="col-12 col-md-6">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary col-12 col-md">
                            Ajouter
                        </button>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="d-grid">
                        <a href="?page=post" class="btn btn-outline-secondary col-12 col-md">
                            Retour
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </section>
<?php $content= ob_get_clean(); ?>

<?php include '../src/views/templates/html.php' ?>