<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de clientes</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
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
                            <a class="sidebar-link" href="customerslist.php" aria-expanded="false">
                                <iconify-icon icon="solar:widget-add-line-duotone"></iconify-icon>
                                <span class="hide-menu">Clientes</span>
                            </a>
                        </li>
                        <li>
                            <span class="sidebar-divider lg"></span>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Otras opciones</span>
                        </li>

                        <li>
                            <span class="sidebar-divider lg"></span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="form.html" aria-expanded="false">
                                <iconify-icon icon="solar:user-plus-rounded-line-duotone"></iconify-icon>
                                <span class="hide-menu">Registrar cliente</span>
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
                                <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <div class="table-responsive">
                                    <div class="card-body">
                                        <?php
                                        ini_set('display_errors', 1);
                                        ini_set('display_startup_errors', 1);
                                        error_reporting(E_ALL);

                                        $apiUrl = 'http://10.0.0.36/api/customers';

                                        $apiKey = 'UWU7Z1QDI4AF8YZLF3CG5R6EBXR5DB8M';

                                        $ch = curl_init();

                                        curl_setopt($ch, CURLOPT_URL, $apiUrl);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                                        curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ':');

                                        $response = curl_exec($ch);

                                        if (curl_errno($ch)) {
                                            echo 'Error en cURL: ' . curl_error($ch);
                                            curl_close($ch);
                                            exit;
                                        }

                                        try {
                                            $customers = new SimpleXMLElement($response);

                                            echo "<h3 class='fw-semibold'>Listado de Clientes:</h3>";
                                            echo "<div class='table-responsive'>"; 
                                            echo "<table class='table table-bordered'>";
                                            echo "<thead class='table-light'><tr>
                <th>ID</th>
                <th>Tratamiento</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dirección de correo electrónico</th>
                <th>Grupo</th>
                <th>Ventas</th>
                <th>Activado</th>
                <th>Boletín</th>
                <th>Ofertas de asociados</th>
                <th>Fecha de registro</th>
                <th>Última visita</th>
                <th>Acciones</th>
              </tr></thead><tbody>";

                                            foreach ($customers->customers->customer as $customer) {
                                                $customerId = (string)$customer['id'];

                                                $detailUrl = "http://10.0.0.36/api/customers/$customerId";

                                                curl_setopt($ch, CURLOPT_URL, $detailUrl);
                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                $detailResponse = curl_exec($ch);

                                                if (curl_errno($ch)) {
                                                    echo 'Error al obtener detalles del cliente: ' . curl_error($ch);
                                                    continue;
                                                }

                                                $customerDetails = new SimpleXMLElement($detailResponse);

                                                $treatment = (string)$customerDetails->customer->id_gender == '1' ? 'Sr.' : 'Sra.'; 
                                                $firstname = (string)$customerDetails->customer->firstname;
                                                $lastname = (string)$customerDetails->customer->lastname;
                                                $email = (string)$customerDetails->customer->email;
                                                $group = (string)$customerDetails->customer->id_default_group; 
                                                $sales = (string)$customerDetails->customer->total_spent; 
                                                $active = (string)$customerDetails->customer->active ? 'Sí' : 'No';
                                                $newsletter = (string)$customerDetails->customer->newsletter ? 'Sí' : 'No';
                                                $partner_offers = (string)$customerDetails->customer->optin ? 'Sí' : 'No';
                                                $registration_date = (string)$customerDetails->customer->date_add;
                                                $last_visit = (string)$customerDetails->customer->last_passwd_gen; 

                                                echo "<tr>
                    <td>$customerId</td>
                    <td>$treatment</td>
                    <td>$firstname</td>
                    <td>$lastname</td>
                    <td>$email</td>
                    <td>$group</td>
                    <td>$sales</td>
                    <td>$active</td>
                    <td>$newsletter</td>
                    <td>$partner_offers</td>
                    <td>$registration_date</td>
                    <td>$last_visit</td>
                    <td><a href='customersupdate.php?id=$customerId' class='btn btn-sm btn-outline-warning'>Editar</a> | 
                    <a href='customerdelete.php?id=$customerId' class='btn btn-sm btn-outline-danger'>Eliminar</a></td>
                  </tr>";
                                            }
                                            echo "</tbody></table>";
                                            echo "</div>"; 
                                        } catch (Exception $e) {
                                            echo 'Error al analizar la respuesta XML: ' . $e->getMessage();
                                        }

                                        
                                        curl_close($ch);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Start -->
        <footer class="footer text-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="mb-0">2023 &copy; MaterialM Admin Dashboard</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->
    </div>
    <!-- End Main wrapper -->
    </div>
    <!-- End Body Wrapper -->

    <script src="assets/js/scripts.min.js"></script>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>