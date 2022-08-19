<?php ob_start(); ?>

<div class="error errorForbidden">
    <a href="/" class="btn btn-outline-secondary mt-4 ms-4">
        <i class="bi bi-arrow-left"></i>
        Accueil
    </a>
</div>

<?php $content= ob_get_clean(); ?>

<?php include '../src/views/templates/html.php' ?>
