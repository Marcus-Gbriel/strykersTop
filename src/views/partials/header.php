<header class="bg-primary text-white py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3 mb-0">
                    <a href="<?php echo \Core\View::url(); ?>" class="text-white text-decoration-none">
                        StrykersNet
                    </a>
                </h1>
            </div>
            <div class="col-md-6">
                <nav class="navbar navbar-expand-md navbar-dark">
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($currentPage === 'home') ? 'active' : ''; ?>" 
                                   href="<?php echo \Core\View::url('home'); ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($currentPage === 'about') ? 'active' : ''; ?>" 
                                   href="<?php echo \Core\View::url('about'); ?>">Sobre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($currentPage === 'contact') ? 'active' : ''; ?>" 
                                   href="<?php echo \Core\View::url('contact'); ?>">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($currentPage === 'login') ? 'active' : ''; ?>" 
                                   href="<?php echo \Core\View::url('login'); ?>">Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
