<section class="container my-4">   
    <?php if(!empty($comments)): ?>
        <div>
            <div>
                <h2 class="mb-2 text-center display-4">Commentaire</h2>
                <?php foreach ($comments as $comment) : ?>
                    <?php if($comment->validate == 1) : ?>
                        <div class="card col-12 my-2">
                            <div class="card-body">
                                <h3 class="card-title"><?= $comment->title ?></h3>
                                <h6 class="card-subtitle mb-2 fst-italic fw-lighter text-muted">Le <?= $comment->creat_date ?>, par <?= ucfirst($comment->lastname) ?> <?= ucfirst($comment->firstname) ?></h6>

                                <p class="card-text"><?= $comment->comment ?></p>
                            </div>
                        </div>
                    <?php else : ?>
                        <?php if(isset($_SESSION['user']) && $_SESSION['user']->status == 'admin') : ?>
                            <form action="?page=post&post=<?= $post->id ?>&action=validatecomment" method="POST">
                                
                                <label for="commentId" hidden>Comment id</label>
                                <input type="number" id="commentId"  class="form-control" name="commentId" value="<?= $comment->id ?>" hidden/>
                                
                                <div class="card w-100" style="width: 18rem;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h3 class="card-title"><?= $comment->title ?></h3>

                                            <button type="submit" class="btn btn-success d-none" title="Valider le commentaire">
                                                <i class="bi bi-check2-square"></i>
                                            </button>
                                        </div>
                                        <h6 class="card-subtitle mb-2 fst-italic fw-lighter text-muted">le <?= $comment->creat_date ?>, par <?= ucfirst($comment->lastname) ?> <?= ucfirst($comment->firstname) ?></h6>
    
                                        <p class="card-text"><?= $comment->comment ?></p>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success d-ms-none col-12 col-md-6 m-md-auto">
                                                <i class="bi bi-check2-square"></i>
                                                Valider le commentaire
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endif ?>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-info text-center">
            Aucun commentaire ajouté
        </div>
    <?php endif ?>
</section>