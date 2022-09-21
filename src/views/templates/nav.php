<nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container-fluid">
        <a href="/" class="navbar-brand header-logo">
            <img class="img-fluid" src="media/logo-logo.png" alt="mon logo" />
        </a>

        <div class="d-flex ms-auto text-white resp-login">
            <?php if (isset($_SESSION['user'])) { ?>
                <div>Bonjour <?php echo $_SESSION['user']->firstname; ?></div>
    
                <a href="?page=login&action=logoff" class="text-decoration-none text-danger ms-1">
                    <i class="bi bi-power"></i>
                </a>
            <?php } else { ?>
                <a href="?page=login" role="button" class="text-decoration-none text-white">
                    <i class="bi bi-person-fill"></i>
                </a>
            <?php } ?>
        </div>
        
        <button class="navbar-toggler ico-btn p-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-expanded="false">
            <span class="ico-btn__burger"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="mainMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/">Home</a>
                </li>
    
                <li class="nav-item">
                    <a class="nav-link text-white" href="?page=post">Post</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
