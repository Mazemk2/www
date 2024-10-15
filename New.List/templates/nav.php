<nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Navbar of US FI">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?= $brandTitle ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUsFi" aria-controls="navbarUsFi" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarUsFi">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link<?php echo str_ends_with($_SERVER['PHP_SELF'], 'index.php') ? ' active' : ''; ?>" aria-current="page" href="index.php">Startseite</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= str_ends_with($_SERVER['PHP_SELF'], 'todo-list.php') ? ' active' : ''; ?>" href="todo-list.php">Todo Liste</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= str_ends_with($_SERVER['PHP_SELF'], 'bootstrap-examples.php') ? ' active' : ''; ?>" href="bootstrap-examples.php">Bootstrap examples</a>
                </li>
            </ul>
            <form role="search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
    </div>
</nav>