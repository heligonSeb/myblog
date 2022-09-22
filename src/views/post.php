<?php ob_start(); ?>
    <!-- POST -->
    <section class="container">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="mt-2">
                <?php include '../src/views/templates/alert.php'; ?>
            </div>
        <?php } ?>


    
        <div class="card mt-4">
            <div class="card-body">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="card-title"><?php echo $post->title; ?></h1>
                        
                        <?php if (isset($_SESSION['user'])) { ?>
                            <div class="d-flex d-none d-md-block">
                                <a href="?page=post&action=editpostform&post=<?php echo $post->id; ?>" class="btn btn-success me-2">
                                    <i class="bi bi-pencil-square"></i>
                                    Modifier
                                </a>
    
                                <a href="?page=post&action=delete&post=<?php echo $post->id; ?>" class="btn btn-danger">
                                    <i class="bi bi-trash" ></i>
                                    Supprimer
                                </a>
                            </div>
                        <?php } ?>
                    </div>
            
                    <div class="text-muted fw-lighter fst-italic">
                        Le 
                        <!-- FORMATER LA DATE POUR DAY - MOIS - ANNEE-->
                        <?php if (isset($post->edit_date)) { ?>
                            <?php echo $post->edit_date; ?>
                        <?php } else { ?>
                            <?php echo $post->creat_date; ?>
                        <?php } ?>
                        ,
                        par <?php echo $user->fullName(); ?>
                    </div>
                </div>

                <hr/>
                
                <div>
                    <div class="text-center fw-bolder mb-2">
                        <?php echo $post->intro; ?>
                    </div>
            
                    <div>
                        <?php echo $post->content; ?>
                    </div>
                </div>

                <?php if (isset($_SESSION['user'])) { ?>
                    <div class="row g-2 mt-4">
                        <?php if ('admin' == $_SESSION['user']->status) { ?>
                            <a href="?page=post&action=editpostform&post=<?php echo $post->id; ?>" class="btn btn-success col-12 d-md-none ">
                                <i class="bi bi-pencil-square"></i>
                                Modifier
                            </a>

                            <a href="?page=post&action=delete&post=<?php echo $post->id; ?>" class="btn btn-danger col-12 d-md-none">
                                <i class="bi bi-trash"></i>
                                Supprimer
                            </a>
                        <?php } ?>
                        
                        <button id="addCommentButton" type="button" class="btn btn-primary col-12 col-md-6 m-md-auto">
                            <i class="bi bi-plus-circle"></i>
                            Ajouter un Commentaire
                        </button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php include '../src/views/addComment.php'; ?>
    <?php include '../src/views/commentPost.php'; ?>

    
<?php $content = ob_get_clean(); ?>

<?php include '../src/views/templates/html.php'; ?>
