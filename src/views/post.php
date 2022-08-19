<?php ob_start(); ?>
<section>
        <!-- POST -->
        <div class="card">
            <div class="card-body">
                <div>
                    <div>
                        <h1 class="card-title"><?= $post->title ?></h1>
                        
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
                            <?= $post->creat_date ?>
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
        </div>
        

        <!-- COMMENTAIRE -->
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCom">
                Ajouter un Commentaire
            </button>
            
            <div >
                <?php if(!empty($comments)): ?>
                    <h2 class="border-bottom">Commentaire</h2>
                    <?php foreach ($comments as $comment) : ?>
                        <?php if($comment->validate == 1) : ?>
                            <div class="card w-100" style="width: 18rem;">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $comment->title ?></h3>
                                    <h6 class="card-subtitle mb-2 fst-italic fw-lighter text-muted">le <?= $comment->creat_date ?>, par <?= ucfirst($comment->lastname) ?> <?= ucfirst($comment->firstname) ?></h6>

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

                                                <button type="submit" class="btn btn-success">
                                                    <i class="bi bi-check2-square"></i>
                                                </button>
                                            </div>
                                            <h6 class="card-subtitle mb-2 fst-italic fw-lighter text-muted">le <?= $comment->creat_date ?>, par <?= ucfirst($comment->lastname) ?> <?= ucfirst($comment->firstname) ?></h6>
        
                                            <p class="card-text"><?= $comment->comment ?></p>
                                        </div>
                                    </div>
                                </form>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php else : ?>
                    <div>
                        Aucun commentaire ajouté
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>


<?php include '../src/views/modals/addCommentModal.php' ?>
<?php include '../src/views/modals/editPostModal.php' ?>


<?php $content= ob_get_clean(); ?>

<?php  include '../src/views/templates/html.php' ?>
