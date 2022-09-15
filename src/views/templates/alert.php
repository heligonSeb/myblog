<div class="alert<?= $_SESSION['message']['color'] ?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['message']['content'] ?>
    
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php unset($_SESSION['message']) ?>