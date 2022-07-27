<nav class="navbar navbar-expend-lg bg-secondary">
    <div class="container-fluid">
        <div>
            <a href="/public">
                <img class="w-25" src="src/views/templates/media/logo-logo.png" alt="mon logo" />
            </a>
        </div>

        <div class="fs-1 text-white" >
            <?php if(isset($_SESSION['user'])) : ?>
                <div>Bonjour <?= $_SESSION['user']->firstname ?></div>
            <?php endif ?>
            <a href="" class="text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="bi bi-person-fill"></i>
            </a>

            <i class="bi bi-list"></i>
        </div>
    </div>
</nav>

<?php include '../src/views/modals/loginModal.php' ?>
<?php include '../src/views/modals/registerModal.php' ?>
