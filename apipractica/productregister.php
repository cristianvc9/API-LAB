<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MaterailM Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
 
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
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
                            <span class="hide-menu">Productos</span>
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

        <div class="body-wrapper">
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">
                                <iconify-icon icon="solar:bell-linear" class="fs-6"></iconify-icon>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                                        class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Registrar Producto</h5>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="name">Nombre del Producto:</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="reference">Referencia:</label>
                                    <input type="text" class="form-control" name="reference" id="reference" required>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">ID de Categoría:</label>
                                    <input type="number" class="form-control" name="category_id" id="category_id" required>
                                </div>

                                <div class="form-group">
                                    <label for="price">Precio:</label>
                                    <input type="text" class="form-control" name="price" id="price" required>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Cantidad:</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity" required>
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="active" id="active">
                                    <label class="form-check-label" for="active">Activo</label>
                                </div>

                                <button type="submit" class="btn btn-primary">Registrar Producto</button>
                            </form>

                            <?php
                         
                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);

                           
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                               
                                $name = $_POST['name'];
                                $reference = $_POST['reference'];
                                $categoryId = $_POST['category_id'];
                                $price = $_POST['price'];
                                $quantity = $_POST['quantity'];
                                $active = isset($_POST['active']) ? 1 : 0;

                                
                                $apiUrl = 'http://10.0.0.36/api/products';
                                $apiKey = 'UWU7Z1QDI4AF8YZLF3CG5R6EBXR5DB8M';

                              
                                $xmlData = <<<XML
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <product>
        <name>
            <language id="1"><![CDATA[$name]]></language> 
        </name>
        <reference><![CDATA[$reference]]></reference>
        <id_category_default><![CDATA[$categoryId]]></id_category_default>
        <price><![CDATA[$price]]></price>
        <active><![CDATA[$active]]></active>
        <associations>
            <stock_availables>
                <stock_available>
                    <id_product>0</id_product> 
                    <id_product_attribute>0</id_product_attribute> 
                    <quantity><![CDATA[$quantity]]></quantity>
                </stock_available>
            </stock_availables>
        </associations>
    </product>
</prestashop>
XML;

                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $apiUrl);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                                curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ':');
                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);

                             
                                $response = curl_exec($ch);

                                if (curl_errno($ch)) {
                                    echo 'Error en cURL: ' . curl_error($ch);
                                    curl_close($ch);
                                    exit;
                                }

                           
                                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                if ($httpCode == 201) {
                                    echo "<div class='alert alert-success mt-4'>Producto registrado correctamente.</div>";
                                } else {
                                    echo "<div class='alert alert-danger mt-4'>Error al registrar producto: " . htmlspecialchars($response) . "</div>";
                                }

                                
                                curl_close($ch);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

</body>

</html>