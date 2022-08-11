<nav class="navbar navbar-expend-lg bg-secondary">
    <div class="container-fluid">
        <div>
            <a href="/public">
                <img class="w-25" src="media/logo-logo.png" alt="mon logo" />
            </a>
        </div>

        <div class="fs-1 text-white" >
            <?php if(isset($_SESSION['user'])) : ?>
                <div>Bonjour <?= $_SESSION['user']->firstname ?></div>

                <a href="?page=login&action=logoff" class="text-decoration-none text-danger">
                    <i class="bi bi-power"></i>
                </a>
            <?php else : ?>
                <a href="" class="text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="bi bi-person-fill"></i>
                </a>
            <?php endif ?>

            <i class="bi bi-list"></i>
        </div>
    </div>
</nav>

<?php include '../src/views/modals/loginModal.php' ?>
<?php include '../src/views/modals/registerModal.php' ?>
