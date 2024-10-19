<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MaterailM Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <style>
        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #dee2e6;
            /* Borde de la tabla */
        }

        th {
            background-color: #f8f9fa;
            /* Fondo de los encabezados */
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Color de fila alterno */
        }

        tr:hover {
            background-color: #e2e3e8;
            /* Color al pasar el mouse */
        }

        a {
            color: #007bff;
            /* Color de enlaces */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
            /* Subrayar al pasar el mouse */
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="index.html" class="text-nowrap logo-img">
                        <img src="assets/images/logos/logo.svg" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Inicio</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="productlist.php" aria-expanded="false">
                                <iconify-icon icon="solar:widget-add-line-duotone"></iconify-icon>
                                <span class="hide-menu">Productos</span>
                            </a>
                        </li>
                        <li>
                            <span class="sidebar-divider lg"></span>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Otras opciones</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="productregister.php" aria-expanded="false">
                                <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                                <span class="hide-menu">Registrar Producto</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="customerslist.php" aria-expanded="false">
                                <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                                <span class="hide-menu">Clientes</span>
                            </a>
                        </li>
                        <li>
                            <span class="sidebar-divider lg"></span>
                        </li>
                    </ul>

                </nav>
            </div>
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="javascript:void(0)">
                                <iconify-icon icon="solar:bell-linear" class="fs-6"></iconify-icon>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Outline buttons</h5>
                            <div class="card mb-0">
                                <?php
                               
                                ini_set('display_errors', 1);
                                ini_set('display_startup_errors', 1);
                                error_reporting(E_ALL);

                                
                                $apiUrl = 'http://10.0.0.36/api/products';
                                $apiKey = 'UWU7Z1QDI4AF8YZLF3CG5R6EBXR5DB8M';

                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $apiUrl . '?display=full'); // Obtener todos los datos de productos
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                                curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ':');

                              
                                $response = curl_exec($ch);

                             
                                if (curl_errno($ch)) {
                                    echo 'Error en cURL: ' . curl_error($ch);
                                    curl_close($ch);
                                    exit;
                                }

                                curl_close($ch);

                                $productsXml = simplexml_load_string($response);

                                echo "<table>
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Referencia</th>
            <th>Categoría</th>
            <th>Precio (imp. excl.)</th>
            <th>Precio (imp. incl.)</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>";

                               
                                foreach ($productsXml->products->product as $product) {
                                    $id = (int)$product->id;
                                    $name = (string)$product->name->language;
                                    $reference = (string)$product->reference;
                                    $categoryId = (int)$product->id_category_default;
                                    $priceExclTax = (float)$product->price;
                                    $priceInclTax = $priceExclTax * 1.16; 
                                    $quantity = (int)$product->quantity;
                                    $active = ((int)$product->active == 1) ? 'Activo' : 'Inactivo';

                                    if (isset($product->id_default_image)) {
                                        $imageId = (int)$product->id_default_image;
                                       
                                        $imageUrl = "http://10.0.0.36/api/images/products/$id/$imageId";

                                        
                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, $imageUrl);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                                        curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ':');
                                        $imageData = curl_exec($ch);
                                        curl_close($ch);

                                      
                                        $imageBase64 = base64_encode($imageData);
                                        $imageSrc = 'data:image/jpeg;base64,' . $imageBase64;

                                       
                                        echo "<tr>
                <td>$id</td>
                <td><img src='$imageSrc' alt='Imagen de producto' style='max-width: 100px;'></td>
                <td>$name</td>
                <td>$reference</td>
                <td>$categoryId</td>
                <td>$$priceExclTax</td>
                <td>$$priceInclTax</td>
                <td>$quantity</td>
                <td>$active</td>
                <td>
                    <a href='productedit.php?id=$id'>Editar</a> | 
                    <a href='productdelete.php?id=$id'>Eliminar</a>
                </td>
            </tr>";
                                    } else {
                                        echo "<tr>
                <td>$id</td>
                <td>No disponible</td>
                <td>$name</td>
                <td>$reference</td>
                <td>$categoryId</td>
                <td>$$priceExclTax</td>
                <td>$$priceInclTax</td>
                <td>$quantity</td>
                <td>$active</td>
                <td>
                    <a href='editproduct.php?id=$id'>Editar</a> | 
                    <a href='deleteproduct.php?id=$id'>Eliminar</a>
                </td>
            </tr>";
                                    }
                                }

                               
                                echo "</table>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Footer Start -->
            <footer class="footer text-center">
                <p class="mb-0">2024 &copy; MaterailM. All rights reserved.</p>
            </footer>
        </div>
        <!--  Main wrapper end -->
    </div>
    <script src="assets/js/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>