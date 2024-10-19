<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MaterailM Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .table {
            max-width: 100%;
            table-layout: auto;
        }

        th,
        td {
            white-space: nowrap;
        }

        td {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            
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
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Inicio</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="index.html" aria-expanded="false">
                                <iconify-icon icon="solar:widget-add-line-duotone"></iconify-icon>
                                <span class="hide-menu">Clientes</span>
                            </a>
                        </li>
                        <li>
                            <span class="sidebar-divider lg"></span>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Clientes</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="form.html" aria-expanded="false">
                                <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                                <span class="hide-menu">Registrar Cliente</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="productlist.php" aria-expanded="false">
                                <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                                <span class="hide-menu">Productos</span>
                            </a>
                        </li>
                        <li>
                            <span class="sidebar-divider lg"></span>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
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
                                    <img src="assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
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
                            <h5 class="card-title fw-semibold mb-4">Registrar Cliente</h5>
                            <div class="card mb-0">
                                <div class="table-responsive"> 
                                    <?php
                                    
                                    ini_set('display_errors', 1);
                                    ini_set('display_startup_errors', 1);
                                    error_reporting(E_ALL);

                                    
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                       
                                        $firstname = $_POST['firstname'];
                                        $lastname = $_POST['lastname'];
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];
                                        $active = isset($_POST['active']) ? 1 : 0;

                                       
                                        $apiUrl = 'http://10.0.0.36/api/customers';
                                        $apiKey = 'UWU7Z1QDI4AF8YZLF3CG5R6EBXR5DB8M';

                                       
                                        $xmlData = <<<XML
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <customer>
        <id_gender>1</id_gender>
        <firstname><![CDATA[$firstname]]></firstname>
        <lastname><![CDATA[$lastname]]></lastname>
        <email><![CDATA[$email]]></email>
        <passwd><![CDATA[$password]]></passwd>
        <active><![CDATA[$active]]></active>
        <id_default_group>3</id_default_group> 
        <associations>
            <groups>
                <group>
                    <id>3</id> 
                </group>
            </groups>
        </associations>
    </customer>
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
                                            echo "Cliente registrado exitosamente.";
                                        } else {
                                            echo "Error al registrar el cliente. Código HTTP: $httpCode";
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
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
</body>

</html>