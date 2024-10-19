<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MaterailM Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
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
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
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
            <!--  Header End -->
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Editar Producto</h5>

                            <?php
                            
                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);

                            
                            $apiUrl = 'http://10.0.0.36/api/products';
                            $categoryApiUrl = 'http://10.0.0.36/api/categories'; 
                            $apiKey = 'UWU7Z1QDI4AF8YZLF3CG5R6EBXR5DB8M';

                           
                            if (!isset($_GET['id'])) {
                                echo "ID de producto no proporcionado";
                                exit;
                            }

                            $productId = (int)$_GET['id'];

                           
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $apiUrl . '/' . $productId);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                            curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ':');
                            $response = curl_exec($ch);

                            if (curl_errno($ch)) {
                                echo 'Error en cURL: ' . curl_error($ch);
                                curl_close($ch);
                                exit;
                            }

                            curl_close($ch);

                            
                            $productXml = simplexml_load_string($response);
                            $product = $productXml->product;

                          
                            $name = (string)$product->name->language;
                            $reference = (string)$product->reference;
                            $price = (float)$product->price;
                            $categoryId = (int)$product->id_category_default; // Extraer ID de categoría
                            $active = ((int)$product->active == 1) ? 'checked' : '';

                            
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $categoryApiUrl . '?display=full');
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                            curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ':');
                            $categoriesResponse = curl_exec($ch);

                            if (curl_errno($ch)) {
                                echo 'Error en cURL: ' . curl_error($ch);
                                curl_close($ch);
                                exit;
                            }

                            curl_close($ch);

                            
                            $categoriesXml = simplexml_load_string($categoriesResponse);
                            $categories = [];
                            foreach ($categoriesXml->categories->category as $category) {
                                $categories[(int)$category->id] = (string)$category->name->language;
                            }

                            
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            
                                $name = $_POST['name'];
                                $reference = $_POST['reference'];
                                $price = $_POST['price'];
                                $categoryId = $_POST['category_id']; 
                                $active = isset($_POST['active']) ? 1 : 0;

                                
                                if (!is_numeric($price) || $price < 0) {
                                    echo "El precio debe ser un número válido y no puede ser negativo.";
                                    exit;
                                }

                              
                                $price = number_format((float)$price, 2, '.', '');

                              
                                $productData = <<<XML
<prestashop>
    <product>
        <id><![CDATA[$productId]]></id>
        <name>
            <language id="1"><![CDATA[$name]]></language>
        </name>
        <reference><![CDATA[$reference]]></reference>
        <price><![CDATA[$price]]></price>
        <id_category_default><![CDATA[$categoryId]]></id_category_default> 
        <active><![CDATA[$active]]></active>
    </product>
</prestashop>
XML;

                              
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $apiUrl . '/' . $productId);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                                curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ':');
                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $productData);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                    'Content-Type: application/xml',
                                    'Content-Length: ' . strlen($productData)
                                ));

                                $updateResponse = curl_exec($ch);

                                if (curl_errno($ch)) {
                                    echo 'Error en cURL: ' . curl_error($ch);
                                    curl_close($ch);
                                    exit;
                                }

                                curl_close($ch);

                               
                                $updateXml = simplexml_load_string($updateResponse);
                                if ($updateXml->product) {
                                    echo "<div class='alert alert-success'>Producto actualizado correctamente.</div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Error al actualizar el producto.</div>";
                                }
                            }
                            ?>

                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre del Producto</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        value="<?php echo htmlspecialchars($name); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="reference" class="form-label">Referencia</label>
                                    <input type="text" class="form-control" id="reference" name="reference" required
                                        value="<?php echo htmlspecialchars($reference); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">Precio</label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" required
                                        value="<?php echo htmlspecialchars($price); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Categoría</label>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <?php foreach ($categories as $id => $categoryName): ?>
                                            <option value="<?php echo $id; ?>" <?php echo ($id == $categoryId) ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($categoryName); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="active" name="active" <?php echo $active; ?>>
                                    <label class="form-check-label" for="active">Activo</label>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
                                <a href="productlist.php" class="btn btn-secondary mt-3">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-12">
                            <p class="mb-0">© 2023 MaterailM. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </footer>
            <!--  Footer End -->
        </div>
        <!--  Main wrapper End -->
    </div>
    <!-- End Wrapper -->
    <script src="assets/js/scripts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>