<?php ob_start(); ?>
<section>
        <div>
            <div>
                <div>
                    <h1><?= $post->title ?></h1>
                    
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editPost">
                        edit
                    </button>
                </div>
        
                <div>
                    Ecrie par <?= $user->fullName() ?> le 
                    <!-- FORMATER LA DATE POUR DAY - MOIS - ANNEE-->
                    <?php if(isset($post->edit_date)) :?>
                        <?= $post->edit_date ?>
                    <?php else : ?>
                        <?= $post->creat_date?>
                    <?php endif ?>
                </div>
            </div>
    
            <div>
                <?= $post->intro ?>
            </div>
    
            <div>
                <?= $post->content ?>
            </div>
        </div>
    
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCom">
                Ajouter un Commentaire
            </button>
            
            <div>
                <?php if(!empty($comments)) : ?>
                    <h2 class="border-bottom">Commentaire</h2>
                    <?php foreach ($comments as $comment) : ?>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h3 class="card-title"><?= $comment->title ?></h3>
                                <h6 class="card-subtitle mb-2 fst-italic fw-lighter text-muted">le <?= $comment->creat_date ?>, par <?= ucfirst($comment->lastname) ?> <?= ucfirst($comment->firstname) ?></h6>

                                <p class="card-text"><?= $comment->comment ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <div>
                        Aucun commentaire ajouté
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>

    <section>
        <div class="modal" id="addCom" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un commentaire</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="?page=post&action=addComment" method="POST">
                            <input type="number" name="post_id" value="<?= $post->id ?>" hidden>
                            <div class="mb-3">
                                <label for="title">Un titre</label>
                                <input type="text" class="form-control" name="title" id="title"  required>
                            </div>

                            <label for="comment">Le commentaire</label>
                            <div class="input-group mb-3">
                                <textarea class="w-100" name="comment" id="comment"required></textarea>
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

    <section>
        <div class="modal" id="editPost" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier le post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="?page=post&action=editPost" method="POST">
                            <input type="text" name="post_id" value="<?= $post->id ?>" hidden/>

                            <div class="mb-3">
                                <label for="title">Un titre</label>
                                <input type="text" class="form-control" name="title" id="title" value="<?= $post->title ?>" required>
                            </div>

                            <label for="intro">Intro</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="intro" id="intro" value="<?= $post->intro ?>" required>
                            </div>

                            <label for="content">Contenu du post</label>
                            <div class="input-group mb-3">
                                <textarea class="w-100 p-2" name="content" id="content" required><?= $post->content ?></textarea>
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

<?php  include '../src/views/templates/html.php' ?>