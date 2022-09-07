<?php ob_start(); ?>
    <!-- POST -->
    <section class="container">
        <div class="card mt-4">
            <div class="card-body">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="card-title"><?= $post->title ?></h1>
                        
                        <?php if(isset($_SESSION['user'])) : ?>
                            <a href="?page=post&action=editpostform&post=<?= $post->id ?>" class="btn btn-success d-none d-md-block">
                                <i class="bi bi-pencil-square"></i>
                                Modifier
                            </a>
                        <?php endif ?>
                    </div>
            
                    <div class="text-muted fw-lighter fst-italic">
                        Le 
                        <!-- FORMATER LA DATE POUR DAY - MOIS - ANNEE-->
                        <?php if(isset($post->edit_date)) :?>
                            <?= $post->edit_date ?>
                        <?php else : ?>
                            <?= $post->creat_date ?>
                        <?php endif ?>
                        ,
                        par <?= $user->fullName() ?>
                    </div>
                </div>

                <hr/>
                
                <div>
                    <div class="text-center fw-bolder mb-2">
                        <?= $post->intro ?>
                    </div>
            
                    <div>
                        <?= $post->content ?>
                    </div>
                </div>

                <?php if(isset($_SESSION['user'])) : ?>
                    <div class="row g-2 mt-4">
                        <?php if($_SESSION['user']->status == 'admin') : ?>
                            <a href="?page=post&action=editpostform&post=<?= $post->id ?>" class="btn btn-success col-12 d-md-none ">
                                <i class="bi bi-pencil-square"></i>
                                Modifier
                            </a>
                        <?php endif ?>
                        
                        <button id="addCommentButton" type="button" class="btn btn-primary col-12 col-md-6 m-md-auto">
                            <i class="bi bi-plus-circle"></i>
                            Ajouter un Commentaire
                        </button>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>

    <?php include '../src/views/addComment.php'; ?>
    <?php include '../src/views/commentPost.php'; ?>

    
<?php $content= ob_get_clean(); ?>

<?php  include '../src/views/templates/html.php' ?>
