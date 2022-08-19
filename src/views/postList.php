<?php ob_start(); ?>
    <section class="">
        <?php foreach ($posts as $post) : ?>
            <div class="card m-2">
                <div class="card-header">
                    <div>
                        <h2 class="card-title fs-1"><?= $post->title ?></h2>
                        <div class="card-subtitle mb-2 fw-lighter"><?= $post->creat_date ?></div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card-text"><?= $post->intro ?></div>

                
                    <a href="?page=post&post=<?= $post->id ?>" class="btn btn-primary mt-3 col-12">
                        <i class="bi bi-eye"></i>
                        voir
                        <i class="bi bi-plus"></i> 
                    </a>

                </div>
            </div> 
        <?php endforeach ?>
        
        <?php if(isset($_SESSION['user']) && $_SESSION['user']->status == 'admin') : ?>
            <div class="text-center">
                <button type="button" class="btn btn-primary my-2 w-75" data-bs-toggle="modal" data-bs-target="#addPost">
                    <i class="bi bi-plus-circle"></i>
                    Ajouter un post
                </button>
            </div>
        <?php endif ?>
    </section>

    <section>
        <div class="modal" id="addPost" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="?page=post&action=add" method="POST">
                            <div class="mb-3">
                                <label for="title">Un titre</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>

                            <label for="intro">Intro</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="intro" id="intro" required>
                            </div>

                            <label for="content">Content</label>
                            <div class="input-group mb-3">
                                <textarea class="w-100" name="content" id="content"required></textarea>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">
                                    Ajouter
                                </button>

                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Retour
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $content= ob_get_clean(); ?>

<?php include '../src/views/templates/html.php' ?>
