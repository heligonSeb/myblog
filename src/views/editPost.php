<?php ob_start(); ?>
    <section class="container my-3">
        <h1 class="text-center mb-4">Modifier le post</h1>

        <form action="?page=post&action=editPost" method="POST">
            <input type="text" name="post_id" value="<?php echo $post->id; ?>" hidden/>

            <div class="mb-3 position-relative">
                <input type="text" class="form-control form-custom-input" name="title" id="title" value="<?php echo $post->title; ?>" placeholder=" " required>
                <label for="title" class="form-label form-custom-label position-absolute">Un titre</label>
            </div>

            <div class="mb-3 position-relative">
                <input type="text" class="form-control form-custom-input" name="intro" id="intro" value="<?php echo $post->intro; ?>" placeholder=" " required>
                <label for="intro" class="form-label form-custom-label position-absolute">Intro</label>
            </div>

            <div class="mb-3 position-relative">
                <textarea class="form-control form-custom-input" name="content" id="content" placeholder=" " required><?php echo $post->content; ?></textarea>
                <label for="content" class="form-label form-custom-label position-absolute">Contenu du post</label>
            </div>

            <div class="row g-2">
                <div class="col-12 col-md-6">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary d-block">
                            Ajouter
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="d-grid">
                        <a href="?page=post&post=<?php echo $post->id; ?>" class="btn btn-outline-secondary">
                            Retour
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </section>
<?php $content = ob_get_clean(); ?>

<?php include '../src/views/templates/html.php'; ?>

