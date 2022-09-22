<?php ob_start(); ?>

<div class="position-relative">
    <a href="/" class="btn btn-warning position-absolute button-position">
        <i class="bi bi-arrow-left"></i>
        Accueil
    </a>

    <img class="img-fluid" src="./media/<?php echo $error->getImg(); ?>" alt="<?php echo $error->getAlt(); ?>" />
</div>

<?php $content = ob_get_clean(); ?>

<?php include '../src/views/templates/html.php'; ?>
