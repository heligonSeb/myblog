<nav class="navbar sticky-top navbar-expend-lg bg-secondary">
    <div class="container-fluid">
        <a href="/" class="navbar-brand col-4 col-md-6">
            <img class="img-fluid w-50" src="media/logo-logo.png" alt="mon logo" />
        </a>

        <div class="d-none d-md-block text-white">
            <ul>
                <li class="w-50 m-auto d-flex justify-content-center align-items-center">
                    <a class="nav-link" href="/">Home</a>
                </li>
    
                <li>
                    <a class="nav-link" href="?page=post">Post</a>
                </li>
            </ul>
        </div>

        <div class="text-white d-flex align-items-center" >
            <?php if(isset($_SESSION['user'])) : ?>
                <div>Bonjour <?= $_SESSION['user']->firstname ?></div>

                <a href="?page=login&action=logoff" class="text-decoration-none text-danger fs-3 ms-1">
                    <i class="bi bi-power"></i>
                </a>
            <?php else : ?>
                <a href="#loginModal" role="button" class="text-decoration-none text-white fs-3" data-bs-toggle="modal" >
                    <i class="bi bi-person-fill"></i>
                </a>
            <?php endif ?>
            <div class="ico-btn navbar-toggler p-0" data-bs-toggle="collapse" data-bs-target="#navBarSmallScreen">
                <span class="ico-btn__burger"></span>
            </div>
        </div>

        <div id="navBarSmallScreen" class="collapse navbar-collapse text-white">
            <ul class="nav navbar-nav">
                <li class="m-auto d-flex justify-content-center align-items-center">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="m-auto d-flex justify-content-center align-items-center">
                    <a class="nav-link" href="?page=post">Post</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<?php include '../src/views/modals/loginModal.php' ?>
<?php include '../src/views/modals/registerModal.php' ?>
