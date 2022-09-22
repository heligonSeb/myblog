<section class="container my-4">   
    <?php if (!empty($comments)) { ?>
        <div>
            <div>
                <h2 class="mb-2 text-center display-4">Commentaire</h2>
                <?php foreach ($comments as $comment) { ?>
                    <?php if (1 == $comment->validate) { ?>
                        <div class="card col-12 my-2">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $comment->title; ?></h3>
                                <h6 class="card-subtitle mb-2 fst-italic fw-lighter text-muted">Le <?php echo $comment->creat_date; ?>, par <?php echo ucfirst($comment->lastname); ?> <?php echo ucfirst($comment->firstname); ?></h6>

                                <p class="card-text"><?php echo $comment->comment; ?></p>
                            </div>
                        </div>
                    <?php } else { ?>
                        <?php if (isset($_SESSION['user']) && 'admin' == $_SESSION['user']->status) { ?>
                            <form action="?page=post&post=<?php echo $post->id; ?>&action=validatecomment" method="POST">
                                
                                <label for="commentId" hidden>Comment id</label>
                                <input type="number" id="commentId"  class="form-control" name="commentId" value="<?php echo $comment->id; ?>" hidden/>
                                
                                <div class="card w-100" style="width: 18rem;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h3 class="card-title"><?php echo $comment->title; ?></h3>

                                            <button type="submit" class="btn btn-success d-none" title="Valider le commentaire">
                                                <i class="bi bi-check2-square"></i>
                                            </button>
                                        </div>
                                        <h6 class="card-subtitle mb-2 fst-italic fw-lighter text-muted">le <?php echo $comment->creat_date; ?>, par <?php echo ucfirst($comment->lastname); ?> <?php echo ucfirst($comment->firstname); ?></h6>
    
                                        <p class="card-text"><?php echo $comment->comment; ?></p>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success d-ms-none col-12 col-md-6 m-md-auto">
                                                <i class="bi bi-check2-square"></i>
                                                Valider le commentaire
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-info text-center">
            Aucun commentaire ajouté
        </div>
    <?php } ?>
</section>

