<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles_index.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/celumerca_logo.png" alt="logo" width="100" height="80"><br>CeluMerca
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Usuario -->
                    <div class="dropdown" style="cursor: pointer;">
                        <img src="../img/perfil.png" alt="Usuario" width="30" class="rounded-circle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="">Configuración</a></li>
                            <li><a class="dropdown-item" href="">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h1 class="text-center mb-4">Carrito de Compras</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Datos Ocultos</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acción</th>

                </tr>
            </thead>
            <tbody id="cart-items">
                
            </tbody>
        </table>

        <div class="text-end">
            <h4 id="total-price">Total: $0</h4>
            <button class="btn btn-primary">Finalizar Compra</button>
        </div>
    </div>
    <script src="../js/cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>