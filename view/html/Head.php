<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../Usu_home/">Big-Smoke</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../Usu_home/">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/Big-Smoke_2.0/view/Usu_Biblioteca/">Biblioteca</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input type="hidden" id="usu_idx" value="<?php echo $_SESSION["UsuarioID"] ?>">
                        <input type="hidden" id="rol_idx" value="<?php echo $_SESSION["ID_Rol"] ?>">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="../html/logout.php">Cerrar Sesión</a></li>
                        </ul>
                        <a class="btn btn-outline-light" href="http://localhost/Big-Smoke_2.0/view/Usu_Carrito">
                            <i class="bi-cart-fill me-1"></i>
                            Carrito
                            <span class="badge bg-dark text-light ms-1 rounded-pill" >0</span>
                        </a>
                    </form>
                </div>
            </div>
        </nav>






