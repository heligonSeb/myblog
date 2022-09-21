<div class="alert alert-<?php echo $_SESSION['message']['color']; ?> alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['message']['content']; ?>
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php unset($_SESSION['message']); ?>