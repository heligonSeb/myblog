<?php ob_start(); ?>
    <section class="container my-3">
        <h1 class="text-center mb-4">Modifier le post</h1>

        <form action="?page=post&action=editPost" method="POST">
            <input type="text" name="post_id" value="<?= $post->id ?>" hidden/>

            <div class="mb-3 position-relative">
                <input type="text" class="form-control form-custom-input" name="title" id="title" value="<?= $post->title ?>" placeholder=" " required>
                <label for="title" class="form-label form-custom-label position-absolute">Un titre</label>
            </div>

            <div class="mb-3 position-relative">
                <input type="text" class="form-control form-custom-input" name="intro" id="intro" value="<?= $post->intro ?>" placeholder=" " required>
                <label for="intro" class="form-label form-custom-label position-absolute">Intro</label>
            </div>

            <div class="mb-3 position-relative">
                <textarea class="form-control form-custom-input" name="content" id="content" placeholder=" " required><?= $post->content ?></textarea>
                <label for="content" class="form-label form-custom-label position-absolute">Contenu du post</label>
            </div>

            <div class="row row-cols-md-2 g-2">
                <button type="submit" class="btn btn-primary col-12 col-md-6">
                    Ajouter
                </button>

                <a href="?page=post&post=<?= $post->id ?>" class="btn btn-outline-secondary col-12 col-md-6">
                    Retour
                </a>
            </div>
        </form>
    </section>
<?php $content = ob_get_clean(); ?>

<?php include '../src/views/templates/html.php' ?>