<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CeluMerca - Tu tienda de celulares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles_index.css">
    <link rel="shortcut icon" href="./img/celumerca_logo.png" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="./index.php">
                <img src="./img/celumerca_logo.png" alt="logo" width="100" height="80"><br>CeluMerca
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#comentarios">Comentarios</a>
                    </li>

                    <!-- Carrito de compras -->
                    <li class="nav-item dropdown me-3" style="cursor: pointer;">
                        <a class="nav-link position-relative" href="./pages/cart.php">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                            <span id="cart-count"
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                0
                            </span>
                        </a>
                    </li>

                    <!-- Usuario -->
                    <div class="dropdown" style="cursor: pointer;">
                        <img src="./img/perfil.png" alt="Usuario" width="30" class="rounded-circle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="">Configuración</a></li>
                            <li><a class="dropdown-item" href="./pages/login.html">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Hero Section -->
    <header id="inicio" class="hero-section">
        <div class="container text-center">
            <h1 class="display-4">Bienvenido a CeluMerca</h1>
            <p class="lead">Tu destino para los mejores celulares y accesorios</p>
            <a href="smartphones.php" class="btn btn-light btn-lg">Ver Catálogo</a>
        </div>
    </header>

    <section id="productos" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Productos Destacados</h2>
            <div class="row">
                <?php
                // Incluir la lógica PHP de productos
                if (file_exists('productos_destacados.php')) {
                    include 'productos_destacados.php';
                } else {
                    die("El archivo productos_destacados.php no existe.");
                }

                // Iterar y mostrar productos
                foreach ($productos as $producto): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars($producto['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($producto['nombre']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($producto['nombre']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($producto['descripcion']) ?></p>
                                <p class="card-text"><strong>Precio:</strong> $<?= number_format($producto['precio'], 0) ?></p>
                                <p class="card-text"><strong>Stock:</strong> <?= htmlspecialchars($producto['stock']) ?></p>
                                <a href="#" class="btn btn-primary" onclick="addToCart({ 
                                name: '<?= htmlspecialchars($producto['nombre']) ?>', 
                                price: <?= $producto['precio'] ?>,
                                id_producto: <?= $producto['id_producto'] ?> 
                            })">Comprar ahora</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="comentarios" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Comentarios</h2>
            <div class="row justify-content-center">
                <div class="col-md-6 mb-4">
                    <form id="commentForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="product" class="form-label">Producto</label>
                            <input type="product" class="form-control" id="product" name="product" required>
                        </div>
                        <div class="mb-3">
                            <label for="calification" class="form-label">Calificación</label>
                            <input type="calification" class="form-control" id="calification" name="calification"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>CeluMerca</h5>
                    <p>Tu tienda de confianza para celulares y accesorios de alta calidad.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Sobre Nosotros</a></li>
                        <li><a href="#" class="text-white">Política de Privacidad</a></li>
                        <li><a href="#" class="text-white">Términos y Condiciones</a></li>
                        <li><a href="#" class="text-white">Preguntas Frecuentes</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Boletín</h5>
                    <p>Suscríbete para recibir nuestras últimas ofertas</p>
                    <form class="mb-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Tu email" required>
                            <button class="btn btn-primary" type="submit">Suscribir</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="mt-4 mb-3">
            <div class="text-center">
                <p>&copy; 2024 CeluMerca. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
    <script>
        
        

        
    </script>
    <script src="./js/cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>