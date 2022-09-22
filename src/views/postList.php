<?php ob_start(); ?>
    <section class="container mb-4">
        <div class="row g-2">
            <h1 class="text-center my-4">Mes Post</h1>
            <?php if (isset($_SESSION['message'])) { ?>
            <?php include '../src/views/templates/alert.php'; ?>
            <?php } ?>

            <?php foreach ($posts as $post) { ?>
                <div class="col-md-4 col-sm-6 col-lg-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <div>
                                <h2 class="card-title fs-3"><?php echo $post->title; ?></h2>
                                <div class="card-subtitle mb-2 fw-lighter"><?php echo $post->creat_date; ?></div>
                            </div>
                        </div>
    
                        <div class="card-body">
                            <div class="card-text"><?php echo $post->intro; ?></div>
    
                        
                            <a href="?page=post&post=<?php echo $post->id; ?>" class="btn btn-primary mt-3 col-12 text-center">
                                <i class="bi bi-eye me-2"></i>
                                voir
                            </a>
    
                        </div>
                    </div> 
                </div>
            <?php } ?>
            
            <?php if (isset($_SESSION['user']) && 'admin' == $_SESSION['user']->status) { ?>
                <div class="text-center">
                    <a href="?page=post&action=addpostform" class="btn btn-primary my-4 col-8">
                        <i class="bi bi-plus-circle"></i>
                        Ajouter un post
                    </a>
                </div>
            <?php } ?>
        </div>
    </section>
<?php $content = ob_get_clean(); ?>

<?php include '../src/views/templates/html.php'; ?>
