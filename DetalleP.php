<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big-Smoke : DetallePro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="Plantillas/startbootstrap-shop-homepage-gh-pages/css/styles.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Big-Smoke</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Acerca de..</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tienda</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Todos los productos</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#!">Más Populares</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="view/html/login.php">Iniciar Sesión</a></li>
                    </ul>
                    <button class="btn btn-outline-light" type="button" onclick="carrito()">
                        <i class="bi-cart-fill me-1"></i>
                        Carrito
                        <span class="badge bg-dark text-light ms-1 rounded-pill" >0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <section class="py-5">
            <div class="container px-4 px-lg-5 my-5" >
            <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                    <input type="hidden" id="ID_Pro">
                        <img class="card-img-top mb-5 mb-md-0 border border-secondary" src="" alt="..." id="ImagPro"/>
                    </div>
                    <div class="col-md-6">
                        <div class="small mb-1" ><h5 id="Categoria"></h6> </div>
                        <h1 class="display-5 fw-bolder" text="Shop item template" id="Titulo" text="a"></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through" id="PrecioNorm"></span>
                            <strong class="text-dark-500" id="PrecioVen"></strong>
                            <span id="PrecioCDes"><small class="text-success"text="" id="descuento"></small></span> 
                        </div>
                        <p class="lead justify-content-start" id="Desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                        <div class="d-flex">
                            <button class="btn btn-outline-dark flex-shrink-0" type="button" onclick="carrito()">
                                <i class="bi-cart-fill me-1"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Plantillas/startbootstrap-shop-homepage-gh-pages/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Plantillas/startbootstrap-shop-item-gh-pages/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha1/0.6.0/sha1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="detallep.js"></script>
</body>
</html>